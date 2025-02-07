<?php

namespace App\Providers;

use App\Actions\Fortify\AttemptToAuthenticate;
use Illuminate\Contracts\Auth\StatefulGuard;
use App\Actions\Fortify\RedirectIfTwoFactorAuthenticatable;
use App\Http\Controllers\Auth\AdminController;
use Illuminate\Support\Facades\Auth;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->when([AdminController::class,AttemptToAuthenticate::class,RedirectIfTwoFactorAuthenticatable::class])->needs(StatefulGuard::class)->give(function () {
            return Auth::guard('admin');
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());

            return Limit::perMinute(10)->by($throttleKey); // Increase limit to 10 attempts
        });


        Fortify::authenticateUsing(function (Request $request) {
            $credentials = $request->only('email', 'password');

            if (Auth::guard('admin')->attempt($credentials)) {
                return Auth::guard('admin')->user();
            }

            if (Auth::guard('web')->attempt($credentials)) {
                return Auth::guard('web')->user();
            }

            return null;
        });

        Fortify::loginView(function () {
            return view('auth.login');
        });
    }
}

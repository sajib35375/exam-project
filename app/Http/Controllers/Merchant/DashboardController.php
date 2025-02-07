<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('merchant.index');
    }

    public function merchantLogout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }
}

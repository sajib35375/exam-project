<?php

use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Admin\MerchantController;
use App\Http\Controllers\frontend\IndexController;
use App\Http\Controllers\Merchant\DashboardController;
use App\Http\Controllers\Merchant\ProductController;
use App\Http\Controllers\Merchant\StoreController;
use App\Http\Controllers\Merchant\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::middleware('admin:admin')->group(function () {
    Route::get('admin/login',[AdminController::class,'loginForm'])->name('admin.login.form');
});

Route::post('admin/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (\Illuminate\Support\Facades\Auth::guard('admin')->attempt($credentials)) {
        return redirect()->route('root.admin.dashboard');
    }

    return back()->withErrors(['email' => 'Invalid credentials']);
})->name('admin.login');


Route::middleware(['auth:admin'])->group(function () {
    Route::get('root_route/admin/dashboard',[MerchantController::class,'dashboard'])->name('root.admin.dashboard');
});
Route::get('logout',[AdminController::class,'adminLogout'])->name('admin.logout');
Route::get('merchant/logout',[DashboardController::class,'merchantLogout'])->name('merchant.logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('merchant.dashboard');
    // store
    Route::get('root_route/store/add',[StoreController::class,'storeAdd'])->name('root.add.store');
    Route::post('root_route/merchant/create-store',[StoreController::class,'storeCreate'])->name('root.create.store');
    Route::get('root_route/merchant/store-list',[StoreController::class,'storeList'])->name('root.store.list');
    Route::get('root_route/merchant/store-edit/{id}',[StoreController::class,'storeEdit'])->name('root.store.edit');
    Route::post('root_route/merchant/store-update/{id}',[StoreController::class,'storeUpdate'])->name('root.store.update');
    Route::get('root_route/merchant/store-delete/{id}',[StoreController::class,'storeDelete'])->name('root.store.delete');
    // category
    Route::get('root_route/merchant/category',[CategoryController::class,'index'])->name('root.store.category');
    Route::post('root_route/merchant/create-category',[CategoryController::class,'createCategory'])->name('root.store.category.create');
    Route::get('root_route/merchant/category-list',[CategoryController::class,'categoryList'])->name('root.category.list');
    Route::get('root_route/merchant/category-edit/{id}',[CategoryController::class,'categoryEdit'])->name('root.category.edit');
    Route::post('root_route/merchant/category-update/{id}',[CategoryController::class,'categoryUpdate'])->name('root.category.update');
    Route::get('root_route/merchant/delete-category/{id}',[CategoryController::class,'categoryDelete'])->name('root.category.delete');
    // product
    Route::get('root_route/merchant/product',[ProductController::class,'index'])->name('root.product');
    Route::get('root_route/merchant/get-category/{id}',[ProductController::class,'getCategory'])->name('root.product.getCategory');
    Route::post('root_route/merchant/create-product',[ProductController::class,'createProduct'])->name('root.product.create.product');
    Route::get('root_route/merchant/product-list',[ProductController::class,'productList'])->name('root.product.list');
    Route::get('root_route/merchant/product-edit/{id}',[ProductController::class,'productEdit'])->name('root.product.edit');
    Route::get('root_route/merchant/category-select/{id}',[ProductController::class,'categorySelect'])->name('root.product.category.select');
    Route::post('root_route/merchant/product-update/{id}',[ProductController::class,'productUpdate'])->name('root.product.update');
    Route::get('root_route/merchant/product-delete/{id}',[ProductController::class,'productDelete'])->name('root.product.delete');
});

Route::get('/',[IndexController::class,'index'])->name('home');
Route::get('/store-wise/{id}',[IndexController::class,'storeWise'])->name('store.wise');
Route::get('category/product/{id}',[IndexController::class,'categoryProduct'])->name('category.product');

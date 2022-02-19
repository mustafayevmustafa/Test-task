<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RolesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Auth::routes();

//Route::get('/', function () {
//    return view('admin.index');
//});


Route::group(["prefix" => "admin"],function(){
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/products/export', [ProductController::class, 'export'])->name('products.export');
    Route::resource('products', ProductController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('roles', RolesController::class);
    Route::resource('profil', ProfilController::class);
});

//Route::get('giris',[\App\Http\Controllers\AuthController::class, 'index'])->name('index-log');
//Route::post('custom-login',[\App\Http\Controllers\AuthController::class, 'custom_login'])->name('custom-login');
//
//

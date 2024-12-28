<?php

use App\Http\Controllers\AdminDashboard\AuthController;
use App\Http\Controllers\AdminDashboard\DashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('admin-dashboard.dashboard');
    } else {
        return redirect()->route('admin-dashboard.login');
    }
});

Route::name('admin-dashboard.')->group(function (){
    Route::middleware('guest')->group(function (){
        Route::get('login',[AuthController::class,'login'])->name('login');
        Route::post('authenticate',[AuthController::class,'authenticate'])->name('authenticate');
    });

    Route::middleware('auth')->group(function (){
        Route::get('logout',[AuthController::class,'logout'])->name('logout');
        Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
    });
});

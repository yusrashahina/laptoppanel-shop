<?php

use App\Http\Controllers\AdminDashboard\AuthController;
use App\Http\Controllers\AdminDashboard\DashboardController;
use App\Http\Controllers\AdminDashboard\PasswordResetController;
use App\Http\Controllers\AdminDashboard\UserController;
use Illuminate\Support\Facades\Mail;
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
        // Login
        Route::get('login',[AuthController::class,'login'])->name('login');
        Route::post('authenticate',[AuthController::class,'authenticate'])->name('authenticate');
        // Reset Password
        Route::get('forgot-password', [PasswordResetController::class, 'showForgotPasswordForm'])->name('password.request');
        Route::post('forgot-password', [PasswordResetController::class, 'sendResetLink'])->name('password.email');
        Route::get('reset-password/{token}', [PasswordResetController::class, 'showResetPasswordForm'])->name('password.reset');
        Route::post('reset-password', [PasswordResetController::class, 'resetPassword'])->name('password.update');
    });

    Route::middleware('auth')->group(function (){
        Route::post('logout',[AuthController::class,'logout'])->name('logout');
        Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');

        Route::resource('users',UserController::class);
        Route::post('/users/update-preference', [UserController::class, 'updateRecordsPerPage'])->name('users.update-preference');
        Route::post('users/bulk-update', [UserController::class, 'bulkUpdateUsers'])->name('users.bulkUpdateUsers');
        Route::post('users/bulk-delete', [UserController::class, 'bulkDeleteUsers'])->name('users.bulkDeleteUsers');
    });
});

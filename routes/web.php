<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// require __DIR__.'/auth.php';

Route::get('/', function () {
    return redirect()->route('admin.dashboard');
});



Route::prefix('admin')->group(function () {



  
    
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('admin.login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('admin.login.submit');
    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('admin.password.request');
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('admin.password.email');
    Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('admin.password.reset');
    Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('admin.password.store');


    
    Route::middleware(['web','auth:admin'])->group(function () {
        
        Route::get('/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::post('update/password', [ProfileController::class, 'passwordUpdate'])->name('password.update');
        // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');


        Route::controller(UserController::class)->group(function(){
           Route::get('users', 'index')->name('admin.users.index');
           Route::get('users/create', 'create')->name('admin.users.create');
           Route::post('users', 'store')->name('admin.users.store');
           Route::get('users/{id}/edit', 'edit')->name('admin.users.edit');
           Route::put('users/{id}', 'update')->name('admin.users.update');
           Route::delete('users/{id}', 'destroy')->name('admin.users.destroy');
        });

    });


});




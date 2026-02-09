<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\Admin\ProposalController as AdminProposalController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/places/{id}', [HomeController::class, 'showPlace'])->name('places.show');

// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    // Password Reset Routes
    Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetPassword'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');




use App\Http\Controllers\Admin\UserController as AdminUserController;

// Dashboard / Protected Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Places
    Route::get('/places/create', [ProposalController::class, 'create'])->name('places.create');
    Route::post('/places', [ProposalController::class, 'store'])->name('places.store');

    // Admin Routes
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/proposals', [AdminProposalController::class, 'index'])->name('proposals.index');
        Route::get('/proposals/{id}/edit', [AdminProposalController::class, 'edit'])->name('proposals.edit');
        Route::put('/proposals/{id}', [AdminProposalController::class, 'update'])->name('proposals.update');
        Route::post('/proposals/{id}/approve', [AdminProposalController::class, 'approve'])->name('proposals.approve');
        Route::post('/proposals/{id}/reject', [AdminProposalController::class, 'reject'])->name('proposals.reject');

        // User Management (Superadmin)
        Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
        Route::delete('/users/{id}', [AdminUserController::class, 'destroy'])->name('users.destroy');
        Route::post('/users/{id}/restore', [AdminUserController::class, 'restore'])->name('users.restore');
    });
});

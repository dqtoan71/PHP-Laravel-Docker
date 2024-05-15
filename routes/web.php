<?php

use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleManagementController;
use App\Http\Controllers\Admin\AdminManagementController;
use App\Http\Controllers\Admin\CategoryManagementController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostManagementController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'check-route-permission-admin'])->prefix('admin')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard.index');
    Route::get('/dashboard/change-language/{language}', [DashboardController::class, 'changeLanguage'])->name('dashboard.change-language');

    Route::resource('role-management', RoleManagementController::class, [
        'only' => ['index', 'create', 'store', 'edit', 'destroy']
    ]);
    Route::post('/role-management/{role:id}', [RoleManagementController::class, 'update'])->name('role-management.update');

    Route::resource('admin-management', AdminManagementController::class, [
        'only' => ['index', 'create', 'store', 'edit', 'destroy']
    ]);
    Route::post('/admin-management/{admin:id}', [AdminManagementController::class, 'update'])->name('admin-management.update');

    Route::resource('user-management', UserManagementController::class, [
        'only' => ['index', 'create', 'store', 'edit', 'destroy']
    ]);
    Route::post('/user-management/{admin:id}', [UserManagementController::class, 'update'])->name('user-management.update');

    Route::resource('post-management', PostManagementController::class);
    Route::post('/post-management/{post:id}', [PostManagementController::class, 'update'])->name('post-management.update');

    Route::resource('category-management', CategoryManagementController::class);
    Route::post('/category-management/{post:id}', [CategoryManagementController::class, 'update'])->name('category-management.update');



});

require __DIR__.'/auth.php';

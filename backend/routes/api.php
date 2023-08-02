<?php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route không yêu cầu xác thực
Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
Route::post('create_profile', [UserController::class, 'createProfile']);

// Các route phân quyền
Route::middleware('auth:sanctum')->group(function () {
    // Route dành cho vai trò "admin" (cần có middleware role:admin)
    Route::get('admin/dashboard', [UserController::class, 'adminDashboard'])->middleware('role:admin');

    // Route dành cho vai trò "user" và "admin" (cần có middleware role:user,admin)
    Route::get('user/profile', [UserController::class, 'userProfile'])->middleware('role:user,admin');
    Route::put('profiles/{id}', [UserController::class, 'updateProfile'])->middleware('role:user,admin');
    Route::delete('profiles/{id}', [UserController::class, 'deleteProfile'])->middleware('role:user,admin');
});

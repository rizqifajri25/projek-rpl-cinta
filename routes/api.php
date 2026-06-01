<?php

use App\Http\Controllers\Api\AdminDashboardController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CulinaryController;
use App\Http\Controllers\Api\FavoriteController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\ReservationController;
use App\Http\Controllers\Api\ReviewController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
Route::post('/reset-password', [AuthController::class, 'resetPassword']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/culinary', [CulinaryController::class, 'index']);
Route::get('/culinary/{culinaryPlace}', [CulinaryController::class, 'show']);

Route::middleware(['auth:sanctum', 'active'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::put('/profile', [AuthController::class, 'updateProfile']);
    Route::post('/profile/avatar', [AuthController::class, 'updateProfile']);
    Route::post('/email/verification-notification', fn () => response()->json(['message' => 'verification sent']));

    Route::apiResource('favorites', FavoriteController::class)->only(['index', 'store', 'destroy']);
    Route::post('/reviews', [ReviewController::class, 'store']);
    Route::put('/reviews/{review}', [ReviewController::class, 'update']);
    Route::delete('/reviews/{review}', [ReviewController::class, 'destroy']);
    Route::post('/reviews/{review}/images', fn () => response()->json(['message' => 'uploaded']));
    Route::post('/reviews/report', [ReviewController::class, 'report']);
    Route::post('/reviews/reply', [ReviewController::class, 'reply'])->middleware('role:pemilik_usaha|admin_dinas');

    Route::apiResource('reservations', ReservationController::class)->only(['index', 'store', 'update', 'destroy']);
    Route::post('/reservations/confirm', [ReservationController::class, 'confirm'])->middleware('role:pemilik_usaha|admin_dinas');
    Route::post('/reservations/reject', [ReservationController::class, 'reject'])->middleware('role:pemilik_usaha|admin_dinas');

    Route::get('/notifications', [NotificationController::class, 'index']);
    Route::put('/notifications/read', [NotificationController::class, 'read']);

    Route::middleware('role:pemilik_usaha')->prefix('owner')->group(function () {
        Route::apiResource('culinary', CulinaryController::class)->except(['index', 'show']);
        Route::post('/culinary/{culinaryPlace}/documents', fn () => response()->json(['message' => 'documents uploaded']));
        Route::post('/culinary/{culinaryPlace}/halal-certificate', fn () => response()->json(['message' => 'halal certificate uploaded']));
        Route::post('/culinary/{culinaryPlace}/gallery', fn () => response()->json(['message' => 'gallery uploaded']));
    });

    Route::middleware('role:admin_dinas')->prefix('admin')->group(function () {
        Route::apiResource('categories', CategoryController::class)->except(['index', 'show']);
        Route::post('/verify-culinary/{culinaryPlace}', [CulinaryController::class, 'verify']);
        Route::post('/verify-halal/{halalCertificate}', fn () => response()->json(['message' => 'halal verification updated']));
        Route::get('/dashboard', AdminDashboardController::class);
    });
});

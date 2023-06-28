<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Member\DashboardController as MemberDashboardController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\UserController;

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

// Login
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');


// Logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


// Middleware when user already logged in
Route::middleware(['auth'])->group(function () {

    // Admin area
    Route::middleware(['admin'])->group(function () {
        Route::prefix('admin')->group(function () {

            // Dashboard
            Route::get('/dashboard', [AdminDashboardController::class, 'index']);

            // Attendance
            Route::get('/attendance', [AttendanceController::class, 'index']);
            // Route::get('/attendance/search', [AttendanceController::class, 'index']);
            Route::get('/attendance/create', [AttendanceController::class, 'create']);
            Route::post('/attendance/store', [AttendanceController::class, 'store']);
            Route::get('/attendance/{id}/edit', [AttendanceController::class, 'edit']);
            Route::put('/attendance/{id}/update', [AttendanceController::class, 'update']);
            Route::delete('/attendance/{id}/delete', [AttendanceController::class, 'destroy']);
            //user
            Route::get('/users/create', 'UserController@create')->name('users.create');


            //Report
            Route::get('/report', [ReportController::class, 'index']);
        });
    });

    // Member area
    Route::middleware(['member'])->group(function () {
        Route::prefix('member')->group(function () {

            // Dashboard
            Route::get('/dashboard', [MemberDashboardController::class, 'index']);

            //Report
            //Route::get('/report', [MemberReportController::class, 'index']);
        });
    });
});

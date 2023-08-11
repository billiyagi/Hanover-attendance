<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\Admin\DataController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\DataUserController;
use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;

use App\Http\Controllers\Member\DataMemberController;
use App\Http\Controllers\Member\PresentController;
use App\Http\Controllers\Member\PermitController;
use App\Http\Controllers\Member\AccountController;


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
            // settings
            Route::get('/settings', [AdminDashboardController::class, 'settings']);

            // Attendance
            Route::get('/attendance', [AttendanceController::class, 'index']);
            Route::get('/attendance/create', [AttendanceController::class, 'create']);
            Route::post('/attendance/store', [AttendanceController::class, 'store']);
            Route::get('/attendance/{id}/edit', [AttendanceController::class, 'edit']);
            Route::put('/attendance/{id}/update', [AttendanceController::class, 'update']);
            Route::delete('/attendance/{id}/delete', [AttendanceController::class, 'destroy']);
            Route::get('/attendance/export/{type}', [AttendanceController::class, 'export']);

            //Report
            Route::get('/report', [ReportController::class, 'index']);
            Route::get('/report/search', [ReportController::class, 'index']);
            Route::get('/report/create', [ReportController::class, 'create']);
            Route::post('/report/store', [ReportController::class, 'store']);
            Route::get('/report/{id}/edit', [ReportController::class, 'edit']);
            Route::put('/report/{id}/update', [ReportController::class, 'update']);
            Route::delete('/report/{id}/delete', [ReportController::class, 'destroy']);
            Route::get('/report/export/{type}', [ReportController::class, 'export']);

            // Data User
            Route::get('/dataUser/{dataId}/create', [DataUserController::class, 'create']);
            Route::post('/dataUser/store', [DataUserController::class, 'store']);
            Route::get('/dataUser/{id}', [DataUserController::class, 'index']);
            Route::get('/dataUser/{id}/edit', [DataUserController::class, 'edit']);
            Route::get('/dataUser/{id}/export/{type}', [DataUserController::class, 'export']);
            Route::put('/dataUser/{id}/update', [DataUserController::class, 'update']);


            // Data
            Route::get('/data', [DataController::class, 'index']);
            Route::get('/data/create', [DataController::class, 'create']);
            Route::post('/data/store', [DataController::class, 'store']);
            Route::get('/data', [DataController::class, 'index']);
            Route::delete('/data/{id}/delete', [DataController::class, 'destroy']);
            Route::get('/data/{id}/edit', [DataController::class, 'edit']);
            Route::put('/data/{id}/update', [DataController::class, 'update']);
            Route::get('/data/export/{type}', [DataController::class, 'export']);


            // Users
            // Route::group(['prefix' => 'users'], function () {
            //     Route::post(
            //         '/import',
            //         [UserController::class, 'importExcel']
            //     )->name('users.import');
            //     Route::get('/export/{type}', [UserController::class, 'export'])->name('users.export');
            // });
            // Route::resource('users', UserController::class);

            Route::get('/users', [UserController::class, 'index']);
            Route::get('/users/{nip}', [UserController::class, 'show']);
            Route::get('/users/{nip}/edit', [UserController::class, 'edit']);
            Route::put('/users/{nip}/update', [UserController::class, 'update']);
            Route::get('/users/create', [UserController::class, 'create']);
            Route::post('/users/store', [UserController::class, 'store']);
            Route::delete('/users/{id}/delete', [UserController::class, 'destroy']);
        });
    });


    // Member area
    Route::middleware(['member'])->group(function () {
        Route::prefix('member')->group(function () {

            // Present
            Route::get('/present', [PresentController::class, 'index']);
            Route::post('/present/store', [PresentController::class, 'store']);

            //Permit
            Route::get('/permit', [PermitController::class, 'index']);
            Route::get('/permit/sakit', [PermitController::class, 'sakit']);
            Route::get('/permit/cuti', [PermitController::class, 'cuti']);
            Route::get('/permit/other', [PermitController::class, 'other']);
            Route::post('/permit/sakit/store', [PermitController::class, 'storeSakit']);
            Route::post('/permit/cuti/store', [PermitController::class, 'storeCuti']);
            Route::post('/permit/other/store', [PermitController::class, 'storeOther']);

            // Data Member
            Route::get('/data', [DataMemberController::class, 'index']);

            // account
            Route::get('/account', [AccountController::class, 'index'])->name('member.account.index');
            Route::put('/account', [AccountController::class, 'update'])->name('member.account.update');
        });
    });
});

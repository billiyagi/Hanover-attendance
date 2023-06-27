<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Data\DataController ;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Member\DashboardController as MemberDashboardController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
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
<<<<<<< Updated upstream

            //Report
            Route::get('/report', [ReportController::class, 'index']);
=======
            Route::get('/data', [DataController::class, 'index']);

            // Create
            Route::get('/createData', [DataController::class, 'create']);
            Route::get('/createDataUser/{dataId}', [DataController::class, 'createDataUser'])->name('createDataUser');

            // Store
            Route::post('/storeData', [DataController::class, 'store']);


>>>>>>> Stashed changes
        });
    });


<<<<<<< Updated upstream
            // Dashboard
            Route::get('/dashboard', [MemberDashboardController::class, 'index']);

            //Report
            //Route::get('/report', [MemberReportController::class, 'index']);
        });
    });
=======
>>>>>>> Stashed changes
});

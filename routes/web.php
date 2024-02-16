<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\to_do_listController as AdminTo_do_listController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\use\to_do_listController;
use App\Http\Controllers\user\DashboardController as UserDashboardController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('submit', [LoginController::class, 'submit_login'])->name('submit_login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('register', [LoginController::class, 'register'])->name('register');
Route::post('submit_register', [LoginController::class, 'submit_register'])->name('submit_register');

Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function ($router) {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::group(['prefix' => 'to_do_list'], function ($router) {
        Route::get('/', [AdminTo_do_listController::class, 'index'])->name('admin.to_do_list');
        // Route::post('submit-todolist', [AdminTo_do_listController::class, 'submit_todolist'])->name('submit_todolist');
    });

    Route::group(['prefix' => 'user'], function ($router) {
        Route::get('/', [UserController::class, 'index'])->name('admin.user');
    });
});

Route::group(['middleware' => 'auth', 'namespace' => 'User', 'prefix' => 'user'], function ($router) {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');

    Route::group(['prefix' => 'to_do_list'], function ($router) {
        Route::get('/', [to_do_listController::class, 'index'])->name('user.to_do_list');
        Route::post('submit-todolist', [to_do_listController::class, 'submit_todolist'])->name('submit_todolist');
    });
});

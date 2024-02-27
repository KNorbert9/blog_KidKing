<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'home']);

//login
Route::get('login', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'auth_login']);


//Registration
Route::get('register', [AuthController::class, 'register']);
Route::post('register', [AuthController::class, 'createUser']);
Route::get('verify/{token}', [AuthController::class, 'verify']);

//forgot password
Route::get('forgotPassword', [AuthController::class, 'forgotPassword']);
Route::post('forgotPassword', [AuthController::class, 'resetPassword']);
Route::get('reset/{token}', [AuthController::class, 'reset']);
Route::post('reset/{token}', [AuthController::class, 'post_reset']);
Route::get('logout', [AuthController::class, 'logout']);




//Middleware pour gérer les users roles
Route::group(['middleware' => 'userRole'], function () {

    //Dashboard
    Route::get('dashboard', [DashboardController::class, 'dashboard']);

    Route::get('dashboard/users', [UserController::class, 'user']);

    Route::get('dashboard/users/add', [UserController::class, 'addUser']);

    Route::post('dashboard/users/add', [UserController::class, 'insert_user']);

    Route::post('dashboard/users/edit{id}', [UserController::class, 'update_user']);

});


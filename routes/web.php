<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
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
Route::get('about', [HomeController::class, 'about']);
Route::get('contact', [HomeController::class, 'contact']);
Route::get('teams', [HomeController::class, 'teams']);
Route::get('gallery', [HomeController::class, 'gallery']);
Route::get('blog', [HomeController::class, 'blog']);



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


    //User
    Route::get('dashboard/users', [UserController::class, 'user']);

    Route::get('dashboard/users/add', [UserController::class, 'addUser']);

    Route::post('dashboard/users/add', [UserController::class, 'insert_user']);

    Route::get('dashboard/users/edit/{id}', [UserController::class, 'edit_user']);
    Route::post('dashboard/users/edit/{id}', [UserController::class, 'update_user']);

    Route::get('dashboard/users/delete/{id}', [UserController::class, 'delete_user']);


    //Categories
    Route::get('dashboard/categories', [CategorieController::class, 'categorie']);

    Route::get('dashboard/categories/add', [CategorieController::class, 'addCategorie']);

    Route::post('dashboard/categories/add', [CategorieController::class, 'insert_categorie']);

    Route::get('dashboard/categories/edit/{id}', [CategorieController::class, 'edit_categorie']);
    Route::post('dashboard/categories/edit/{id}', [CategorieController::class, 'update_categorie']);

    Route::get('dashboard/categories/delete/{id}', [CategorieController::class, 'delete_categorie']);


    //Blogs
    Route::get('dashboard/blogs', [BlogController::class, 'blog']);

    Route::get('dashboard/blogs/add', [BlogController::class, 'addBlog']);

    Route::post('dashboard/blogs/add', [BlogController::class, 'insert_blog']);

    Route::get('dashboard/blogs/edit/{id}', [BlogController::class, 'edit_blog']);
    Route::post('dashboard/blogs/edit/{id}', [BlogController::class, 'update_blog']);

    Route::get('dashboard/blogs/delete/{id}', [BlogController::class, 'delete_blog']);


    //Pages
    Route::get('dashboard/pages', [PageController::class, 'page']);

    Route::get('dashboard/pages/add', [PageController::class, 'addPage']);

    Route::post('dashboard/pages/add', [PageController::class, 'insert_page']);

    Route::get('dashboard/pages/edit/{id}', [PageController::class, 'edit_page']);
    Route::post('dashboard/pages/edit/{id}', [PageController::class, 'update_page']);

    Route::get('dashboard/pages/delete/{id}', [PageController::class, 'delete_page']);
});


Route::get('{slug}', [HomeController::class, 'blogDetail']);

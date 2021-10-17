<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainController::class, 'index'])->name('home');

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/signin', [AuthController::class, 'createSignin'])->name('signin');


Route::get('/register', [AuthController::class, 'signup'])->name('register');
Route::post('/create-user', [AuthController::class, 'SignupUser'])->name('user.registration');


Route::get('/dashboard', [AuthController::class, 'dashboardView'])->name('dashboard');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/post-view', [PostController::class, 'view'])->name('view-post');
Route::get('/post-edit', [PostController::class, 'edit'])->name('edit-post');

Route::post('/post-update', [PostController::class, 'update'])->name('post.update');

Route::get('/post-create', [PostController::class, 'create'])->name('post.create.view');

Route::post('/post-create-action', [PostController::class, 'createPost'])->name('post.create');

Route::get('/post-search', [PostController::class, 'search'])->name('post.search');






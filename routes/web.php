<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CustomerController;

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

Route::get('/',  [ArticleController::class, 'carView']);
Route::get('/articles', [ArticleController::class, 'carView']);

// Route::get('/articles/users', [ArticleController::class, 'userView']);
Route::get('/articles/users', [CustomerController::class, 'userView']);
Route::post('/articles/users/create', [CustomerController::class, 'store'])->name('users.store');
Route::get('/articles/users/create', [CustomerController::class, 'userAdd']);
// Route::post('/articles/users/create', [ArticleController::class, 'userCreate']);
Route::get('/articles/users/edit/{id}', [CustomerController::class, 'userEdit']);
Route::post('/articles/users/edit/{id}', [CustomerController::class, 'userUpdate']);
Route::get('/articles/users/delete/{id}', [CustomerController::class, 'userDelete']);
// web.php
// Route::get('/articles/users/{userId}/showUserCars', [CustomerController::class, 'showUserCars']);
Route::get('/users/{id}/purchases', [CustomerController::class, 'getPurchases']);
Route::get('/cars/{id}/purchases', [ArticleController::class, 'getCarPurchases']);

Route::get('/articles/users/{id}/buyCar', [ArticleController::class, 'buyCar']);
Route::get('/articles/users/{id}/buyCar/{cid}', [ArticleController::class, 'buyCarProcess']);
Route::get('/articles/users/{id}/ownCar/edit', [ArticleController::class, 'ownerCarEdit']);
Route::get('/articles/users/{id}/ownCar/edit/delete/{cid}', [ArticleController::class, 'ownerCarDelete']);

Route::get('/articles/cars', [ArticleController::class, 'carView']);
Route::get('/articles/cars/create', [ArticleController::class, 'carAdd']);
Route::post('/articles/cars/create', [ArticleController::class, 'carCreate']);
Route::get('/articles/cars/edit/{id}', [ArticleController::class, 'carEdit']);
Route::post('/articles/cars/edit/{id}', [ArticleController::class, 'carUpdate']);
Route::get('/articles/cars/delete/{id}', [ArticleController::class, 'carDelete']);


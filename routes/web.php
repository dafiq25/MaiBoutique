<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\regisController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\memberController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [loginController::class, 'index'])->name('login');
Route::post('login', [loginController::class, 'authenticate']);
Route::get('/register', [regisController::class, 'index']);
Route::post('/register', [regisController::class, 'registered']);
Route::get('/logout', [loginController::class, 'logout']);

Route::middleware(['auth'])->group(function(){
    Route::get('/home', [memberController::class, 'home']);
    Route::get('/search', [memberController::class, 'search']);
    Route::get('/profile', [memberController::class, 'profile']);
    Route::get('/edit-password', [memberController::class, 'indexEditPassword']);
    Route::get('/edit-profile', [memberController::class, 'indexEditProfile']);
    Route::post('/profile-update', [memberController::class, 'updateprofile']);
    Route::post('/password-update', [memberController::class, 'updatePassword']);

    Route::get('/detail/{name}', [memberController::class, 'detail']);
    Route::post('/addToCart/{id}', [memberController::class, 'addToCart']);
    Route::get('/cart', [memberController::class, 'cart']);
    Route::get('/edit-cart/{id}',[memberController::class, 'editCart']);
    Route::post('update-cart/{id}', [memberController::class, 'updateCart']);
    Route::get('/delete-cart/{id}',[memberController::class, 'deleteCart']);
    Route::get('/checkout', [memberController::class, 'checkout']);
    Route::get('/history', [memberController::class, 'history']);
    Route::get('/addItem', [adminController::class, 'index']);
    Route::post('/itemAdded', [adminController::class, 'addItem']);
    Route::get('/delete-product/{id}', [adminController::class, 'deleteProduct']);
});

// Route::middleware(['auth', 'checkRole:member'])->group(function(){
//     Route::get('/home', [memberController::class, 'home']);
//     Route::get('/detail/{name}', [memberController::class, 'detail']);

// });

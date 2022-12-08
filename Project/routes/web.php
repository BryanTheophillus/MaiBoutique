<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
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

Route::get('/',[UserController::class,'home'])->name('home');

Route::get('/SignIn', [UserController::class, 'SignIn']);
Route::post('/SignIn', [AuthController::class,'authenticate']);

Route::get('/SignUp', [UserController::class, 'SignUp']);
Route::post('/SignUp', [UserController::class,'Register']);

Route::get('/homepage',[AuthController::class,'homepage']);
Route::get('/homepage',[ProductController::class,'homeProduct']);

Route::get('/Search',[ProductController::class, 'SearchProduct']);
Route::get('/SearchProd',[ProductController::class, 'SearchProduct']);

Route::get('/Detail/{id}',[ProductController::class, 'detail']);

Route::group(['middleware' => ['auth']], function(){
    Route::group(['middleware' => ['security']], function(){
        Route::post('/AddProduct',[ProductController::class,'AddProduct']);
        Route::get('/Add',[ProductController::class,'Add']);
        Route::get('/Delete/{id}',[ProductController::class,'delete']);
    });
});

Route::get('/SignOut',[AuthController::class,'logout'])->name('logout');

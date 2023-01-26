<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionHeaderController;
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




Route::group(['middleware' => ['auth']], function(){
    Route::get('/homepage',[AuthController::class,'homepage']);
    Route::get('/homepage',[ProductController::class,'homeProduct']);
    Route::get('/Detail/{id}',[ProductController::class, 'detail']);
    Route::get('/Search',[ProductController::class, 'SearchProduct']);
    Route::get('/SearchProd',[ProductController::class, 'SearchProduct']);
    Route::get('/SignOut',[AuthController::class,'logout'])->name('logout');
    Route::get('/Profile',[UserController::class, 'viewProfile']);
    Route::get('/EditPassword',[UserController::class, 'editPassword']);
    Route::patch('/EditPassword',[UserController::class, 'updatePassword']);

    Route::group(['middleware' => ['member']], function(){
        Route::get('/myCart',[CartController::class,'cart']);
        Route::post('/addToCart/{id}',[CartController::class, 'addToCart']);
        Route::get('/UpdateCart/{id}',[CartController::class, 'editCart']);
        Route::patch('/UpdateCart/{id}',[CartController::class, 'updateCart']);
        Route::post('/DeleteCart/{id}',[CartController::class, 'deleteCart']);
        Route::get('/EditProfile',[UserController::class, 'editProfile']);
        Route::patch('/EditProfile',[UserController::class, 'updateProfile']);
        Route::get('/History', [TransactionHeaderController::class, 'getAllTransactions']);
        Route::post('/Checkout', [TransactionHeaderController::class, 'addTransaction']);
    });
    Route::group(['middleware' => ['security']], function(){
        Route::post('/AddProduct',[ProductController::class,'AddProduct']);
        Route::get('/Add',[ProductController::class,'Add']);
        Route::get('/Delete/{id}',[ProductController::class,'delete']);
    });
});





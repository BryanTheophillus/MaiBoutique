<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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

Route::get('/SignOut',[AuthController::class,'logout']);

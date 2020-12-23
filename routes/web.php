<?php

use App\Http\Controllers\AuthController;
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

Route::get('/Home', function (){
    return view('Home');
})->name('Home');
Route::post('/Home',[AuthController::class,'Home']);

Route::get('/signup', function () {
    return view('registration');
})->name('signup');
Route::post('/signup', [AuthController::class,'SignUp']);

Route::get('/signin', function () {
    return view('signin');
})->name('SignIn');
Route::post('/signin', [AuthController::class,'SignIn']);

Route::get('/Details', function (){
    return view('Details');
})->name('Details');
Route::post('/Details',[AuthController::class,'Details']);

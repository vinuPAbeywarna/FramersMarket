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

//Auth
Route::get('/signup', function () {
    return view('SignUp');
})->name('signup');

Route::post('/signup', [AuthController::class,'SignUp']);

Route::get('/signin', function () {
    return view('SignIn')->with(['error'=>false]);
})->name('SignIn');

Route::post('/signin', [AuthController::class,'SignIn']);

//Profile

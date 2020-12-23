<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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
Route::get('/profile', function () {
    if (Session::get('Logged')){
        return view('Profile');
    } else {
        return redirect()->route('SignIn');
    }
})->name('Profile');

//Report Submit

Route::get('/submitreport', function () {
    return view('Submitreport');
})->name('Submitreport');

Route::post('/submitreport', [ReportController::class,'AddReport']);





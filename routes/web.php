<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PhotoUploadController;
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

Route::post('/signup', [AuthController::class, 'SignUp']);

Route::get('/signin', function () {
    return view('SignIn')->with(['error' => false]);
})->name('SignIn');

Route::post('/signin', [AuthController::class, 'SignIn']);

//Profile
Route::get('/profile', function () {
    if (Session::get('Logged')) {
        return view('Profile');
    } else {
        return redirect()->route('SignIn');
    }
})->name('Profile');

//Report Submit

Route::get('/submitreport', function () {
    if (Session::get('Logged')) {
        return view('Submitreport');
    } else {
        return redirect()->route('SignIn');
    }

})->name('Submitreport');

Route::get('/addnewuser', function () {
    if (Session::get('Logged') && Session::get('UserType')=='Admin') {
        return view('NewUser');
    } else {
        return redirect()->route('SignIn');
    }

})->name('addnewuser');

Route::post('/addnewuser', [AuthController::class, 'NewUser'])->name('newuser');

//Photo Upload
Route::post('/photoUpload', [PhotoUploadController::class, 'Upload'])->name('PhotoUpload');

//Harvest Image Upload
Route::post('/HarvestImageUpload', [PhotoUploadController::class, 'HarvestUpload'])->name('HarvestImageUpload');


//User Update
Route::post('/updateUser', [AuthController::class, 'UpdateUser'])->name('UpdateUser');

//Delete Reports
Route::post('/deletereport',[ReportController::class,'DeleteReport'])->name('DeleteReport');

//Edit Report
Route::get('/updatereport/{id}', [ReportController::class,'UpdateReport'])->name('UpdateReport');
Route::post('/updatereportsave', [ReportController::class,'UpdateReportSave']);

Route::post('/submitreport', [ReportController::class, 'AddReport']);
Route::post('/', [ReportController::class, 'setStatus']);
Route::post('/delete-report',[ReportController::class,'Delete'])->name('DeleteReport');





Route::get('/logout', function () {
    Session::flush();
    return redirect()->route('SignIn');
});


Route::get('/graphs', [ReportController::class, 'showGraphs'])->name('Graphs');


Route::get('/', function () {
    return view('map');
})->name('map');

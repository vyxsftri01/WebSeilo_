<?php


use App\Http\Controllers\MediaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ActivityMediaController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/', function () {
        return view('layouts.admin');
    });
    Route::resource('media', MediaController::class);
    Route::resource('profile', ProfileController::class);
    Route::resource('artikel', ArtikelController::class);
    Route::resource('kelas', KelasController::class);
    Route::resource('activity', ActivityController::class);
    Route::resource('activitymedia', ActivityMediaController::class);

});


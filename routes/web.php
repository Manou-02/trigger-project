<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\RetraitController;
use App\Http\Controllers\VersementController;
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


Route::group(['middleware' => ['auth']], function(){
    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::get('/home', function(){
        return view('home');
    });

    Route::resource('/client', ClientController::class);
    Route::resource('/versement', VersementController::class);
    Route::resource('/retrait', RetraitController::class);
});


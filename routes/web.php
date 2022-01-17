<?php

use App\Http\Controllers\AuditCompteController;
use App\Http\Controllers\AuditOperationsController;
use App\Http\Controllers\AuditRetraitController;
use App\Http\Controllers\AuditVersementController;
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

    /** Roue Audit versement et retrait */
    Route::get('/audit/versement', [AuditVersementController::class, 'index'])->name('audit.versement.index');
    Route::delete('/audit/versement/{id}', [AuditVersementController::class, 'destroy'])->name('audit.versement.destroy');
    Route::get('/audit/retrait', [AuditRetraitController::class, 'index'])->name('audit.retrait.index');
    Route::delete('/audit/retrait/{id}', [AuditVersementController::class, 'destroy'])->name('audit.retrait.destroy');


    /**Autres routes */
    Route::get('/versement/create/{client}', [VersementController::class, 'details'])->name('verserment.create.details');
    Route::get('/versement/liste/', [VersementController::class, 'listeVersement'])->name('versement.liste');

    Route::get('/retrait/create/{client}', [RetraitController::class, 'details'])->name('retrait.create.details');
    Route::get('/retrait/liste', [RetraitController::class, 'liste'])->name('retrait.liste');



    Route::resource('/client', ClientController::class);
    Route::resource('/versement', VersementController::class);
    Route::resource('/retrait', RetraitController::class);

    /** Audit routes */
    Route::resource('/audit/compte', AuditCompteController::class);
    Route::resource('/audit/operation', AuditOperationsController::class);

    // Route::group(['prefix' => 'audit'], function(){
    //     Route::resource('/audit/versement', AuditVersementController::class);
    //     Route::resource('/audit/retrait', AuditRetraitController::class);
    // });
});


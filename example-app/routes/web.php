<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncidentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//  Route::get('/', function () {
//      return view('welcome');
//  });


Route::controller(IncidentController::class)->group(function () {
    Route::get('/incidents', 'index')->name('incidents.index');
    Route::get('/incidents/{incident}', 'show')->name('incidents.show');
});

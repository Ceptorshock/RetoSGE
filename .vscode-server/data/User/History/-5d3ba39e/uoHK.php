<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\CommentController;

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


//Route::controller(IncidentController::class)->group(function () {
//    Route::get('/incidents', 'index')->name('incidents.index');
//    Route::get('/incidents/{incident}', 'show')->name('incidents.show');
//})->withoutMiddleware([Auth::class]);

//Route::middleware(['auth'])->group(function () {
    Route::resources([
        'incidents' => IncidentController::class,
        'comments' => CommentController::class
    ]);

    Route::controller(CommentController::class)->group(function () {
        Route::get('/comments/{id}', 'create')->name('comments.create');
    });
//});


//Route::resource('comments', CommentController::class)->except([
//    'create','show','index'
//]);

// Route::resources([
//      'comments' => CommentController::class,
// ]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

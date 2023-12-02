<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PriorityController;
use App\Http\Controllers\StatusController;

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





Route::middleware(['auth'])->group(function () {
    Route::resource('incidents', IncidentController::class)->except([
        'show','index'
   ]);
   
   Route::controller(CommentController::class)->group(function () {
       Route::get('/comments/{id}', 'create')->name('comments.create');
   });
   
   Route::resource('comments', CommentController::class)->except([
       'create','show'
   ]);
});


// Controller siempre detras de Resource por el create. El create debe ser el primero no se por que.
Route::controller(IncidentController::class)->group(function () {
    Route::get('/incidents', 'index')->name('incidents.index');
    Route::get('/incidents/{incident}', 'show')->name('incidents.show');
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('/categories', 'index')->name('categories.index');
    Route::get('/categories/{category}','show')->name('categories.show');
});

Route::controller(DepartmentController::class)->group(function () {
    Route::get('/departments', 'index')->name('departments.index');
    Route::get('/departments/{department}', 'show')->name('departments.show');
});

Route::controller(PriorityController::class)->group(function () {
    Route::get('/priorities', 'index')->name('priorities.index');
    Route::get('/priorities/{priority}', 'show')->name('priorities.show');
});

Route::controller(StatusController::class)->group(function () {
    Route::get('/statuses', 'index')->name('statuses.index');
    Route::get('/statuses/{status}', 'show')->name('statuses.show');
});


Auth::routes();

Route::get('/', [App\Http\Controllers\IncidentController::class, 'index'])->name('incidents.index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
Route::Get('/home', [App\Http\Controllers\HomeController::class, 'update'])->name('home.update');


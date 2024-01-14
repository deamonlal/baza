<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\WorkerController;

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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/workers', [\App\Http\Controllers\WorkerController::class, 'index']);
//Route::get('/show', [\App\Http\Controllers\WorkerController::class, 'show']);
Route::resource('workers', WorkerController::class)->except('store', 'edit');
//Route::put('/workers/update', [\App\Http\Controllers\WorkerController::class, 'update']);

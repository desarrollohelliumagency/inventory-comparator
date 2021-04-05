<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/comparator', App\Http\Controllers\ComparatorController::class);
Route::post('/import/old', [App\Http\Controllers\ImportController::class, 'old'])->name('import.old');
Route::post('/import/new', [App\Http\Controllers\ImportController::class, 'new'])->name('import.new');

Route::get('/compare', [App\Http\Controllers\CompareController::class, 'index'])->name('compare');

<?php

use App\Http\Controllers\PhoneController;
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
    return redirect()->route('phone.index');
});
Route::group(['prefix' => '/phone', 'as' => 'phone.'], function () {
    Route::get('/', [PhoneController::class, 'index'])->name('index');
    Route::get('/{phone}/edit', [PhoneController::class, 'edit'])->name('edit');
    Route::patch('/{phone}', [PhoneController::class, 'update'])->name('update');
    Route::post('/add', [PhoneController::class, 'create'])->name('add');
    Route::delete('/{phone}', [PhoneController::class, 'destroy'])->name('delete');
    Route::get('/search', [PhoneController::class, 'search'])->name('search');
});
Route::view('/create', 'phone.create')->name('create');

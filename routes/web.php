<?php

use App\Http\Controllers\ListDataAdminController;
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
    return view('layouts.master');
});

Route::get('/listdata', [ListDataAdminController::class, 'index'])->name('listdata.admin');
Route::post('/listdata', [ListDataAdminController::class, 'save'])->name('listdata.save');
Route::get('/listdata/{listdata:id}', [ListDataAdminController::class, 'show'])->name('listdata.show');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

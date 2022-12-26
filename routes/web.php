<?php

use App\Http\Controllers\ListDataAdminController;
use App\Http\Controllers\ListDataGuestController;
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
// Route::get('/pdf', function () {
//     return view('admin.pdf');
// });

Route::get('/listdata', [ListDataAdminController::class, 'index'])->name('listdata.admin')->middleware('checkRole:admin,user');
Route::post('/listdata', [ListDataAdminController::class, 'save'])->name('listdata.save')->middleware('checkRole:admin,user');
Route::get('/listdata/{listdata:id}', [ListDataAdminController::class, 'show'])->name('listdata.show')->middleware('checkRole:admin,user');
Route::delete('listdata/{listdata:id}', [ListDataAdminController::class, 'destroy'])->name('listdata.destroy')->middleware('checkRole:admin,user');
Route::get('/', [ListDataGuestController::class, 'index'])->name('listdata.guest');
Route::get('listencrypt/{id}', [ListDataGuestController::class, 'encrypt'])->name('listdatashow.guest');
Route::get('listdownload/{id}/cetak_pdf', [ListDataAdminController::class, 'pdf'])->name('download.pdf')->middleware('checkRole:admin,user');
Route::get('downloadguest/{id}/cetak_pdf', [ListDataGuestController::class, 'pdf'])->name('downloadguest.pdf');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<?php

use App\Http\Controllers\DashboardController;
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
Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function()
{
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.admin');
    
    Route::get('/listdata', [ListDataAdminController::class, 'index'])->name('listdata.admin');
    Route::post('/listdata', [ListDataAdminController::class, 'save'])->name('listdata.save');
    Route::get('/listdata/{listdata:id}', [ListDataAdminController::class, 'show'])->name('listdata.show');
    Route::delete('listdata/{listdata:id}', [ListDataAdminController::class, 'destroy'])->name('listdata.destroy');
Route::get('listdownload/{id}/cetak_pdf', [ListDataAdminController::class, 'pdf'])->name('download.pdf');

});
Route::group(['prefix' => 'user',  'middleware' => 'auth'], function()
{    
    Route::get('/listdata', [ListDataAdminController::class, 'index'])->name('listdata.admin');
    Route::post('/listdata', [ListDataAdminController::class, 'save'])->name('listdata.save');
    Route::get('/listdata/{listdata:id}', [ListDataAdminController::class, 'show'])->name('listdata.show');
    Route::delete('listdata/{listdata:id}', [ListDataAdminController::class, 'destroy'])->name('listdata.destroy');
Route::get('listdownload/{id}/cetak_pdf', [ListDataAdminController::class, 'pdf'])->name('download.pdf');

});

Route::get('/', [ListDataGuestController::class, 'index'])->name('listdata.guest');
Route::get('listencrypt/{id}', [ListDataGuestController::class, 'encrypt'])->name('listdatashow.guest');
Route::get('downloadguest/{id}/cetak_pdf', [ListDataGuestController::class, 'pdf'])->name('downloadguest.pdf');


Auth::routes();
Route::get('/login', function () {
   return view('auth.login');
})->name('login')->middleware('logout');
Route::get('/register', function () {
   return view('auth.register');
})->name('register')->middleware('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

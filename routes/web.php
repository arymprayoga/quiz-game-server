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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('master/')->group(function () {
    Route::get('data-user', [App\Http\Controllers\MasterController::class, 'getViewMasterUser'])->name('data-user');
    Route::get('data-user-get', [App\Http\Controllers\MasterController::class, 'getDataMasterUser'])->name('data-user-get');
    Route::post('data-user-add', [App\Http\Controllers\MasterController::class, 'addDataMasterUser'])->name('add-master-user')->middleware('can:tambah master pengguna');
    Route::post('data-user-delete', [App\Http\Controllers\MasterController::class, 'deleteDataMasterUser'])->name('delete-master-user')->middleware('can:hapus master pengguna');
});

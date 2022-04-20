<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUploadController;

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

// Route::get('file-upload', [FileUploadController::class, 'index']);
// Route::post('store', [FileUploadController::class, 'store']);

Route::prefix('master/')->group(function () {
    Route::get('data-user', [App\Http\Controllers\MasterController::class, 'getViewMasterUser'])->name('data-user');
    Route::get('data-user-get', [App\Http\Controllers\MasterController::class, 'getDataMasterUser'])->name('data-user-get');
    Route::post('data-user-add', [App\Http\Controllers\MasterController::class, 'addDataMasterUser'])->name('add-master-user');
    Route::post('data-user-delete', [App\Http\Controllers\MasterController::class, 'deleteDataMasterUser'])->name('delete-master-user');
    Route::post('data-user-edit', [App\Http\Controllers\MasterController::class, 'editDataMasterUser'])->name('edit-master-user');

    Route::get('data-buku', [App\Http\Controllers\MasterController::class, 'getViewMasterBuku'])->name('data-buku');
    Route::get('data-buku-get', [App\Http\Controllers\MasterController::class, 'getDataMasterBuku'])->name('data-buku-get');
    Route::post('data-buku-add', [App\Http\Controllers\MasterController::class, 'addDataMasterBuku'])->name('add-master-buku');
    Route::post('data-buku-delete', [App\Http\Controllers\MasterController::class, 'deleteDataMasterBuku'])->name('delete-master-buku');

    Route::get('data-soal', [App\Http\Controllers\MasterController::class, 'getViewMasterSoal'])->name('data-soal');
    Route::get('data-soal-get', [App\Http\Controllers\MasterController::class, 'getDataMasterSoal'])->name('data-soal-get');
    Route::get('detail-soal-get/{id}', [App\Http\Controllers\MasterController::class, 'getViewMasterDetailSoal'])->name('detail-soal-get');
    Route::get('export-soal/{id}', [App\Http\Controllers\MasterController::class, 'exportExcel'])->name('export-soal');

    Route::get('get-pdf/{id}', [App\Http\Controllers\MasterController::class, 'getPdfFile']);
});

Route::post('submit-soal', [App\Http\Controllers\SoalController::class, 'submitSoal'])->name('submitSoal');
Route::post('submit-jawaban', [App\Http\Controllers\SoalController::class, 'submitJawaban'])->name('submitJawaban');
Route::get('list-buku/{id}', [App\Http\Controllers\SoalController::class, 'listBuku'])->name('listBuku');
Route::post('login-game', [App\Http\Controllers\SoalController::class, 'loginGameProcess'])->name('loginGame');
Route::get('download-buku/{id}', [App\Http\Controllers\SoalController::class, 'downloadBuku'])->name('downloadBuku');
Route::get('search-buku/{id}', [App\Http\Controllers\SoalController::class, 'searchBuku'])->name('searchBuku');



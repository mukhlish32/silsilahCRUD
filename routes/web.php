<?php

use App\Http\Controllers\SilsilahController;
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

Route::resource('/silsilah', SilsilahController::class);
// Route::get('/silsilah/create-silsilah/{id}/',SilsilahController@createSilsilah)->name(silsilah.create-silsilah);
Route::get('/silsilah/create-silsilah/{id}/{nama}/{ortuid}', [SilsilahController::class, 'createSilsilah'])->name('createSilsilah');
Route::get('/silsilah/edit-silsilah/{id}/{nama}/{ortuid}', [SilsilahController::class, 'editSilsilah'])->name('editSilsilah');

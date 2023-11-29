<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\BandController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
// User
Route::get('/register', [UserController::class, 'addUser'])->name('addUser');
Route::post('/new-user', [UserController::class, 'storeUser'])->name('storeUser');

// Artistas
Route::get('/', [BandController::class, 'getAllBands'])->name('viewBands');
Route::get('/view-band/{id}', [BandController::class, 'viewBand'])->name('viewBand');
Route::get('/add-band', [BandController::class, 'addBand'])->name('addBand')->middleware('auth');
Route::post('/store-band', [BandController::class, 'storeBand'])->name('storeBand');
Route::get('/delete-band/{id}', [BandController::class, 'deleteBand'])->name('deleteBand')->middleware('auth');

// Albuns
Route::get('/view-band-albums/{id}', [AlbumController::class, 'bandAlbums'])->name('viewBandAlbums');
Route::get('view-album/{id}', [AlbumController::class, 'viewAlbum'])->name('viewAlbum');
Route::get('/add-album', [AlbumController::class, 'addAlbum'])->name('addAlbum')->middleware('auth');
Route::post('/store-album', [AlbumController::class, 'storeAlbum'])->name('storeAlbum');
Route::get('/delete-album/{id}', [AlbumController::class, 'deleteAlbum'])->name('deleteAlbum')->middleware('auth');





Route::fallback(function () {
    return view('general.fallback');
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\GaleriUNOController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KelasController;
use App\Models\GaleriUNO;

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
    return view('home');
});

Route::get('/tentang', function () {
    return view('tentang');
});
Route::get('/kontak', function () {
    return view('kontak');
});

Route::resource('/daftar', DaftarController::class);
Route::post('/daftar/{id}', [DaftarController::class, 'update'])->name('daftar.update');
// Route::get('/pendaftaran', [PesertaController::class, 'index'])->middleware('admin');

Route::get('/galeri', function () {
    return view('galeri' , [
        'galeri' => GaleriUNO::latest()->get()
    ]);
});
Route::get('/tentang', function (){
    return view('tentang');
});
Route::get('/login', [LoginController::class , 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::middleware('admin')->prefix('dashboard')->group(function () {
    Route::get('/', function () {
        return view('dashboard.index');
    });

    Route::resource('/kategori', KategoriController::class);
    Route::resource('/kelas', KelasController::class);
    Route::resource('/pendaftaran', PesertaController::class);
    Route::resource('/galeri', GaleriUNOController::class);
});

Route::get('/pendaftaran', [PesertaController::class, 'verify'])->name('pendaftaran.verify')->middleware('admin');
Route::post('/pendaftaran/{id}', [PesertaController::class, 'verify'])->name('pendaftaran.verify')->middleware('admin');
Route::get('/dashboard/pendaftaran/{id}/print', [PesertaController::class, 'print'])->name('pendaftaran.print');
Route::get('/get-kelas', [KelasController::class, 'getKelasByKategoriAndBerat']);
Route::get('/search-nama', [DaftarController::class, 'searchNama']);
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\jenisCutiController;
use App\Http\Controllers\MyProfileController;
use App\Http\Controllers\kalenderCutiController;
use App\Http\Controllers\PenguranganCutiController;

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
})->name('login')->middleware('guest');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('dashboard', DashboardController::class)->except('create', 'store', 'show', 'edit', 'update', 'delete')->middleware('auth');

Route::group(['middleware' => ['semua_posisi']], function () {
    Route::resource('myprofile', MyProfileController::class);
    Route::prefix('data')->group(function () {
        Route::get('cuti', [CutiController::class, 'index']);
        Route::get('cuti/create', [CutiController::class, 'create']);
        Route::post('cuti', [CutiController::class, 'store']);

        // for jquery
    });
    
    Route::get('jeniscuti/{jeniscuti}', [CutiController::class, 'jenisCuti']);
        Route::get('sisacuti/{id}', [CutiController::class, 'sisaCuti']);
        Route::get('npp/{npp}', [CutiController::class, 'ambilNpp']);
});

Route::group(['middleware' => ['posisi_atasan']], function () {
    Route::get('data/approval', [ApprovalController::class, 'index']);
    Route::get('data/approval/{id}', [ApprovalController::class, 'detail']);
    Route::put('data/approval/{cuti}', [ApprovalController::class, 'update']);
    Route::get('download/{id}', [ApprovalController::class, 'download']);

    Route::get('pengurangan-cuti', [PenguranganCutiController::class, 'index']);
    Route::get('pengurangan-cuti/create', [PenguranganCutiController::class, 'create']);
    Route::post('pengurangan-cuti', [PenguranganCutiController::class, 'store']);
    Route::get('/ambil-nama/{nama}', [PenguranganCutiController::class, 'ambilNama']);
});
Route::group(['middleware' => ['is_admin']], function () {

    Route::prefix('admin')->group(function () {
        Route::get('data-pegawai', [AdminController::class, 'index']);
        Route::get('data-pegawai/create', [AdminController::class, 'create']);
        Route::post('data-pegawai', [AdminController::class, 'store']);
        Route::get('data-pegawai/{id}/edit', [AdminController::class, 'edit']);
        Route::put('data-pegawai/{user}', [AdminController::class, 'update']);
        Route::delete('data-pegawai/{user}', [AdminController::class, 'destroy']);

        Route::resource('jenis-cuti', jenisCutiController::class)->except('show');
    });
});
Route::get('/kalendercuti', [kalenderCutiController::class, 'index']);

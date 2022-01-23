<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\jenisCutiController;

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
})->name('login');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => ['auth']], function () {
<<<<<<< HEAD
    Route::resource('dashboard', DashboardController::class)->except('create', 'store', 'show', 'edit', 'update', 'delete');

    Route::prefix('data')->group(function () {
        Route::get('cuti', [CutiController::class, 'index']);
        Route::get('cuti/create', [CutiController::class, 'create']);
        Route::post('cuti', [CutiController::class, 'store']);
    });
=======
    Route::resource('dashboard', DashboardController::class);
<<<<<<< HEAD
    Route::resource('data/cuti', DatacutiController::class);
    Route::resource('admin', AdminController::class);
>>>>>>> 418e8ec2b765f9edac287cbbb6ea788e39cfb446
});

Route::group(['middleware' => ['posisi']], function () {
    Route::get('data/approval', [ApprovalController::class, 'index']);
=======
    Route::get('/cuti', function () {
        return view('dataCuti.index', ['title' => 'Data Cuti']);
    });
    Route::get('/cuti/create', function () {
        return view('dataCuti.create', ['title' => 'Form Cuti']);
    });
>>>>>>> 0096b1867d32b39fa843c5bf6fcb70f65afed417
});
Route::group(['middleware' => ['is_admin']], function () {

    Route::prefix('admin')->group(function () {
        Route::get('data-pegawai', [AdminController::class, 'index']);
        Route::get('data-pegawai/create', [AdminController::class, 'create']);
        Route::post('data-pegawai', [AdminController::class, 'store']);
        Route::delete('data-pegawai/{user}', [AdminController::class, 'destroy']);
    });
    Route::resource('admin/jenis-cuti', jenisCutiController::class)->except('show');
});

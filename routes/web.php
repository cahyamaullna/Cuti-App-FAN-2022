<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\jenisCutiController;
use App\Http\Controllers\MyProfileController;

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

Route::resource('dashboard', DashboardController::class)->except('create', 'store', 'show', 'edit', 'update', 'delete')->middleware('auth');

Route::group(['middleware' => ['semua_posisi']], function () {
    Route::resource('myprofile', MyProfileController::class);
    Route::prefix('data')->group(function () {
        Route::get('cuti', [CutiController::class, 'index']);
        Route::get('cuti/create', [CutiController::class, 'create']);
        Route::post('cuti', [CutiController::class, 'store']);
    });
    Route::get('/jeniscuti/{jeniscuti}', [CutiController::class, 'jeniscuti']);
    Route::get('/sisacuti/{user_id}', [CutiController::class, 'sisacuti']);
});

Route::group(['middleware' => ['posisi_atasan']], function () {
    Route::get('data/approval', [ApprovalController::class, 'index']);
    Route::get('data/approval/{id}', [ApprovalController::class, 'edit']);
    Route::get('download/{id}', [ApprovalController::class, 'download']);
    Route::put('data/approval/{cuti}', [ApprovalController::class, 'update']);

    Route::get('pengurangan-cuti', [CutiController::class, 'penguranganCuti']);
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

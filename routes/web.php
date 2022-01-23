<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\DatacutiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserDashboardController;
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
    return view('user-dashboard');
})->name('dashboard');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('dashboard', DashboardController::class)->except('create', 'store', 'show', 'edit', 'update', 'delete');
    Route::resource('user-dashboard', UserDashboardController::class);
    Route::resource('data/cuti', DatacutiController::class);
    Route::resource('myprofile', MyProfileController::class);

});

Route::group(['middleware' => ['posisi']], function () {
    Route::get('data/approval', [ApprovalController::class, 'index']);
});
Route::group(['middleware' => ['is_admin']], function () {

    Route::prefix('admin')->group( function() {
        Route::get('data-pegawai', [AdminController::class, 'index']);
        Route::get('data-pegawai/create', [AdminController::class, 'create']);
        Route::post('data-pegawai', [AdminController::class, 'store']);     
        Route::delete('data-pegawai/{user}', [AdminController::class, 'destroy']);
    });
    
});

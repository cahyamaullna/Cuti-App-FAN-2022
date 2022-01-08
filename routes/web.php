<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DatacutiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApprovalController;

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
    Route::resource('dashboard', DashboardController::class);
    Route::resource('data/cuti', DatacutiController::class);
    Route::resource('admin', AdminController::class);
});
Route::group(['middleware' => ['posisi']], function () {
    Route::get('data/approval', [ApprovalController::class, 'index']);
});

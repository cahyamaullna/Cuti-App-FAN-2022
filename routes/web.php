<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;


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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('dashboard', DashboardController::class);
    Route::get('/cuti', function () {
        return view('dataCuti.index', ['title' => 'Data Cuti']);
    });
    Route::get('/cuti/create', function () {
        return view('dataCuti.create', ['title' => 'Form Cuti']);
    });
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PptStatisticsController;

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

Route::get(
    '/ppt',
    [PptStatisticsController::class, 'index']
);
Route::get(
    '/ppt/test-get-pegawai',
    [PptStatisticsController::class, 'testGetPegawai']
);
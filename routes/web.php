<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [DataController::class, 'show']);
Route::get('/api/csuga1', [DataController::class, 'csuga1']);
Route::get('/button', [DataController::class, 'button']);
Route::get('/bulan', [DataController::class, 'bulan']);
Route::get('/pupuk', [DataController::class, 'pupuk']);
Route::get('/tombol2', [DataController::class, 'tobol']);

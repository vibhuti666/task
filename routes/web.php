<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleSheetsController;


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

Route::get('/', [GoogleSheetsController::class, 'previewSheet']);
Route::get('/get-google-sheet-data', [GoogleSheetsController::class, 'rawArraySheet']);
Route::get('/genrate-report', [GoogleSheetsController::class, 'genrateReport']);
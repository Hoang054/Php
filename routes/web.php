<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManhourReportController;
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

Route::get('/', [ManhourReportController::class, 'index']);

Route::get('/index', [ManhourReportController::class, 'index']);
Route::get('/ManhourReport/GetsGroupName', [ManhourReportController::class, 'GetsGroupName']);
Route::get('/ManhourReport/GetsUserName/{groupCode}', [ManhourReportController::class, 'GetsUserName']);
Route::get('/ManhourReport/WorkContents/{themeNo}', [ManhourReportController::class, 'GetsWorkContent']);
Route::get('/ManhourReport/GetsThemeName', [ManhourReportController::class, 'GetsThemeName']);
Route::get('/ManhourReport/AddTheme/{id}', [ManhourReportController::class, 'AddTheme']);
Route::get('/ManhourReport/GetManhourReport/{id}', [ManhourReportController::class, 'GetManhourReport']);
Route::post('/ManhourReport/CheckSave', [ManhourReportController::class, 'CheckSave']);
Route::post('/ManhourReport/CheckReport', [ManhourReportController::class, 'CheckReport']);
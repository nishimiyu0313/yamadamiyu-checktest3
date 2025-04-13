<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Weight_logController;

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


Route::get('/weight_logs', [Weight_logController::class, 'admin']);
Route::get('/weight_logs/create', [Weight_logController::class, 'create']);
Route::post('/weight_logs/create', [Weight_logController::class, 'store']);
Route::get('/weight_logs/search', [Weight_logController::class, 'search']);
Route::get('/weight_logs/{:weightLogId}/update', [Weight_logController::class, 'update']);
Route::get('/weight_logs/{:weightLogId}/delete', [Weight_logController::class, 'destroy']);
Route::get('/weight_logs/goal_setting', [Weight_logController::class, 'target']);

Route::get('/weight_logs/step2', [Weight_logController::class, 'profile']);

<?php

use App\Http\Controllers\AddController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/show/{id}', [AddController::class, 'showApi'])->name('showAdd');
Route::get('/popular', [AddController::class, 'popularApi'])->name('showPopularAdd');
Route::post('/create', [AddController::class, 'store'])->name('createAdd');
Route::put('/update/{id}', [AddController::class, 'update'])->name('updateAdd');

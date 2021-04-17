<?php

use App\Http\Controllers\AddController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AddController::class, 'create']);
Route::get('/{id}', [AddController::class, 'edit']);
Route::get('/show/{id}', [AddController::class, 'show']);
Route::get('/popular', [AddController::class, 'popular']);

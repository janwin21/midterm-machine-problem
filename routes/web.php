<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassController;

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

Route::get('/', [ClassController::class, 'home']);
Route::get('/collection', [ClassController::class, 'collection']);
Route::get('/store', [ClassController::class, 'store']);
Route::post('/create', [ClassController::class, 'create']);
Route::get('/update/{id}', [ClassController::class, 'update']);
Route::get('/delete/{id}', [ClassController::class, 'delete']);
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AfilliatesUploadController;

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

Route::get('/', [AfilliatesUploadController::class, 'createForm']);
Route::post('/', [AfilliatesUploadController::class, 'fileUpload'])->name('fileUpload');

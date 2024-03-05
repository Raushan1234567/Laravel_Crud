<?php
use Laravel\Jetstream\Features;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RaviController;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [RaviController::class, 'index']);
Route::get('/product/creates',[RaviController::class,'create']);
Route::post('/product/store',[RaviController::class,'store']);

Route::delete('/product/{id}/destroy', [RaviController::class, 'destroy'])->name('product.destroy');


Route::get('/product/{id}/edit', [RaviController::class, 'edit'])->name('product.edit');
Route::patch('/product/{id}/update', [RaviController::class, 'update']);




<?php

use App\Http\Controllers\VideoController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::any('videos/search',[VideoController::class,'search'])->name('video.search');
Route::get('videos',[VideoController::class, 'index'])->name('video.index');
Route::get('videos/create',[VideoController::class, 'create'])->name('video.create');
Route::post('videos',[VideoController::class, 'store'])->name('video.store');
Route::get('videos/{id}',[VideoController::class,'show'])->name('video.show');
Route::delete('videos/{id}',[VideoController::class,'destroy'])->name('video.destroy');
Route::get('videos/edit/{id}',[VideoController::class, 'edit'])->name('video.edit');
Route::put('videos/edit/{id}',[VideoController::class, 'update'])->name('video.update');

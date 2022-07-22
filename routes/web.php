<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\VideoController;
use App\Models\Categorie;
use App\Models\Video;
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

// Route videos
Route::any('videos/search',[VideoController::class,'search'])->name('video.search');
Route::get('videos',[VideoController::class, 'index'])->name('video.index');
Route::get('videos/create',[VideoController::class, 'create'])->name('video.create');
Route::post('videos',[VideoController::class, 'store'])->name('video.store');
Route::get('videos/{id}',[VideoController::class,'show'])->name('video.show');
Route::delete('videos/{id}',[VideoController::class,'destroy'])->name('video.destroy');
Route::get('videos/edit/{id}',[VideoController::class, 'edit'])->name('video.edit');
Route::put('videos/edit/{id}',[VideoController::class, 'update'])->name('video.update');

// Route categories
Route::any('categories/search',[CategorieController::class,'search'])->name('categories.search');
Route::get('categories',[CategorieController::class, 'index'])->name('categories.index');
Route::get('categories/create',[CategorieController::class, 'create'])->name('categories.create');
Route::post('categories',[CategorieController::class, 'store'])->name('categories.store');
Route::get('categories/{id}',[CategorieController::class,'show'])->name('categories.show');
Route::delete('categories/{id}',[CategorieController::class,'destroy'])->name('categories.destroy');
Route::get('categories/edit/{id}',[CategorieController::class, 'edit'])->name('categories.edit');
Route::put('categories/edit/{id}',[CategorieController::class, 'update'])->name('categories.update');
Route::get('categories/{id}/videos',[CategorieController::class, 'listVideos'])->name('categories.listVideos');

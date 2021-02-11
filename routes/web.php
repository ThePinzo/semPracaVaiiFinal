<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\TipController;
use App\Http\Controllers\UserController;
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
Route::resource('tip', TipController::class);

Route::get('/', 'App\Http\Controllers\TipController@index')->name('/');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('user', UserController::class);
Route::get('user/{id}/delete', [UserController::class, 'destroy'])->name('user.delete');


Route::resource('article', ArticleController::class);
Route::group(['middleware' => ['auth']], function () {
    Route::get('article/{id}/delete', [ArticleController::class, 'destroy'])->name('article.delete');
});

Route::resource('gallery', GalleryController::class);
Route::get('article/show ', [App\Http\Controllers\ArticleController::class, 'show'])->name('article.show');




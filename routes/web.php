<?php

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

Auth::routes();

// Rotta generica per admin protetta da autenticazione
Route::prefix('admin')->name('admin.')->namespace('Admin')->middleware('auth')->group(function () {
    // Rotte specifiche per admin
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('posts', 'ArticleController@index');
});

// Rotta index per guests
Route::get('posts', 'ArticleController@index')->name('posts.index');
// Rotta show per guests
Route::get('posts/{slug}', 'ArticleController@show')->name('posts.show');

// Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

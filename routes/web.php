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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/get-github-token', \GitHub\GetToken::class)->name('getToken');
Route::post('/delete-github-token', \GitHub\DeleteToken::class)->name('deleteToken');
Route::post('/save-github-token', \GitHub\SaveToken::class)->name('saveToken');

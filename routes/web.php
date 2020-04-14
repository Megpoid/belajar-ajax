<?php

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

Route::get('/card', 'CardController@index')->name('card.index');
Route::get('/card/cardList', 'CardController@getCardList')->name('card.list');
Route::post('/card/store', 'CardController@store')->name('card.store');
Route::get('/card/delete/{id}', 'CardController@destroy')->name('card.destroy');
Route::get('/card/edit/{id}', 'CardController@edit')->name('card.edit');
Route::post('/card/update/{id}', 'CardController@update')->name('card.update');
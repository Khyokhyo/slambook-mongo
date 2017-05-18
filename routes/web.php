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

Route::get('home', 'HomeController@index')->name('home');
Route::get('questions', 'HomeController@questions')->name('questions');
Route::post('addQuestion', 'HomeController@addQuestion')->name('addQuestion');
Route::get('deleteQuestion/{id}', 'HomeController@deleteQuestion')->name('deleteQuestion');
Route::get('search', 'HomeController@search')->name('search');
Route::post('search', 'HomeController@searchResults')->name('searchResults');
Route::get('profile/{id}', 'HomeController@profile')->name('profile');
Route::get('send/{id}', 'HomeController@send')->name('send');
Route::get('requests', 'HomeController@requests')->name('requests');
Route::get('page/{id}', 'HomeController@page')->name('page');
Route::put('store', 'HomeController@store')->name('store');
Route::get('delete/{id}', 'HomeController@delete')->name('delete');
Route::get('slams', 'HomeController@slams')->name('slams');
Route::get('slams/{id}', 'HomeController@postSlams')->name('postSlams');
Route::get('edit/{id}', 'HomeController@edit')->name('edit');


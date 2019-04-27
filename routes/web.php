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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('results/', 'HomeController@get_results')->name('get_results');

Route::get('/candidates', 'HomeController@candidates')->name('candidates');

Route::get('admin', 'AdminController@admin')->name('admin')->middleware('admin');

Route::get('admin/esc', 'AdminController@esc')->name('esc')->middleware('admin');

Route::get('/users', 'AdminController@load_users')->name('view_users')->middleware('admin');

Route::post('admin/', 'AdminController@add')->name('add_candidate')->middleware('admin');

Route::post('/esc', 'AdminController@change')->name('change')->middleware('admin');

Route::post('admin/esc', 'AdminController@release')->name('results')->middleware('admin');

Route::post('users', 'AdminController@remove')->name('remove')->middleware('admin');

Route::post('/home', 'HomeController@vote')->name('vote');

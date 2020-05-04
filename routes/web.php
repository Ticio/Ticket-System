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

	if(Auth::user()){
    	return redirect(route("home"));
    }
    else{
    	return redirect(route("login"));
    }
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();


Route::group(['middleware' => ['auth']], function () {
	Route::post('/assign', 'TicketController@assign')->name("assign");
	Route::get('/ticket/{id}', 'TicketController@ticket')->name('ticket');
	Route::post('/comment', 'TicketController@comment')->name('comment');
	Route::post('/report', 'TicketController@report')->name('report');
	Route::post('/request', 'TicketController@request')->name('request');
	Route::post('/update', 'TicketController@update')->name('update');

	Route::get('/filter_staff', 'TicketController@filter_staff')->name('filter_staff');
	Route::get('/filter_user', 'TicketController@filter_user')->name('filter_user');

	Route::get('/profile', 'UserController@profile')->name('profile');
	Route::post('/user_details', 'UserController@user_details')->name('user_details');
	Route::post('/password', 'UserController@password')->name('password');

	Route::post('/report', 'TicketController@report')->name('report');
	Route::get('/home', 'HomeController@index')->name('home');
});
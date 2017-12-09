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

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/viewdata','AlumniController@get');
Route::get('/viewdata_s','AlumniController@get_s');
Route::get('/year/{year}','AlumniController@getyear');
Route::post('/notesedit/{id}','AlumniController@editnotes');
Route::get('/addalumni',function(){
	$message = '';
	return view('addalumni',compact('message'));
});
Route::get('/addtag','TagslistController@index');
Route::post('/addalumni','AlumniController@index');
Route::post('/editalumnidata','AlumniController@editdata');
Route::post('/editalum','AlumniController@editt');
Route::get('/profile/{id}','AlumniController@profile');
Route::post('/addtag','TagslistController@postdata');
Route::post('/deletetag','TagslistController@deletedata');
Route::post('/access','AccessController@post');
Route::get('/access','AccessController@index');
Route::post('/assigntag/{id}','AddtagController@index');
Route::post('/taggdelete/{id}','AddtagController@delete');

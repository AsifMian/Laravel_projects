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

Route::get('/', 'AlbumsController@index');
Route::get('/albums', 'AlbumsController@index');
Route::get('/album/create', 'AlbumsController@create');
Route::get('/albums/{id}', 'AlbumsController@show');
Route::post('/albums/store', 'AlbumsController@store');

//route for upload photo to album
Route::get('photos/create/{id}', 'PhotosController@create');
//delete the whole album
Route::get('/albums/delete/{id}', 'AlbumsController@destroyAlbum');
//to store photo in albums
Route::post('photos/store', 'PhotosController@store');
Route::get('photos/{id}', 'PhotosController@show');
Route::delete('photos/{id}', 'PhotosController@destroy');



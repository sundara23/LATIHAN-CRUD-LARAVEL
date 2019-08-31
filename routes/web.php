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

Route::get('/', 'PagesController@home');
Route::get('/about', 'PagesController@about');

Route::get('/mahasiswa', 'MahasiswaController@index');

// Student
Route::get('/students', 'StudentsController@index');
Route::get('/students/create', 'StudentsController@create');
Route::get('/students/{student}', 'StudentsController@show');
Route::post('/students', 'StudentsController@store');
Route::delete('/students/{student}', 'StudentsController@destroy');
Route::get('/students/{student}/edit', 'StudentsController@edit');
Route::patch('/students/{student}', 'StudentsController@update');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Upload files 
Route::get('/files', 'FileController@index');
Route::get('/files/create', 'FileController@create');
Route::post('/files', 'FileController@store');
Route::delete('/files/{file}', 'FileController@destroy');
Route::get('/files/{file}/edit', 'FileController@edit');
Route::patch('/files/{file}', 'FileController@update');

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

Route::get('/', 'BlogController@index')->name('blog.index');
Route::get('/blogs/create', 'BlogController@create')->name('blog.create')->middleware('auth');
Route::get('/blogs/{blog}/show', 'BlogController@show')->name('blog.show');
Route::get('/blogs/{blog}/edit', 'BlogController@edit')->name('blog.edit')->middleware('auth');
Route::post('/blogs/create', 'BlogController@store')->name('blog.store')->middleware('auth');
Route::patch('/blogs/{blog}/update', 'BlogController@update')->name('blog.update')->middleware('auth');
Route::delete('/blogs/{blog}/delete', 'BlogController@destroy')->name('blog.destroy')->middleware('auth');

Route::get('/admin/getallblogs', 'BlogController@admingetall')->name('blog.getall')->middleware('auth');
Route::patch('/blogs/{blog}/approve', 'BlogController@approve')->name('blog.approve')->middleware('auth');
Route::patch('/blogs/{blog}/deny', 'BlogController@deny')->name('blog.deny')->middleware('auth');
Route::get('/admin/getallblogs', 'BlogController@admingetall')->name('blog.getall')->middleware('auth');
Route::get('/admin/getallusers', 'UserController@admingetall')->name('user.getall')->middleware('auth');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

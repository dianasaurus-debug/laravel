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
Route::get('/student', 'StudentController@index')->name('studentpage');
Route::get('student-login','Auth\StudentLoginController@showLoginForm');
Route::post('student-login', ['as' => 'student-login', 'uses' => 'Auth\StudentLoginController@login']);
Route::get('student-register','Auth\StudentLoginController@showRegisterPage');
Route::post('student-register', 'Auth\StudentLoginController@register')->name('student.register');
Route::get('admin-login', 'Auth\AdminLoginController@showLoginForm');
Route::post('admin-login', ['as'=>'admin-login','uses'=>'Auth\AdminLoginController@login']);
Route::get('/admin', 'AdminController@index')->name('adminpage');
Route::get('penyedia-login', 'Auth\PenyediaLoginController@showLoginForm');
Route::post('penyedia-login', ['as'=>'penyedia-login','uses'=>'Auth\PenyediaLoginController@login']);
Route::get('/penyedia', 'PenyediaController@index')->name('penyediapage');
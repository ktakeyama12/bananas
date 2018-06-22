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

Route::get('bananas.create', 'BananasController@create')->name('bananas.create');
Route::post('/banana', 'BananasController@store')->name('bananas.store');
Route::get('bananas.shokika', 'BananasController@shokika')->name('bananas.shokika');
Route::get('quiz.sakusei', 'QuizController@sakusei')->name('quiz.sakusei');
Route::get('quiz.answer', 'QuizController@answer')->name('quiz.answer');
Route::post('/quiz', 'QuizController@store')->name('quiz.store');
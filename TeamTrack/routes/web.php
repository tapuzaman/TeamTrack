<?php

use App\Team;
use App\User;

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

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

// Data Routes
Route::get('/import_data','DataController@importData'); // import data
Route::get('/empty_data','DataController@emptyData'); // empty database

Route::get('/contact', 'PagesController@contact');
Route::get('/about', 'PagesController@about');

// Task Routes
Route::resource('tasks', 'TasksController');

// Team Routes
Route::get('teams','TeamsController@index');
Route::get('teamsmasterindex','TeamsController@masterindex');
Route::get('teams/create','TeamsController@create');
Route::get('teams/{id}','TeamsController@show'); // Team deshboard page - currents shows member list
// implement delete Team route and method
Route::get('teams/member/add/{id}','TeamsController@addMember'); // Add member to team page
// implement delete Member route and method
Route::post('teams','TeamsController@store');   // required for post actions
Route::post('teams/member/add','TeamsController@storeMember');   // required for post actions

// // Team Routes
// Route::get('teams','TeamsController@index');
// Route::get('teamsmasterindex','TeamsController@masterindex');
// Route::get('teams/create','TeamsController@create');
// Route::get('teams/{id}','TeamsController@show');
// // implement delete Team route and method
// Route::get('teams/addMember/{id}','TeamsController@addMember');
// // implement delete Member route and method
// Route::post('teams','TeamsController@store');   // required for post actions
// Route::post('teams/addMember','TeamsController@storeMember');   // required for post actions





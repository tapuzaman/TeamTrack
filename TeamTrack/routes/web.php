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

Route::get('/help', function () {
    return '<b>Hello</b>';
});
Route::get('/service', function () {
    return '<b>never</b>';
});



Route::get('/TEST', function () {
    return '<b>CHOLE NA</b>';
});

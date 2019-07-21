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
    return view('auth.login');
});

// Auth::routes(['register' => false]);
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/staff', 'StaffController@index')->name('staff');
Route::post('/staff', 'StaffController@store');

Route::post('/incident', 'IncidentsController@store')->name('incident');
Route::delete('/incident/{incident}', 'IncidentsController@destroy')->name('incident');

Route::get('/incident_type', 'IncidentTypeController@index')->name('incident_type');
Route::put('/incident_type/{incident_type}', 'IncidentTypeController@update')->name('incident_type');

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

// Routes for DASHBOARD
Route::get('dashboard', 'DashboardController@index')->name('dashboard');


// **DASHBOARD** functions for Staff
Route::get('staffs', 'StaffsController@index')->name('staffs');
Route::post('staffs', 'StaffsController@store')->name('staffs');
Route::delete('/taffs/{staff}', 'StaffsController@destroy')->name('staffs');


// **DASHBOARD** functions for Incidents
Route::get('incident', 'IncidentsController@index')->name('incident');
Route::post('incident', 'IncidentsController@store')->name('incident');
Route::delete('incident/{incident}', 'IncidentsController@destroy')->name('incident');


// Routes for CHAT
Route::get('chatUI', 'ChatController@chatUI')->name('chatUI');
Route::get('chatClientUI', 'ChatController@chatClient')->name('chatClientUI');


// Routes for Notifications
Route::resource('notification', 'NotificationController');
Route::get('/getusernotifications', 'NotificationController@getUserNotifications')->name('getusernotifications');


// **NOTIFICATION CENTER** functions for sUPERVISORS
Route::get('NCSupervisor', 'NCSupervisorController@index')->name('supervisorNC');


// **NOTIFICATION CENTER** functions for Staff
Route::get('NCStaff', 'NCStaffController@index')->name('staffNC');



// Route::put('/incident_type/{incident_type}', 'IncidentTypeController@update')->name('incident_type');

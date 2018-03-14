<?php

use App\Http\Controllers\StravaersController;
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
    return view('pages.welcome');
});

Route::get('/stravaers', function () {
    $companies = App\Company::all(['name', 'id']);
    return view('pages.stravaers', ['companies' => $companies]);
});

Route::post('/stravaers', 'StravaersController@store')->middleware('auth');


Route::get('login/strava', 'Auth\LoginController@redirectToProvider')->name('stravalogin');
Route::get('login/strava/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('leaderboard', 'StravaersController@loadLeaderboard')->name('leaderboard');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

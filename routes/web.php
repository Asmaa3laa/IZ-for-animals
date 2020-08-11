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
Route::group(['middleware' => ['auth','admin']], function () {
Route::get('admin/home', 'HomeController@adminHome')->name('admin.home');
Route::get('users/doctor','UserController@doctorUsers');
Route::get('users/clinic','UserController@clinicUsers');
Route::get('users/pending','UserController@pendingUsers');
Route::get('users/verify/{id}','UserController@verifyUser');

    
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('login-role', function () {
    return view('auth.role');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('blog','BlogController');
// Route::get('clinic-login', function () {
//     return view('auth.clinicRegister');
// });
Route::resource('user', 'UserController');
Route::resource('clinic', 'ClinicController');
Route::get('/get-state-list/{country_id}','CountryStateController@getStateList');

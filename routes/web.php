<?php

use Illuminate\Support\Facades\Route;
use App\Blog;

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
})->name('index');
Route::group(['middleware' => ['auth','admin','can:manage.users']], function () {
Route::get('admin/home', 'HomeController@adminHome')->name('admin.home');
Route::resource('user', 'UserController');
Route::get('users/doctor','UserController@doctorUsers');
Route::get('users/clinic','UserController@clinicUsers');
Route::get('users/pending','UserController@pendingUsers');
Route::get('users/verify/{id}','UserController@verifyUser');

});
Route::get('map', function () {
    return view('map');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('login-role', function () {
    return view('auth.role');
});
Auth::routes();
Route::get('blog/accepted','blogController@acceptedBlogs');
Route::get('blog/pending','blogController@pendingBlogs');
Route::get('blog/accept/{blogId}','blogController@accept');
Route::get('blog/deny/{id}','blogController@deny')->name('deny');
Route::resource('blog','BlogController');
// Route::get('clinic-login', function () {
//     return view('auth.clinicRegister');
// });
Route::resource('profile', 'ProfileController');
Route::resource('clinic', 'ClinicController');
Route::get('/get-state-list/{country_id}','CountryStateController@getStateList');
Route::resource('tag','TagController');
Route::resource('blogtag','BlogTagController')->only('show');
Route::post ( '/search','ClinicController@search')->name('search');
Route::get('item/{item}', function($itemId){
    $blog = Blog::findOrFail($itemId);
    // dd($blog);
    return view('admin.blogs.single-blog', compact('blog'));
});
Auth::routes();

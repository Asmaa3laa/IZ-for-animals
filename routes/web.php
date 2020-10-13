<?php

use Illuminate\Support\Facades\Route;
use App\Blog;
use App\Tag;
use App\BlogTag;

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
Route::group(['middleware' => ['auth','admin']], function () {
    Route::get('admin/home', 'HomeController@adminHome')->name('admin.home');
    Route::get('admin/create', 'AdminController@create')->name('admin.create');
    Route::post('admin/store', 'AdminController@store')->name('admin.store');
    Route::get('admin/blog/create',function(){
        $tags=Tag::all();
        return view('admin.blogs.create',compact('tags'));
    });
    Route::resource('user', 'UserController');
    Route::get('users/doctor','UserController@doctorUsers');
    Route::get('users/clinic','UserController@clinicUsers');
    Route::get('users/pending','UserController@pendingUsers');
    Route::get('users/verify/{id}','UserController@verifyUser');
    Route::get('send-mail', function () {
    return view('admin.sendMail'); 
        });
});

Route::get('map', function () {
    return view('map');
});
Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::resource('profile', 'ProfileController');
    
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('login-role', function () {
    return view('auth.role');
});
Auth::routes();
Route::get('blog/accepted','blogController@acceptedBlogs');
Route::get('blog/pending','blogController@pendingBlogs');
Route::get('blog/accept','blogController@accept');
Route::get('blog/deny/{id}','blogController@deny')->name('deny');
Route::resource('blog','BlogController');               
// Route::get('clinic-login', function () {
//     return view('auth.clinicRegister');
// });
Route::resource('clinic', 'ClinicController');
Route::get('/get-state-list/{country_id}','CountryStateController@getStateList');
Route::resource('tag','TagController');
Route::resource('blogtag','BlogTagController')->only('show');
Route::post ('/search','ClinicController@search')->name('search');
Route::get('item/{item}', function($itemId){
    $blog = Blog::findOrFail($itemId);
    $blog_tags = BlogTag::where('blog_id','=',$itemId)->get();
    $all_tags = Tag::all();
    // dd($blog);
    return view('admin.blogs.single-blog', compact('blog','blog_tags','all_tags'));
});
Auth::routes();

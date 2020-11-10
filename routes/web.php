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
    $latest_blogs = Blog::orderBy('created_at', 'desc')->take(2)->get();
    return view('welcome',compact('latest_blogs'));
})->name('index');

Route::group(['middleware' => ['auth','admin']], function () {
    Route::get('admin/home', 'HomeController@adminHome')->name('admin.home');
    Route::get('admin/blog/create',function(){
        $tags=Tag::all();
        return view('admin.blogs.create',compact('tags'));
    });
    Route::group(['middleware' => ['auth','superadmin']], function () {
    Route::resource('admin', 'AdminController');
    Route::resource('tag','TagController');
    });
    Route::resource('user', 'UserController');
    Route::get('users/doctor','UserController@doctorUsers');
    Route::get('users/clinic','UserController@clinicUsers');
    Route::get('users/pending','UserController@pendingUsers');
    Route::get('users/verify/{id}','UserController@verifyUser'); 
    Route::delete('user/delete/{id}','UserController@delete')->name('deleteuser');
    Route::get('blog-deny/{id}','BlogController@denyBlog')->name('blog-deny');
    Route::get('send-mail', function () {
    return view('admin.sendMail'); 
        });
});

// Route::get('map', function () {
//     return view('map');
// });
Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::resource('profile', 'ProfileController');
    
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('login-role', function () {
    return view('auth.role');
});
Route::get('blog/accepted','BlogController@acceptedBlogs');
Route::get('blog/pending','BlogController@pendingBlogs');
Route::get('blog/accept','BlogController@accept');
Route::resource('blog','BlogController');               
Route::get ('/clinic/search','ClinicController@search')->name('search');
Route::post('/clinic/fetch', 'ClinicController@fetch')->name('autocomplete.fetch');
Route::resource('clinic', 'ClinicController');
Route::get('/get-state-list/{country_id}','CountryStateController@getStateList');
Route::resource('blogtag','BlogTagController')->only('show');
Route::get('item/{item}', function($itemId){
    $blog = Blog::findOrFail($itemId);
    $blog_tags = BlogTag::where('blog_id','=',$itemId)->get();
    $all_tags = Tag::all();
    return view('admin.blogs.single-blog', compact('blog','blog_tags','all_tags'));
});
Route::post('/search-state','ClinicController@searchByState');
Route::view('/about','about')->name('about');

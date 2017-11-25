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

// Authentication Routes
/*Route::get('auth/login', 'Auth\LoginController@showLoginForm');
Route::post('auth/login', 'Auth\LoginController@login');*/
Route::get('auth/logout', ['as' => 'authlogout', 'uses' => 'Auth\LoginController@logout']);

// Registration Routes
/*Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('auth/register', 'Auth\RegisterController@register');*/

// Password Reset Routes
/*Route::get('password/reset/{token?}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');*/

Route::resource('categories', 'CategoryController', ['except' => ['create']]);
Route::resource('tags', 'TagController', ['except' => ['create']]);

Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])
    ->where('slug', '[\w\d\-\_]+');
Route::get('blog', ['as' => 'blog.index', 'uses' => 'BlogController@getIndex']);
Route::get('contact', 'PagesController@getContact');
Route::post('contact', 'PagesController@postContact');

Route::get('about', 'PagesController@getAbout');
Route::get('/', 'PagesController@getIndex');
Route::resource('posts','PostController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

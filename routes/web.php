<?php

use Illuminate\Support\Facades\Auth;
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
use App\Mail\NewUserWelcomeMail;

Auth::routes();
Route::get('email', function () {
    return new NewUserWelcomeMail();
});
Route::post('profile/follow/{user}', 'FollowController@store');
// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile/{id}', 'ProfileController@index')->name('profile.show');
Route::get('/profile/{id}/edit', 'ProfileController@edit')->name('profile.edit');
Route::patch('/profile/{id}', 'ProfileController@update')->name('profile.update');

Route::get('/', 'PostController@index');
Route::get('/p/create','PostController@create')->name('p/create');
Route::get('/p/{post}','PostController@show')->name('p/{post}');
Route::post('/p','PostController@store')->name('p');


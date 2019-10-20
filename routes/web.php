<?php
use App\Models\MusicGenre;

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

Route::get ('signin', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('signin', 'Auth\LoginController@login');
Route::post('signout', 'Auth\LoginController@logout')->name('logout');

Route::get ('signup', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('signup', 'Auth\RegisterController@register');

Route::get('mdeditor', 'MainController@mdeditor')->name('md_editor');

Route::get ('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('change_password');
Route::post('change_password', 'Auth\ChangePasswordController@changePassword');

Route::view('agreement', 'agreement')->name('agreement');
Route::view('privacy_policy', 'privacy_policy')->name('privacy_policy');

Route::model('genre', MusicGenre::class);
Route::get ('genre', 'MusicGenreController@list')->name('genre.list');
Route::get ('genre/{genre}', 'MusicGenreController@show')->name('genre.show');

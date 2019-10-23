<?php
use App\Models\Music;
use App\Models\Record;
use App\Models\MusicGenre;
use App\User;

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

Route::view('/', 'welcome')->name('home');

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

Route::model('music', Music::class);
Route::get ('music/{music}', 'MusicController@show')->name('music.show');


Route::model('records', Record::class);
Route::model('user', User::class);
Route::get ('user/{user}', 'UserController@show')->name('user.show');
Route::get ('user/{user}/records', 'UserController@recordList')->name('user.records');
Route::get ('user/{user}/records/new', 'RecordController@create')->name('record.new');//->middleware('auth');
Route::post('user/{user}/records/new', 'RecordController@store');
Route::get ('user/{user}/records/{record}', 'RecordController@show')->name('record.show');
Route::delete('user/{user}/records/{record}', 'RecordController@destroy')->name('record.destroy');

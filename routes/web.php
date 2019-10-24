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

Route::model('user', User::class);
Route::prefix('user/{user}')->group(function () {
    Route::get ('', 'UserController@show')->name('user.show');
    Route::get ('records', 'UserController@recordList')->name('user.records');
    Route::get ('records/new', 'RecordController@create')->name('record.new');//->middleware('auth');
    Route::post('records/new', 'RecordController@store');

    Route::model('records', Record::class);
    Route::get ('records/{record}', 'RecordController@show')->name('record.show');
    Route::delete('records/{record}', 'RecordController@destroy')->name('record.destroy');

    Route::get ('settings', 'UserController@settings')->name('user.settings');
    Route::get ('script', 'UserController@showscript')->name('user.script');
});

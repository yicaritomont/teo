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


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Password Reset
Route::resource('reminder', 'RemindersController');
Route::get('reminder',['as'=>'reminder','uses' => 'RemindersController@getRemind']);
Route::post('postRemind',['as'=>'postRemind','uses' => 'RemindersController@postRemind']);
// to create a user
Route::resource('users', 'UserController');

// To Verfify Password
Route::get('ajxVerifyPassword','PerfilController@VerifyPassword');

// after a success auth
Route::group( ['middleware' => ['auth']], function() {
    Route::resource('roles', 'RoleController');
    Route::resource('posts', 'PostController');
    Route::resource('permissions','PermissionController');
    Route::resource('menus','MenuController');
    Route::resource('perfiles','PerfilController');
    Route::resource('agendas','MenuController');

    // To update Password.
    Route::post('changePassword/{id}',['as'=>'changePassword','uses' => 'PerfilController@changePassword']);

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Ruta exclusiva para el manejo del lenguaje
 */
Route::get('lang/{lang}', function($lang) {
    Session::put('lang', $lang);
    return Redirect::back();
  })->middleware('web')->name('change_lang');

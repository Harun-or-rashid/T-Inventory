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
Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::group(['namespace' => 'Backend'], function () {
    Route::get('logout', [
        'as' => 'frontend.logout',
        'uses' => 'AuthControllers\LogoutController@getLogout'
    ]);
    Route::get('login-register', [
        'as' => 'frontend.login-register',
        'uses' => 'AuthControllers\LoginController@getLogin'
    ]);

    Route::post('login', [
        'as' => 'frontend.login',
        'uses' => 'AuthControllers\LoginController@postLogin'
    ]);

    Route::post('register', [
        'as' => 'frontend.register',
        'uses' => 'AuthControllers\RegisterController@postRegister'
    ]);
        Route::post('login', [
            'as' => 'backend.admin.login',
            'uses' => 'AuthControllers\LoginController@postLogin'
        ]);
});
    Route::get('/', [
        'as' => 'frontend.home',
        'uses' => 'HomeController@showHomePage'
    ]);

});

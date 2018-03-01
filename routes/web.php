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

Route::get('/userinfo', 'Auth\AuthController@index')->name('userinfo');
Route::post('/userinfo', 'Auth\AuthController@userinfoEdit')->name('userinfo');

Route::group(['prefix' => 'admin','namespace' => 'Admin'],function ($router)
{
    $router->get('login', 'LoginController@showLoginForm')->name('admin.login');
    $router->post('login', 'LoginController@login');
    $router->post('logout', 'LoginController@logout');
    $router->get('register', 'RegisterController@showRegistrationForm');
    $router->post('register', 'RegisterController@register');

    $router->get('dash', 'DashboardController@index');
});



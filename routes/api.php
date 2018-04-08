<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'auth','namespace' => 'Auth','middleware'=>'cors'],function ($router)
{
    $router->get('/userList', 'AuthController@userList');
    $router->post('/userAdd', 'AuthController@userAdd');
    $router->post('/userFile', 'AuthController@userFile');
    $router->get('/userDel', 'AuthController@userDel');
    $router->get('/userEdit', 'AuthController@userEditShow');
    $router->post('/userEdit', 'AuthController@userEdit');
});

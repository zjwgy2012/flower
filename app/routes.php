<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//测试
//后台
Route::group(array('prefix' => 'admin'),function()
{
    Route::get('test',array('uses'=>'AdminTestController@test'));
});

//前台
Route::group(array('prefix' => 'user'),function()
{
    Route::get('test',array('uses'=>'UserTestController@test'));
});

//微信
Route::group(array('prefix' => 'weixin'),function()
{
    Route::resource('/','WeixinController');
    Route::get('card',array('uses'=>'WeixinController@card'));
    Route::post('card',array('uses'=>'WeixinController@card'));
});
//404
Route::get('404', function()
{
    App::abort(404);
});

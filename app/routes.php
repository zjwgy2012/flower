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
Route::get('test',array('uses'=>'TestController@test'));
//后台

//前台

//微信
Route::resource('weixin','WeixinController');
//404
Route::get('404', function()
{
    App::abort(404);
});

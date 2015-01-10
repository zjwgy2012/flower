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
Route::get('admin/test',array('uses'=>'AdminTestController@test'));

//前台
Route::get('user/test',array('uses'=>'UserTestController@test'));

//微信
Route::resource('weixin','WeixinController');
//404
Route::get('404', function()
{
    App::abort(404);
});

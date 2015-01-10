<?php
/*
 * author zhangjingwei
 * created_at 2014-06-17
 * 登陆,注册
 */
class UserTestController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function test()
    {
        echo 'welcome to my house!';
        /*
        $all = DB::table('test1')->get();
        echo '<pre>';
        foreach($all as $one){
            var_dump((float)($one->token));
        }*/
        //echo 'test';
        //return View::make('dashboard')->with('last_login',Session::get('last_login','0000-00-00 00:00:00'));
	}
  

}

<?php
/*
 * author zhangjingwei
 * created_at 2014-06-17
 * 登陆,注册
 */
class AdminUserController extends BaseController {

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

	public function getDashboard()
    {
        return View::make('admin.dashboard')->with('last_login',Session::get('last_login','0000-00-00 00:00:00'));
	}
  
    /*
     * 登陆页面get请求,已登录则转到dashboard页面
     */
	public function getLogin()
    {
        if (Auth::check())
            return Redirect::intended('dashboard');
        else
            return View::make('admin.login');
    }

    /*
     * 登陆表单post请求,验证用户登陆请求
     * 验证成功进入dashboard页面,验证失败提示错误信息
     */
	public function postLogin()
    {
        $email = Input::get('email','');
        $password = Input::get('password','');
        $rememberMe = (Input::has('rememberMe'))? TRUE:FALSE;
        if (Auth::attempt(array('email'=>$email,'password'=>$password,'user_role'=>1),$rememberMe))
        {
            Session::put('last_login',Auth::user()->last_login);
            Auth::user()->last_login = date('Y-m-d H:i:s');
            Auth::user()->save();
            return Redirect::intended('dashboard');
        }else 
            return Redirect::intended('login');
    }

	public function getLogout()
    {
        Auth::logout();
        return Redirect::intended('login');
	}
	public function getRegister()
    {
        return View::make('admin.register');
	}
	public function postRegister()
    {
	}

}

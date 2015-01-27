<?php

class WeixinController extends BaseController {

    public function __construct(){
        //$this->beforeFilter('weixin',array('on' => 'get|post'));
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return Input::get('echostr');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $appID     = Config::get('app.appID');
        $appsecret = Config::get('app.appsecret');
        $res = file_get_contents("https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appID}&secret={$appsecret}");
        $res = json_decode($res,true);
        $accessToken = $res['access_token'];
        $selfView = array(
            'button' => array(
                array(
                    'type' => 'view',
                    'name' => '优惠券',
                    'url' => 'http://115.29.51.171/weixin',  
                ),
                array(
                    "name" => "菜单",
                    'sub_button' => array(
                        array(
                            "type" => "view",
                            "name" => "搜索",
                            "url" => "http://www.sogou.com/",
                        ),
                        array(
                            "type" => "view",
                            "name" => "card",
                            "url" => "http://115.29.51.171/weixin/card",
                        ),
                        array(
                            "type" => "click",
                            "name" => "赞一下我们",
                            "key" => "V1001_GOOD",
                        ),
                    ),
                ),
            ),
        );
        $selfView = json_encode($selfView,JSON_UNESCAPED_UNICODE);
        $options = array(
            'http' => array(
                'method' => 'POST',
                'header' => 'Content-type:application/json;charset=utf-8',
                'content' => $selfView,
                'timeout' => 15 * 60 ,
            ),
        );
        $context = stream_context_create($options);
        $url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token={$accessToken}";
        $res = file_get_contents($url, false, $context);

        echo $res;

		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $message = file_get_contents('php://input');
        $message = simplexml_load_string($message, 'SimpleXMLElement', LIBXML_NOCDATA);
        $res = file_get_contents("https://api.weixin.qq.com/cgi-bin/user/info?access_token=YfovX7yeb2lQi3R6qulIQu9Z0n-ev8XctG88EWDgl9xLSMGQvXOc2iR6pwPSuNaaR9UPD1gPOXSbE4KKkcmK8jH1YNWCm5_LGjNAuqI3OJ0&openid=oSCCUt3VwtQQkVnMltMOT1WLMXOM&lang=zh_CN");

        return View::make('weixin.index')->with('message', $message)->with('res',$res);
		
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

    public function card(){
        $appInfo = array();
        $appInfo['appID']     = Config::get('app.appID');
        $appInfo['signature'] = Input::get('signature');
        $appInfo['timestamp'] = Input::get('timestamp');
        $appInfo['nonce'] = Input::get('nonce');
        debug($appInfo);exit;
        return View::make('admin.card')->with('appInfo',$appInfo);
    }

}

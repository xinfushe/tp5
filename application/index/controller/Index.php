<?php
namespace app\index\controller;
/**
 * 所有能够直接访问的页面，并对每个页面进行访问统计
 */
use WX\JSSDK;
class Index extends \think\Controller
{
    /**
     * 初始化函数，用户访问统计
     * @return [type] [description]
     */
    public function _initialize(){
        $params=request()->action();
        if ($res=\think\Hook::listen('statistics',$params)  ) {
            if (!$res['0']) {
                //数据库写入失败
            }
        }
    }
    public function index()
    {   
        //获取访问数
        $count=model('Count');
        $data=$count->getCount();
        $ip=request()->ip();
        //如果是微信浏览器，则微信静默登录
        if (strpos($_SERVER['HTTP_USER_AGENT'],'MicroMessenger')!==false) {
            if (!session('wxAutoLogin')) {
                action('Oauth/wxAutoLogin');
            }
        }
        
    	return view('index/index',['page'=>'index','count'=>$data,'ip'=>$ip ]);
    }
    public function about()
    {    	
    	return view('index/about',['page'=>'about']);
    }
    public function single()
    {    	
    	return view('index/single',['page'=>'single']);
    }
    public function portfolio()
    {    	
    	return view('index/portfolio',['page'=>'portfolio']);
    }
    public function contact()
    {    	
    	return view('index/contact',['page'=>'contact']);
    }
    public function test()
    {    	
    	return view('index/test',['page'=>'test']);
    }
    public function test2()
    {    	
    	return view('index/test2',['page'=>'test2']);
    }
    public function login()
    {       
        return view('index/login',['page'=>'login']);
    }
    public function bindphone()
    {       
        return view('index/bindphone',['page'=>'bindphone']);
    }
    public function bindmail()
    {       
        return view('index/bindmail',['page'=>'bindmail']);
    }
    public function wait()
    {   
        $arr=array('state'=>9,'tag'=>'behavior');
        $res=\think\Hook::listen('test',$arr);
        var_dump($res);
        return view('index/wait',['page'=>'wait']);
    }
    public function phonereg()
    {       
        return view('index/phonereg',['page'=>'phonereg']);
    }
    public function mailreg()
    {       
        return view('index/mailreg',['page'=>'mailreg']);
    }
    public function register()
    {       
        return view('index/register',['page'=>'register']);
    }
    public function phonelogin()
    {       
        return view('index/phonelogin',['page'=>'phonelogin']);
    }
    public function car()
    {       
        return view('index/car',['page'=>'car']);
    }
    public function wxjssdk()
    {   
        $jssdk = new JSSDK(config('wx_appid'), config('wx_appsecret'));
        $signPackage = $jssdk->GetSignPackage();
        return view('index/wxjssdk',['page'=>'wxjssdk','signPackage'=>$signPackage]);
    }
    
    /**
     * 支付模板
     * @return [type] [description]
     */
    public function wxpay()
    {   
        $res=action('Wxpay/pay'); 
        return view('index/wxpay',['page'=>'wxpay','jsApiParameters'=>$res['jsApiParameters'],'editAddress'=>$res['editAddress']]);
    }

}

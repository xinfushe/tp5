<?php
namespace app\index\controller;
use Yunpian\YunpianApi;
use PHPMailer\PHPMailer;
class Main extends \think\Controller{
	function __construct(){
		//
	}
	/**/
	function viewCount(){
		$count=model('Count');
		$res=$count->viewCount();

		$res2=$count->getCount();
		
		if (!$res) {
			// return "数据写入成功";
		}else{
			// return "数据写入失败";
		}
	}
	/**
	 * 发送邮件
	 * @return [type] [description]
	 */
	function send_mail(){
		$email = trim(input('post.email'));	
		$content = trim(input('post.content'));
		$mail = new PHPMailer;
		//调用common方法
		$arr['mailto']=$email;
		$arr['tpl']="suggest";
		$arr['content']=$content;
		$res=init_mail($mail,$arr);

		if(!$res) {
		    echo 'Message could not be sent.';
		    echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
		    echo 'Message has been sent';
		}

	}


	/**
	 * 发送短信验证码
	 * @return [type] [description]
	 */
	function send_message(){
		//
		if (!empty(session('yunpian'))) {
			# code...
			session('yunpian','');
		}
		//获取ajax传递的phones值
		$phones=input('post.phones');
		//发送验证码短信
		$send=new YunpianApi();
		$arr=$send->send_tpl($phones);
		//如果返回状态码不为0，则返回错误信息
		if($arr['code']){
			return $arr['msg'];
		}
		//存储api创建的code
		session('yunpian',$arr['yunpian']);
	} 


	/**
	 * 用户手机号验证
	 * @return [type] [description]
	 */
	function bindPhone(){

		//判断验证码是否正确
		if(input('code')==session('yunpian.code') && !empty(input('code'))){
			//验证码超时判断
			if (time()-session('yunpian.time')>60) {
				$this->error('验证码超时，请重新获取');
			}
			//验证成功，则清除session
			session('yunpian.code','');
			$this->success('验证成功','index/index');
		}else{
			$this->error('验证失败');
		}
	}

	/**
	 * 查看session的工具函数
	 * @return [type] [description]
	 */
	function session(){
		$test=model('Test');
		$res=$test->show();
		echo "<pre>";
		foreach ($res as $key1 => $value1) {
			echo $value1['state'].':'.$value1['tag'].':'.$value1['time'];
			echo '<br>';
		}
		var_dump(session(''));
		echo "</pre>";
		

	}
}
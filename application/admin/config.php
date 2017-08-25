<?php

return [

    // +----------------------------------------------------------------------
    // | 微信支付配置
    // +----------------------------------------------------------------------
    //SDK路径
    'wxpay_path'=>APP_PATH.'../extend/WxpayAPI/',
    //异步回调地址
    'notify_url'=>'http://www.jiangyang.me/admin/Wxpay/notify',

    // +----------------------------------------------------------------------
    // | 微信登录配置
    // +----------------------------------------------------------------------

    // 微信登录回调域名
    'wx_callback'          => 'http://www.jiangyang.me/index/oauth/wx_callback',
    // 微信登录appid
    'wx_appid'             =>'wxba7464d31a8fd9b9',
    // 信登录appkey
    'wx_appsecret'         =>'ee85e8859022b23ff6139ce5d4912d20',
    // wx_scope
    'wx_scope'             =>'snsapi_userinfo',

    // +----------------------------------------------------------------------
    // | 微信JSSDK配置
    // +----------------------------------------------------------------------

    // ticket路径
    'ticket_path'          => APP_PATH.'../extend/WX/',

    // +----------------------------------------------------------------------
    // | QQ登录配置
    // +----------------------------------------------------------------------

    // QQ登录回调域名
    // 'qq_callback'          => 'http://localhost/thinkphp_5.0.10_full/public/index/oauth/callback.html',
    'qq_callback'          => 'http://www.jiangyang.me/index/oauth/callback.html',
    // QQ登录appid
    'qq_appid'             =>'101401381',
    //QQ登录appkey
    'qq_appkey'            =>'1aca1a19c97cb66f2fcbc38120898583',
    //scope
    'qq_scope'             =>'get_user_info',
    //errorReport
    'qq_errorReport'       =>true,
    //storageType
    'qq_storageType'       =>'file',
    // +----------------------------------------------------------------------
    // | 云片网短信API
    // +----------------------------------------------------------------------
    'yunpian_apikey'       =>'70777a9cca857a65f0341d6371a7ad29',

    // +----------------------------------------------------------------------
    // | smtp邮箱服务器
    // +----------------------------------------------------------------------

    //邮件中注册链接
    'reg_url'=>'http://www.jiangyang.me/admin/user/verifyMail',
     //SMTP服务器
    'smtpserver' => 'smtp.exmail.qq.com',
    //SMTP服务器端口
    'smtpserverport' => 25, 
    //SMTP服务器的用户邮箱
    'smtpusermail' => 'jy@zhongyilove.com', 
    //SMTP服务器的用户帐号
    'smtpuser' => 'jy@zhongyilove.com', 
    //SMTP服务器的用户密码
    'smtppass' => 'Aa1126254578', 
    
];
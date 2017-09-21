<?php
return array(
	//'配置项'=>'配置值'
        //'配置项'=>'配置值'
        'SESSION_PREFIX'        =>  'beauty_', // session 前缀
        'COOKIE_PREFIX'         =>  'beauty_',      // Cookie前缀 避免冲突

        'DB_TYPE'               =>  'mysql',     // 数据库类型
        'DB_USER'               =>  'root',      // 用户名
        'DB_PWD'                =>  'root',          // 密码
        'DB_PREFIX'             =>  'beauty_',    // 数据库表前缀
        'DB_DSN'                =>  'mysql:host=localhost;port=3306;dbname=four;charset=utf8',

        //'SHOW_PAGE_TRACE'       =>  true,
//    'MODULE_ALLOW_LIST'     =>'Home,Mobile,Pay',//允许访问的模块


    //极验验证
     'GEETEST_ID'             => '27cb550818ab3236e754db8997f2d804',//极验id  仅供测试使用
     'GEETEST_KEY'            => '7ecda8377d987a60c20ffb86e9553f28',//极验key 仅供测试使用

    //邮件发送
    'EMAIL_FROM_NAME'        => '云和商城',   // 发件人
    'EMAIL_SMTP'             => 'smtp.126.com',   // smtp
    'EMAIL_USERNAME'         => 'gaoyong0303@126.com',   // 账号
    'EMAIL_PASSWORD'         => '335556299',   // 密码  注意: 163和QQ邮箱是授权码；不是登录的密码
    'EMAIL_SMTP_SECURE'      => '',   // 链接方式 如果使用QQ邮箱；需要把此项改为  ssl

    //缓存配置
    'DATA_CACHE_PREFIX'     =>  'beauty',     // 缓存前缀
    'DATA_CACHE_TYPE'       =>  'Memcache',  // 数据缓存类型,支持:File|Db|Apc|Memcache|Shmop|Sqlite|Xcache|Apachenote|Eaccelerator'MEMCACHE_HOST'         =>   '127.0.0.1',
    'MEMCACHE_HOST'         =>  '127.0.0.1',
    'MEMCACHE_PORT'         =>   11211,

    // 'DATA_CACHE_KEY'=>'think' , //避免缓存文件名被猜测，仅对文件缓存生效

    //静态缓存（页面静态化）
    'HTML_CACHE_ON'     =>    true, // 开启静态缓存
    'HTML_CACHE_TIME'   =>    10,   // 全局静态缓存有效期（秒）
    'HTML_FILE_SUFFIX'  =>    '.html', // 设置静态缓存文件后缀
    'HTML_CACHE_RULES'  =>     array(  // 定义静态缓存规则
        // 定义格式1 数组方式
        //'静态地址'    =>     array('静态规则', '有效期', '附加规则'),
        //'Index:cacheList'    =>  array('{:module}_{:controller}_{:action}_{id}',10),
        //'Index:cacheList'    =>  array('{:module}/{:controller}/{:action}',10),
        // 定义格式2 字符串方式
        //'静态地址'    =>     '静态规则',
        '*'=>array('{$_SERVER.REQUEST_URI|md5}')
    ),

    //权限认证
    'AUTH_CONFIG'       => array(
    'AUTH_ON'           => true,                      // 认证开关
    'AUTH_TYPE'         => 1,                         // 认证方式，1为实时认证；2为登录认证。
    'AUTH_GROUP'        => 'beauty_auth_group',        // 用户组数据表名
    'AUTH_GROUP_ACCESS' => 'beauty_auth_group_access', // 用户-用户组关系表
    'AUTH_RULE'         => 'beauty_auth_rule',         // 权限规则表
    'AUTH_USER'         => 'beauty_admin'             // 用户信息表
    ),

    //微信公众号配置
    'TOKEN'                 =>'totti',
    'APP_ID'                =>'wx01d2bffc9e821383',
    'APP_SECRET'            =>'a7263f4f9d4a862521b6182f81cc900d',



//支付宝配置参数
    'alipay_config'=>array(
        'partner' =>'20********50',   //这里是你在成功申请支付宝接口后获取到的PID；
        'key'=>'9t***********ie',//这里是你在成功申请支付宝接口后获取到的Key
        'sign_type'=>strtoupper('MD5'),
        'input_charset'=> strtolower('utf-8'),
        'cacert'=> getcwd().'\\cacert.pem',
        'transport'=> 'http',
    ),
    //以上配置项，是从接口包中alipay.config.php 文件中复制过来，进行配置；

    'alipay'   =>array(
        //这里是卖家的支付宝账号，也就是你申请接口时注册的支付宝账号
//        'seller_email'=>'pay@xxx.com',
        'seller_email'=>'1932314889qq.com',
//这里是异步通知页面url，提交到项目的Pay控制器的notifyurl方法；
        'notify_url'=>'http://www.beauty.com/Pay/notifyurl',
//这里是页面跳转通知url，提交到项目的Pay控制器的returnurl方法；
        'return_url'=>'http://www.beauty.com/Pay/returnurl',
//支付成功跳转到的页面，我这里跳转到项目的User控制器，myorder方法，并传参payed（已支付列表）
        'successpage'=>'User/myorder?ordtype=payed',
//支付失败跳转到的页面，我这里跳转到项目的User控制器，myorder方法，并传参unpay（未支付列表）
        'errorpage'=>'User/myorder?ordtype=unpay',
    ),
);
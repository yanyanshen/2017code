<?php
return array(
	//'配置项'=>'配置值'
    'SHOW_PAGE_TRACE'=>true,//开启它可以看到sql语句
    //链接数据库
    'SESSION_PREFIX'        =>  'exam_', // session 前缀
    'COOKIE_PREFIX'         =>  'exam_',      // Cookie前缀 避免冲突

    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'root',          // 密码
    'DB_PREFIX'             =>  'exam_',    // 数据库表前缀
    'DB_DSN'                =>  'mysql:host=localhost;port=3306;dbname=exam;charset=utf8',
//    'URL_MODEL'=>2, //设置url模式    为重写模式/
    'URL_HTML_SUFFIX' => '.asp',//设置url 的后缀名
    //静态缓存（页面静态化）
    'HTML_CACHE_ON'     =>    false, // 开启静态缓存
    'HTML_CACHE_TIME'   =>    10,   // 全局静态缓存有效期（秒）
    'HTML_FILE_SUFFIX'  =>    '.html', // 设置静态缓存文件后缀
    'SERVER'=>$_SERVER['HTTP_HOST'],//获取本地地址
    'HTML_CACHE_RULES'  =>     array(  // 定义静态缓存规则
        // 定义格式1 数组方式
        //'静态地址'    =>     array('静态规则', '有效期', '附加规则'),
        //'Index:cacheList'    =>  array('{:module}_{:controller}_{:action}_{id}',10),
        //'Index:cacheList'    =>  array('{:module}/{:controller}/{:action}',10),
        // 定义格式2 字符串方式
        //'静态地址'    =>     '静态规则',
        '*'=>array('{$_SERVER.REQUEST_URI|md5}')
    ),
);
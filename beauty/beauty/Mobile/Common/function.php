<?php
header("Content-type:text/html;charset=utf-8");


/**
 * 发送邮件
 * @param  string $address 需要发送的邮箱地址 发送给多个地址需要写成数组形式
 * @param  string $subject 标题
 * @param  string $content 内容
 * @return boolean       是否成功
 */
//function send_email($address,$subject,$content){
//    $email_smtp=C('EMAIL_SMTP');
//    $email_username=C('EMAIL_USERNAME');
//    $email_password=C('EMAIL_PASSWORD');
//    $email_from_name=C('EMAIL_FROM_NAME');
//    $email_smtp_secure=C('EMAIL_SMTP_SECURE');
//    $email_port=C('EMAIL_PORT');
//    if(empty($email_smtp) || empty($email_username) || empty($email_password) || empty($email_from_name)){
//        return array("error"=>1,"message"=>'邮箱配置不完整');
//    }
//    require_once './ThinkPHP/Library/Org/Yh/class.phpmailer.php';
//    require_once './ThinkPHP/Library/Org/Yh/class.smtp.php';
//    $phpmailer=new \Phpmailer();
//    // 设置PHPMailer使用SMTP服务器发送Email
//    $phpmailer->IsSMTP();
//    // 设置设置smtp_secure
//    $phpmailer->SMTPSecure=$email_smtp_secure;
//    // 设置port
//    $phpmailer->Port=$email_port;
//    // 设置为html格式
//    $phpmailer->IsHTML(true);
//    // 设置邮件的字符编码'
//    $phpmailer->CharSet='UTF-8';
//    // 设置SMTP服务器。
//    $phpmailer->Host=$email_smtp;
//    // 设置为"需要验证"
//    $phpmailer->SMTPAuth=true;
//    // 设置用户名
//    $phpmailer->Username=$email_username;
//    // 设置密码
//    $phpmailer->Password=$email_password;
//    // 设置邮件头的From字段。
//    $phpmailer->From=$email_username;
//    // 设置发件人名字
//    $phpmailer->FromName=$email_from_name;
//    // 添加收件人地址，可以多次使用来添加多个收件人
//    if(is_array($address)){
//        foreach($address as $addressv){
//            $phpmailer->AddAddress($addressv);
//        }
//    }else{
//        $phpmailer->AddAddress($address);
//    }
//    // 设置邮件标题
//    $phpmailer->Subject=$subject;
//    // 设置邮件正文
//    $phpmailer->Body=$content;
//    // 发送邮件。
//    if(!$phpmailer->Send()) {
//        $phpmailererror=$phpmailer->ErrorInfo;
//        return array("error"=>1,"message"=>$phpmailererror);
//    }else{
//        return array("error"=>0);
//    }
//}


function isMobile(){
// 如果有HTTP_X_WAP_PROFILE则一定是移动设备
    if (isset ($_SERVER['HTTP_X_WAP_PROFILE']))
        return true;

//此条摘自TPM智能切换模板引擎，适合TPM开发
    if(isset ($_SERVER['HTTP_CLIENT']) &&'PhoneClient'==$_SERVER['HTTP_CLIENT'])
        return true;
//如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
    if (isset ($_SERVER['HTTP_VIA']))
//找不到为flase,否则为true
        return stristr($_SERVER['HTTP_VIA'], 'wap') ? true : false;
//判断手机发送的客户端标志,兼容性有待提高
    if (isset ($_SERVER['HTTP_USER_AGENT'])) {
        $clientkeywords = array(
            'nokia','sony','ericsson','mot','samsung','htc','sgh','lg','sharp','sie-','philips','panasonic','alcatel','lenovo','iphone','ipod','blackberry','meizu','android','netfront','symbian','ucweb','windowsce','palm','operamini','operamobi','openwave','nexusone','cldc','midp','wap','mobile'
        );
//从HTTP_USER_AGENT中查找手机浏览器的关键字
        if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
            return true;
        }
    }
//协议法，因为有可能不准确，放到最后判断
    if (isset ($_SERVER['HTTP_ACCEPT'])) {
// 如果只支持wml并且不支持html那一定是移动设备
// 如果支持wml和html但是wml在html之前则是移动设备
        if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
            return true;
        }
    }
    return false;
}
?>
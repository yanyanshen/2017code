<?php
namespace Admin\Controller;
use Think\Controller;

class WeChatController extends Controller{
    private $token;
    private $appId;
    private $appSecret;
    private $accessToken;
    private $accessTokenTime;

    public function __CONSTRUCT(){
        parent::__construct();
        $this->token=C('TOKEN');
        $this->appId=C('APP_ID');
        $this->appSecret=C('APP_SECRET');
        $this->checkSignature();
        $this->responseMsg();
        if (!$this->accessToken || $this->accessTokenTime < time()) {
            $this->getAccessToken();
        }
    }

    //服务器签名验证;
    public function checkSignature(){
        if($_GET['echostr']){
            $token = $this->token;
            $timestamp = $_GET['timestamp'];
            $nonce = $_GET['nonce'];
            $signature = $_GET['signature'];
            //1）将token、timestamp、nonce三个参数进行字典序排序;
            $arr=array($token,$timestamp,$nonce);
            sort($arr);
            //2）将三个参数字符串拼接成一个字符串进行sha1加密;
            $str=sha1(join('',$arr));
            //3）开发者获得加密后的字符串可与signature对比，标识该请求来源于微信;
            if($str==$signature){
                echo $_GET['echostr'];
            }else{
                return false;
            }
        }
    }

    //被动事件自动回复消息;
    public function responseMsg(){
        //1)获取到微信推送过来的POST数据（xml格式）
        $postXml= $GLOBALS['HTTP_RAW_POST_DATA'];
        //2)将xml转为对象;
        $xmlObj=simplexml_load_string($postXml);
        //3)回复消息
        if(strtolower($xmlObj->MsgType)=='event'){
            //判断关注还是点击事件;
            if(strtolower($xmlObj->Event)=='subscribe'){
                $content="[微笑]亲，欢迎关注我的公众号!";
                //单文本消息;
                echo  $this->responseText($xmlObj,$content);
            }elseif(strtolower($xmlObj->Event)=='click'){
                if(strtolower($xmlObj->EventKey)=='music'){
                    $content=array(
                        "Title"=>"最炫名族风",
                        "Description"=>"歌手：凤凰传奇",
                        "MusicUrl"=>"https://y.qq.com/portal/player.html",
                        "HQMusicUrl"=>"https://y.qq.com/portal/player.html"
                    );
                    echo $this->responseMusic($xmlObj,$content);
                }elseif(strtolower($xmlObj->EventKey)=='gy0001'){
                    $content="<a href='http://totti.applinzi.com/Mobile'>我的商城</a>";
                    echo $this->responseText($xmlObj,$content);
                }
            }
        }elseif(strtolower($xmlObj->MsgType)=='text'){
            switch($xmlObj->Content) {
                case '新闻':
                    $content=array(
                        array(
                            'title'=>'挥泪大甩卖',
                            'description'=>'最底5元,全场1折起',
                            'picUrl'=>'http://m.360buyimg.com/babel/s1046x306_jfs/t3439/232/1732407106/104745/4ad41ef9/582fc1e8Nce3d10b9.jpg!q70.jpg',
                            'url'=>'http://h5.m.jd.com/active/3wX17ys13EaDtijVP6KnfrBucNhV/index.html'
                        ),
                        array(
                            'title'=>'智能生活',
                            'description' => '智能生活智能生活智能生活智能生活智能生活智能生活',
                            'picurl'=>'http://m.360buyimg.com/babel/s509x288_jfs/t3496/127/1334901860/35430/707ec1c7/582442eaN43f7b7c1.jpg!q70.jpg',
                            'url'=>'http://h5.m.jd.com/active/4762iK5f2XLnDDT6LSdSgHirSvLu/index.html?has_native=1'
                        )
                    );
                    echo $this->responseImgText($xmlObj,$content);
                    break;
                case '网址':
                    $content="<a href='http://totti.applinzi.com/Mobile'>我的商城</a>";
                    echo $this->responseText($xmlObj,$content);
                    break;
                default:
                    $content="对不起,没有找到匹配的消息";
                    echo $this->responseText($xmlObj,$content);
            }
        }elseif(strtolower($xmlObj->MsgType)=='voice'){
            $voiceText=$xmlObj->Recognition;
            if(preg_match('/天气/',$voiceText)) {
                if (preg_match('/郑州/', $voiceText)) {
                    $content = $this->getWeatherByCity('郑州');
                } elseif (preg_match('/洛阳/', $voiceText)) {
                    $content = $this->getWeatherByCity('洛阳');
                } elseif (preg_match('/南阳/', $voiceText)) {
                    $content = $this->getWeatherByCity('南阳');
                } elseif (preg_match('/焦作/', $voiceText)) {
                    $content = $this->getWeatherByCity('焦作');
                } elseif (preg_match('/北京/', $voiceText)) {
                    $content = $this->getWeatherByCity('北京');
                } else {
                    $content = '对不起,暂时不支持该地区的天气查询';
                }
                echo '';
                echo $this->responseText($xmlObj,$content);
            }
        }
    }

    public function responseMusic($xmlObj,$content){
        $toUserName=$xmlObj->FromUserName;
        $fromUserName=$xmlObj->ToUserName;
        $itemTpl = "<Music>
                            <Title><![CDATA[%s]]></Title>
                            <Description><![CDATA[%s]]></Description>
                            <MusicUrl><![CDATA[%s]]></MusicUrl>
                            <HQMusicUrl><![CDATA[%s]]></HQMusicUrl>
                        </Music>";

        $item_str = sprintf($itemTpl, $content['Title'], $content['Description'], $content['MusicUrl'], $content['HQMusicUrl']);

        $xmlTpl = "<xml>
                            <ToUserName><![CDATA[%s]]></ToUserName>
                            <FromUserName><![CDATA[%s]]></FromUserName>
                            <CreateTime>%s</CreateTime>
                            <MsgType><![CDATA[music]]></MsgType>
                            $item_str
                        </xml>";

        $result = sprintf($xmlTpl, $toUserName, $fromUserName, time());
        return $result;
    }

    //文本消息;
    public function responseText($xmlObj,$content){
        $toUserName=$xmlObj->FromUserName;
        $fromUserName=$xmlObj->ToUserName;
        $template="<xml>
                    <ToUserName><![CDATA[%s]]></ToUserName>
                    <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[%s]]></MsgType>
                    <Content><![CDATA[%s]]></Content>
                   </xml>";
        $msg=sprintf($template,$toUserName,$fromUserName,time(),'text',$content);
        return $msg;
    }

    //图文消息;
    public function responseImgText($xmlObj,$content){
        $toUserName=$xmlObj->FromUserName;
        $fromUserName=$xmlObj->ToUserName;
        $template="<xml>
						<ToUserName><![CDATA[%s]]></ToUserName>
						<FromUserName><![CDATA[%s]]></FromUserName>
						<CreateTime>%s</CreateTime>
						<MsgType><![CDATA[%s]]></MsgType>
						<ArticleCount>%s</ArticleCount>
						<Articles>";
        foreach ($content as $v) {
            $template.="<item>
						<Title><![CDATA[".$v['title']."]]></Title>
						<Description><![CDATA[".$v['description']."]]></Description>
						<PicUrl><![CDATA[".$v['picUrl']."]]></PicUrl>
						<Url><![CDATA[".$v['url']."]]></Url>
						</item>";
        }
        $template.="</Articles>
						</xml>";
        $msg=sprintf($template,$toUserName,$fromUserName,time(),'news',count($content));
        return $msg;
    }

    //天气消息;
    public function getWeatherByCity($city){
        //初始化curl;
        $ch = curl_init();
        $url = 'http://apis.baidu.com/apistore/weatherservice/cityname?cityname='.urlencode($city);
        $header = array(
            'apikey: 8a539e8d7fc557774e4531d4abf4bff8',
        );
        //设置curl配置项;
        curl_setopt($ch, CURLOPT_HTTPHEADER , $header);           //添加apikey到header;
        curl_setopt($ch , CURLOPT_URL , $url);                    //设置curl访问地址;
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);              //设置返回的内容不直接在界面显示;
        //执行HTTP请求;
        $res = curl_exec($ch);
        //关闭curl资源;
        curl_close($ch);
        $resObj=json_decode($res);
        $weather=$resObj->retData;
        $str="[".$weather->city."]\n";
        $str.="时间:$weather->date $weather->time"."\n";
        $str.="天气:".$weather->weather."\n";
        $str.="气温:".$weather->temp."\n";
        $str.="最低气温:".$weather->l_tmp."\n";
        $str.="最高气温:".$weather->h_tmp."\n";
        $str.="风力:".$weather->WS."\n";
        return $str;
    }

    /*//获取accessToken;
    public function getAccessToken(){
        //初始化curl;
        $ch=curl_init();
        //设置curl选项;
        $url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$this->appId&secret=$this->appSecret";
        curl_setopt($ch,CURLOPT_URL,$url);           //设置curl访问地址;
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);   //设置返回的内容不直接在界面中显示;
        //执行HTTP请求,并返回结果
        $res=curl_exec($ch);
        //关闭curl资源;
        curl_close($ch);
        $arr=json_decode($res,true);
        return $arr['access_token'];
    }*/

    //获取accessToken;
    public function getAccessToken(){
        if($this->accessToken && $this->accessTokenTime>time() ){
            return $this->accessToken ;
        }else{
            $url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$this->appId."&secret=".$this->appSecret;
            // 执行HTTP请求
            $res = $this->http_curl($url);
            $arr=json_decode($res,true);
            $this->accessToken=$arr['access_token'];
            $this->accessTokenTime=time()+7100;
            return $this->accessToken ;
        }
    }

    /*//创建自定义菜单;
    public function createMenu(){
        $url=" https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$this->accessToken;
        $post='{
                 "button":[
                 {
                      "type":"click",
                      "name":"今日歌曲",
                      "key":"music001"
                 },
                 {
                       "name":"我的商城",
                       "sub_button":[
                           {
                               "type":"view",
                               "name":"云和商城",
                               "url":"http://phpergy.applinzi.com/Mobile"
                           },
                           {
                                "type":"view",
                                "name":"京东商城",
                                "url":"http://m.jd.com"
                           },
                       ]
                 }]
        }';
        //初始化curl;
        $ch=curl_init();
        //设置curl配置选项，模拟POST请求;
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POST,1);             //设置请求类型为post;
        curl_setopt($ch,CURLOPT_POSTFIELDS,$post);   //设置post请求的数据;
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);   //设置返回的内容不直接在界面中显示;
        //执行http请求;
        $res=curl_exec($ch);
        //关闭curl资源;
        curl_close($ch);
        echo $res;
    }*/

    //创建自定义菜单;
    public function createMenu(){
        $url="https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$this->accessToken;
        $post='{
                 "button":[
                 {
                      "type":"click",
                      "name":"今日歌曲",
                      "key":"music001"
                 },
                 {
                       "name":"我的商城",
                       "sub_button":[
                           {
                               "type":"view",
                               "name":"云和商城",
                               "url":"http://phpergy.applinzi.com/Mobile"
                           },
                           {
                                "type":"view",
                                "name":"京东商城",
                                "url":"http://m.jd.com"
                           },
                       ]
                 }]
        }';
        $res=$this->http_curl($url,'post',$post) ;
        //关闭curl资源
        var_dump($res);
    }

    //删除菜单;
    public function deleteMenu(){
        //初始化curl;
        $ch=curl_init();
        $url="https://api.weixin.qq.com/cgi-bin/menu/delete?access_token=".$this->accessToken;
        //设置curl配置选项，类型为GET请求;
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        //执行http请求;
        $res=curl_exec($ch);
        //关闭curl资源;
        curl_close($ch);
        echo $res;
    }

    //万能curl;
    public function http_curl($url,$type='get',$data=null){
        //初始化curl
        $ch=curl_init();
        //设置curl配置项
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //设置返回的内容不直接在界面中显示
        if($type=='post'){
            curl_setopt($ch,CURLOPT_POST,1); //设置请求类型为POST
            curl_setopt($ch,CURLOPT_POSTFIELDS,$data); //设置POST提交的数据
        }
        //执行http请求
        $res= curl_exec($ch);
        //关闭curl资源
        curl_close($ch);
        return $res;
    }

    public function getAllFans(){
        $url="https://api.weixin.qq.com/cgi-bin/user/get?access_token=".$this->accessToken;
        $res=$this->http_curl($url);
        $arr=json_decode($res,true);
        return $arr['data']['openid'];
    }

    public function sendMsgToAll(){
        $url="https://api.weixin.qq.com/cgi-bin/message/mass/send?access_token=".$this->accessToken;
        $arr=array(
            'touser'=>$this->getAllFans(),
            'msgtype'=>'text',
            'text'=>array('content'=>urlencode('[呲牙]PHP是最好的语言'))
        );
        $data=urldecode(json_encode($arr));
        $res=$this->http_curl($url,'post',$data);
        var_dump($res);
    }

    public function getUserInfoByOpenId(){
        //1 第一步：用户同意授权，获取code
        $callBack=urlencode("http://phpergy.applinzi.com/Pay/WeChat/getUserInfoNextStep");
        $url="https://open.weixin.qq.com/connect/oauth2/authorize?appid=".$this->appId."&redirect_uri=".$callBack."&response_type=code&scope=snsapi_userinfo&state=123#wechat_redirect";
        header("location:".$url);
    }

    public function getUserInfoNextStep(){
        //2 第二步：通过code换取网页授权access_token
        $code=$_GET['code'];
        $url="https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$this->appId."&secret=".$this->appSecret."&code=$code&grant_type=authorization_code";
        $res=$this->http_curl($url);
        $arr=json_decode($res,true);
        $access_token=$arr['access_token'];
        $openid=$arr['openid'];
        //4 第四步：拉取用户信息(需scope为 snsapi_userinfo)

        $url1="https://api.weixin.qq.com/sns/userinfo?access_token=$access_token&openid=$openid&lang=zh_CN";
        $res1=$this->http_curl($url1);
        $userInfo=json_decode($res1,true);
    }

    public function getJSApiTicket(){
        if(!session('apiTicket') || session('apiTicketTime')<time()){
            $url="https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=".$this->accessToken."&type=jsapi";
            $res=json_decode($this->http_curl($url),true);
            session('apiTicket',$res['ticket']);
            session('apiTicketTime',time()+7100);
        }
        return session('apiTicket');
    }

    public function wx(){
        $appId=$this->appId;
        $time=time();
        //生成签名随机字符串
        $str=join("",array_merge(range('a','z'),range('A','Z'),range(0,9)));
        str_shuffle($str);
        $nonceStr=substr($str,0,16);
        //生成签名
        $url="http://phpergy.applinzi.com/Pay/WeChat/wx";
        $jsApiTicket=$this->getJSApiTicket();
        $temStr="jsapi_ticket=$jsApiTicket&noncestr=$nonceStr&timestamp=$time&url=$url";
        $signature=sha1($temStr);

        $this->assign('appId',$appId);
        $this->assign('time',$time);
        $this->assign('nonceStr',$nonceStr);
        $this->assign('signature',$signature);
        $this->display();
    }
}
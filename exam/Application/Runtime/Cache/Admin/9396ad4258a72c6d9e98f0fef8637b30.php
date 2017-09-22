<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>欢迎登录后台管理系统</title>
<link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/Public/Admin/js/jquery.min.1.8.2.js"></script>
<script src="/Public/Admin/js/jquery.min.1.8.2.js"></script>
<script src="/Public/Admin/js/cloud.js" type="text/javascript"></script>
<script src="/Public/Admin/js/jquery.validate.js"></script>
<script src="/Public/Admin/js/layer/layer.js"></script>

    <style type="text/css">
        input{
            margin-bottom: 8px;
        }
        div.error{
            position: absolute;
            font-size: 14px;
            font-weight: bold;
            color: #FF0000;
        }
        div.ok{
            position: absolute;
            font-size: 14px;
            font-weight: bold;
            color: #38D63B;
        }
        #changePwd{
            cursor: pointer;
        }
    </style>

<script language="javascript">
	$(function(){
        $('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
        $(window).resize(function(){
            $('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
        })
        var validate=$('#form1').validate({
            rules:{
                username:{
                    required:true,
                    rangelength:[5,12],
                    remote:{
                        url:"<?php echo U('chkAdmin');?>",
                        type:'post'
                    }
                },
                password:{
                    required:true,
                    rangelength:[5,12]
                },
                verify:{
                    required:true,
                    remote:{
                        url:"<?php echo U('chkVerify');?>",
                        type:'post'
                    }
                }
            },
            messages:{
                username:{
                    required:'用户名不能为空！',
                    rangelength:'用户名长度必须在5到12位之间！',
                    remote:'用户名不存在！'
                },
                password:{
                    required:'密码不能为空！',
                    rangelength:'密码长度必须在5到12位之间！'
                },
                verify:{
                    required:'验证码不能为空!',
                    remote:'验证码不正确!'
                }
            },
            success:function(div){
                div.addClass('ok').text('通过验证')
            },
            validClass:'ok',
            errorElement:'div'
        })
        $(window).keydown(function(event){
            if(event.keyCode==13){
                $('#form1').submit();
            }
        })
        $('.loginbtn').click(function(){
            $('#form1').submit();
        })
        $('#form1').submit(function(){
            if(validate.form()){
                $.post("<?php echo U('Admin/Login/login');?>",$('#form1').serialize(),function(res){
                    if(res.status==1){
                       layer.msg('登陆成功',{time:2000,icon:6},function(){
                           window.location.href="<?php echo U('Admin/Index/index');?>";
                       })
                    }else{
                        layer.msg(res.info,{time:2000,icon:5},function() {
                            window.location.href="<?php echo U('Admin/Login/login');?>";
                        })
                    }
                },'json');
                return false;
            }
        })
    });
</script> 

</head>

<body style="background-color:#1c77ac; background-image:url(/Public/Admin/images/light.png); background-repeat:no-repeat; background-position:center top; overflow:hidden;" id="body" onLoad="init()">
<div id="mainBody">
    <div id="cloud1" class="cloud"></div>
    <div id="cloud2" class="cloud"></div>
</div>  
<div class="logintop">    
    <span>欢迎登录后台管理界面平台</span>    
    <ul>
        <li><a href="<?php echo U('Home/Index/index');?>">回首页</a></li>
        <li><a href="#">帮助</a></li>
        <li><a href="#">关于</a></li>
    </ul>    
</div>
    
<div class="loginbody">

    <span class="systemlogo"></span>
   
    <div class="loginbox loginbox1">
        <form action="<?php echo U('login');?>" method="post" id="form1">
        <ul>
            <li><input name="username" type="text" class="loginuser" placeholder="用户名" onclick="JavaScript:this.value=''"/></li>
            <li><input name="password" type="password" class="loginpwd" placeholder="密码" onclick="JavaScript:this.value=''"/></li>
            <li class="yzm">
                <span><input name="verify" type="text" placeholder="验证码" onclick="JavaScript:this.value=''"/></span>
                <cite><img src="<?php echo U('verify');?>" width="118" height="46" style="cursor:pointer" onclick="this.src='<?php echo U('verify',rand());?>' "/></cite>
            </li>
            <li class="">
                <input name="" type="button" class="loginbtn" value="登录" />
                <label><input name="remember" type="checkbox" value="" id="remember"/>记住密码</label>
                <label><a href="<?php echo U('forgetPwd');?>">忘记密码？</a></label>
            </li>
        </ul>
        </form>
    </div>
</div>
    
</body>
<script type="text/javascript" src="/Public/Admin/js/ThreeCanvas.js"></script>
<script type="text/javascript" src="/Public/Admin/js/Snow.js"></script>

<script type="text/javascript">
    var SCREEN_WIDTH = window.innerWidth;//
    var SCREEN_HEIGHT = window.innerHeight;
    var container;
    var particle;//粒子
    var camera;
    var scene;
    var renderer;
    var starSnow = 1;
    var particles = [];
    var particleImage = new Image();
    //THREE.ImageUtils.loadTexture( "img/ParticleSmoke.png" );
    particleImage.src = '/Public/Admin/images/ParticleSmoke.png';

    function init() {
        container = document.createElement('div');//container：画布实例;
        document.body.appendChild(container);
        camera = new THREE.PerspectiveCamera( 60, SCREEN_WIDTH / SCREEN_HEIGHT, 1, 10000 );
        camera.position.z = 1000;
        //camera.position.y = 50;
        scene = new THREE.Scene();
        scene.add(camera);
        renderer = new THREE.CanvasRenderer();
        renderer.setSize(SCREEN_WIDTH, SCREEN_HEIGHT);
        var material = new THREE.ParticleBasicMaterial( { map: new THREE.Texture(particleImage) } );
        for (var i = 0; i < 500; i++) {
            particle = new Particle3D( material);
            particle.position.x = Math.random() * 2000-1000;
            particle.position.z = Math.random() * 2000-1000;
            particle.position.y = Math.random() * 2000-1000;
            particle.scale.x = particle.scale.y =  1;
            scene.add( particle );
            particles.push(particle);
        }
        container.appendChild( renderer.domElement );
        //document.addEventListener( 'mousemove', onDocumentMouseMove, false );
        document.addEventListener( 'touchstart', onDocumentTouchStart, false );
        document.addEventListener( 'touchmove', onDocumentTouchMove, false );
        document.addEventListener( 'touchend', onDocumentTouchEnd, false );
        setInterval( loop, 1000 / 60 );
    }

    var touchStartX;
    var touchFlag = 0;//储存当前是否滑动的状态;
    var touchSensitive = 80;//检测滑动的灵敏度;
    function onDocumentTouchStart( event ) {
        if ( event.touches.length == 1 ) {
            event.preventDefault();//取消默认关联动作;
            touchStartX = 0;
            touchStartX = event.touches[ 0 ].pageX ;
            //touchStartY = event.touches[ 0 ].pageY ;
        }
    }

    function onDocumentTouchMove( event ) {

        if ( event.touches.length == 1 ) {
            event.preventDefault();
            var direction = event.touches[ 0 ].pageX - touchStartX;
            if (Math.abs(direction) > touchSensitive) {
                if (direction>0) {touchFlag = 1;}
                else if (direction<0) {touchFlag = -1;};
                //changeAndBack(touchFlag);
            }
        }
    }

    function onDocumentTouchEnd (event) {
        // if ( event.touches.length == 0 ) {
        // 	event.preventDefault();
        // 	touchEndX = event.touches[ 0 ].pageX ;
        // 	touchEndY = event.touches[ 0 ].pageY ;
        // }这里存在问题
        var direction = event.changedTouches[ 0 ].pageX - touchStartX;
        changeAndBack(touchFlag);
    }

    function changeAndBack (touchFlag) {
        var speedX = 25*touchFlag;
        touchFlag = 0;
        for (var i = 0; i < particles.length; i++) {
            particles[i].velocity=new THREE.Vector3(speedX,-10,0);
        }
        var timeOut = setTimeout(";", 800);
        clearTimeout(timeOut);

        var clearI = setInterval(function () {
            if (touchFlag) {
                clearInterval(clearI);
                return;
            };
            speedX*=0.8;

            if (Math.abs(speedX)<=1.5) {
                speedX=0;
                clearInterval(clearI);
            };

            for (var i = 0; i < particles.length; i++) {
                particles[i].velocity=new THREE.Vector3(speedX,-10,0);
            }
        },100);


    }

    function loop() {
        for(var i = 0; i<particles.length; i++){
            var particle = particles[i];
            particle.updatePhysics();

            with(particle.position) {
                if((y<-1000)&&starSnow) {
                    y+=2000;
                }
                if(x>1000) x-=2000;
                else if(x<-1000) x+=2000;
                if(z>1000) z-=2000;
                else if(z<-1000) z+=2000;
            }
        }
        camera.lookAt(scene.position);
        renderer.render( scene, camera );
    }
</script>
</html>
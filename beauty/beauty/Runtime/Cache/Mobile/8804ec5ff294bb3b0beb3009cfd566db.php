<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>搜索列表</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <script src="/Public/Mobile/list/js/rem.js"></script>
    <script src="/Public/Mobile/list/js/jquery.min.1.8.2.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/list/css/base.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/list/css/page.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/list/css/all.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/list/css/mui.min.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/list/css/loaders.min.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/list/css/loading.css"/>
    <!--<link rel="stylesheet" type="text/css" href="slick/slick.css"/>-->
    <script src="/Public/Mobile/layer_mobile/layer.js" type="text/javascript"></script>
<script type="text/javascript">
	$(window).load(function(){
		$(".loading").addClass("loader-chanage")
		$(".loading").fadeOut(300)
	})
</script>
    <style>
        .actived{color:#fff;background: #FF4A4A;width: 80%;border-radius: 5px;padding: 0.3%}
    </style>
</head>
<!--loading页开始-->
<div class="loading">
	<div class="loader">
        <div class="loader-inner pacman">
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
        </div>
	</div>
</div>
<!--loading页结束-->
	<body>
		<!--header star-->
	    <header class="mui-bar mui-bar-nav" id="header">
			<a class="btn" href="javascript:history.go(-1)">
	            <i class="iconfont icon-fanhui"></i>
	        </a>
	        <div class="top-sch-box flex-col">
	            <div class="centerflex" >
                    <form action="<?php echo U('Search/search');?>">
                        <input type="text" name="keywords" id="" value="<?php echo ($keywords?$keywords:'口红'); ?>" class="sch-txt"
                               placeholder="输入您要搜索的商品" />
                        <i style="position: absolute;left: 73%;top: 60%;" class="fdj iconfont ">
                        <input type="submit"  style="opacity: 0.5;font-size: 10px"  value="搜索"/>
                    </i>
                    </form>
	            </div>
	        </div>
	        <a class="btn" href="<?php echo U('Mobile/MyCart/mycart');?>">
	            <i class="iconfont icon-gouwuche"></i>
	            <span><?php echo ($count); ?></span>
	        </a>
	    </header>
		<!--header end-->
		<div class="warp clearfloat">
			<div class="lists clearfloat">
				<div class="top clearfloat">
					<ul>
						<li>默认</li>
						    <li>
                                <?php if($_SESSION['beauty_']['price']== 'saleprice'): ?><a class="actived" href="<?php echo U('Search/search',array('price'=>'saleprice','keywords'=>$keywords));?>">价格</a>
                                    <?php else: ?>
                                    <a  href="<?php echo U('Search/search',array('price'=>'saleprice','keywords'=>$keywords));?>">价格</a><?php endif; ?>
                            <i class="iconfont icon-xiala"></i>
                            </li>
						<li>
                            <?php if($_SESSION['beauty_']['sale']== 'salenum'): ?><a class="actived" href="<?php echo U('Search/search',array('sale'=>'salenum','keywords'=>$keywords));?>">销量优先</a>
                                <?php else: ?>
                                <a  href="<?php echo U('Search/search',array('sale'=>'salenum','keywords'=>$keywords));?>">销量优先</a><?php endif; ?>
                            <i class="iconfont icon-xiala"></i>
                        </li>
					</ul>
				</div>
				<div class="bottom clearfloat" id="insert">
                        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><div class="lie clearfloat">
                                <a href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['id']));?>">
                                    <div class="tu clearfloat fl">
                                        <img style="width: 100px;height: 100px" src="/Uploads/<?php echo ($data['imageurl']); echo ($data['imagename']); ?>"/>
                                    </div>
                                </a>
                                <div class="right clearfloat fl">
                                    <a href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['id']));?>">
                                        <p class="tit"><?php echo (mb_substr($data['goodsname'],0,13,utf8)); ?>...</p>
                                    </a>
                                    <div class="xia clearfloat" >
                                        <a href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['id']));?>">
                                            <p class="jifen fl over">￥<?php echo ($data['saleprice']); ?></p>
                                            <a style="color:red;font-size: 16px;position: absolute;left: 50%" href="<?php echo U('Mobile/Search/smilarGoods',array('cid'=>$data['cid']));?>">
                                                <?php echo ($data['rules'][0]['aname']); ?>
                                            </a>
                                            <a style="color:#000000;font-size:0.3rem;position: absolute;left: 75%"
                                               href="<?php echo U('Mobile/Search/smilarGoods',array('cid'=>$data['cid'],'keywords'=>$keywords));?>">
                                                找相似
                                            </a>
                                        </a>
                                        <br>
                                        <a href="javascript:;">
                                            <p class="jifen fl over" style="color: #808080;width: 100%;font-size: 0.1rem">
                                                销量<?php echo ($data['salenum']); ?>
                                                <a href="<?php echo U('Goods/goodsdetail',array('gid'=>$data['id']));?>" style="color: #f5f5f5;
                                                margin-left: 38%;background-color: red;border-radius: 0.3rem;padding: 3%">
                                                立即查看 &gt;
                                            </a>
                                            </p>
                                        </a>
                                        <span style="color:#000000;font-size: 16px;position: absolute;left: 800px"  gid="<?php echo ($data['id']); ?>" class="fr db">收藏</span>
                                    </div>
                                </div>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                    <div><?php echo ($page); ?></div>
				</div>
			</div>
		</div>
		<!--footer star-->
        <footer class="page-footer fixed-footer" id="footer">
            <ul>
                <li>
                    <a href="<?php echo U('Mobile/Index/index');?>">
                        <i class="iconfont icon-shouye"></i>
                        <p>首页</p>
                    </a>
                </li>
                <li class="active">
                    <a href="<?php echo U('Mobile/Category/index');?>">
                        <i class="iconfont icon-icon04"></i>
                        <p>分类</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo U('Mobile/MyCart/mycart');?>">
                        <i class="iconfont icon-gouwuche"></i>
                        <p>购物车</p>
                    </a>
                </li>
                <li>
                    <?php if($_SESSION['beauty_']['mid']> 0): ?><a href="<?php echo U('Member/index');?>">
                            <i class="iconfont icon-yonghuming"></i>
                            <p>我的</p>
                        </a>
                        <?php else: ?>
                        <a href="<?php echo U('Login/Dologin');?>">
                            <i class="iconfont icon-yonghuming"></i>
                            <p>我的</p>
                        </a><?php endif; ?>

                </li>
            </ul>
        </footer>
		<!--footer end-->
	</body>
	<!--<script type="text/javascript" src="/Public/Mobile/list/js/jery-1.8.3.min.js" ></script>-->
	<!--<script src="/Public/Mobile/list/js/mui.min.js"></script>-->
	<!--<script src="/Public/Mobile/list/js/others.js"></script>-->
	<!--<script type="text/javascript" src="/Public/Mobile/list/js/hmt.js" ></script>-->
	<!--<script src="slick/slick.js" type="text/javascript" ></script>-->
	<!--插件-->
	<link rel="stylesheet" href="/Public/Mobile/list/css/swiper.min.css">
	<script src="/Public/Mobile/list/js/swiper.jquery.min.js"></script>
</html>
<script>
    $(function(){
        $(".db").click(function(){
            var gid=$(this).attr('gid');
            $.get("<?php echo U('Mobile/Search/collectGoods');?>?gid="+gid,function(res){
                if(res.status==1){
                    layer.open({
                        content: '您已成功收藏该商品'
                        ,skin: 'msg'
                        ,time: 5 //2秒后自动关闭
                    });
                }else{
                    if(res.info=='该商品已经在收藏夹里哦'){
                        layer.open({
                            content: '该商品已经在收藏夹里哦'
                            ,skin: 'msg'
                            ,time: 5 //2秒后自动关闭
                        });
                    }else if(res.info=='请先登录'){
                        location.href='<?php echo U("Login/Login");?>'
                    }
                }
            })
        })
    });


    function index(id){
        var keywords= $("input[name='keywords']").val();
        var id=id?id:1;
        $.get("<?php echo U('Search/search');?>",{"p":id,"keywords":keywords},function(res){
            $('#insert').html(res);
        })
    }
</script>
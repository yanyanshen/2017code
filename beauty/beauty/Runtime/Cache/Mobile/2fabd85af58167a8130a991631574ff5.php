<?php if (!defined('THINK_PATH')) exit();?><div id="js_hotgoodslist" class="m_list m_goods_list" >
    <div class="lists clearfloat">
        <div class="bottom clearfloat">
            <?php if(is_array($activityInfo)): $i = 0; $__LIST__ = $activityInfo;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><div class="lie clearfloat">
                    <input type="hidden" class="input" value="<?php echo ($data['restTime']); ?>"  restTime="<?php echo ($data['restTime']); ?>"/>
                    <a href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['id']));?>">
                        <div class="tu clearfloat fl">
                            <img style="" src="/Uploads/<?php echo ($data['imageurl']); echo ($data['imagename']); ?>"/>
                        </div>
                    </a>
                    <a  href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['id']));?>">
                        <p class="tit" style="font-size: 15px;margin-left:2%;"><?php echo (mb_substr($data['goodsname'],0,13,utf8)); ?>...</p>
                        <p style="color: #ff662c;margin-top: 3%;margin-bottom: 2%">￥<?php echo ($data['saleprice']); ?></p>
                    </a>
                            <span class="jifen fl over" style="width: 30%;margin-left:2%;margin-top: 2%;">
                                <a style="color:red;">
                                    <?php echo ($data['aname']); ?>
                                </a>
                            </span>
                            <span class="jifen fl over time"
                                  style="width:80%;font-size: 10px;margin-left: 27%">
                                </span>
                            <span>
                                <a style="width:30%;height: 44px;border:1px solid red;background-color: red;
                                padding: 3px;color: white;font-size: 15px;border-radius: 10px;margin-left: 20%;
                                    " href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['id']));?>">
                                    马上抢&gt;
                                </a>
                            </span>
                </div>

                <script>
                    var a=parseInt('<?php echo ($i-1); ?>');
                    function timer(a){
                        var ts = $(".input").eq(a).attr('restTime'); //设置目标时间，并计算剩余的毫秒数
                        var dd = parseInt(ts/60/60/24);  //计算剩余天数
                        var today=new Date();
                        var hh=today.getHours();
                        var mm=today.getMinutes();
                        var ss=today.getSeconds();
                        $('.time').eq(a).text('还剩:'+dd+'天'+parseInt(24-hh)+'小时'+parseInt(60-mm)+'分'+parseInt(60-ss)+'秒');
                    }
                    setInterval('timer(parseInt("<?php echo ($i-1); ?>"))',1000); // 每隔1S执行一次
                </script><?php endforeach; endif; else: echo "$empty" ;endif; ?>
        </div>
    </div>
    <div><?php echo ($page); ?></div>
</div>
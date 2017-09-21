<?php if (!defined('THINK_PATH')) exit(); if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><div class="lie clearfloat">
        <a href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['id']));?>">
            <div class="tu clearfloat fl">
                <img src="/Uploads/<?php echo ($data['imageurl']); echo ($data['imagename']); ?>"/>
            </div>
        </a>
        <div class="right clearfloat fl">
            <a href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['id']));?>">
                <p class="tit"><?php echo (mb_substr($data['goodsname'],0,13,utf8)); ?>...</p>
            </a>
            <div class="xia clearfloat" >
                <a href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['id']));?>">
                    <p class="jifen fl over">￥<?php echo ($data['saleprice']); ?></p>
                    <a style="color:red;font-size: 0.5rem;position: absolute;left: 52%">
                        <?php echo ($data['rules'][0]['aname']); ?>
                    </a>
                    <a class="db" gid="<?php echo ($data['id']); ?>" style="color:#000000;font-size: 0.5rem;position: absolute;left: 75%">
                        收藏
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
            </div>
        </div>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>
<div><?php echo ($page); ?></div>
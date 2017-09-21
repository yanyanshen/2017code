<?php
namespace Mobile\Controller;
use Think\Controller;
class GoodsController extends Controller{
    public function goodsdetail(){
        $gid=I('get.gid');
        $mid=session('mid');
        $goods=D('Goods');
        $goodslist=$goods->goods($gid);
        $goods->foot($gid);
        $typelist=$goods->type($gid);
        $ruleslist=$goods->rules($gid);
        $zhuimg=$goods->zhuimg($gid);
        $fuimg=$goods->fuimg($gid);
        $orderinfo=$goods->orderrecord($gid);
        $this->assign('goodslist',$goodslist);
        $this->assign('typelist',$typelist);
        $this->assign('ruleslist',$ruleslist);
        $this->assign('zhuimg',$zhuimg);
        $this->assign('fuimg',$fuimg);
        //成交记录
        $this->assign('orderinfo',$orderinfo);
        //显示一条评价记录
        $commresponlist1=M('Goods')->field('c.content,c.cosid,c.coaddtime,c.response,c.id,u.username,u.imgpath,u.imgname,c.ml,c.readdtime,c.respid,cs.costatus,
  c.imageurl,c.imagename')
            ->table('beauty_comment c,beauty_user u,beauty_comment_status cs')
            ->where(array('c.gid'=>$gid))
            ->where('c.mid=u.id and c.cosid=cs.id')
            ->limit(0,1)
            ->order(array('c.coaddtime'=>'desc'))
            ->select();// 查询总评价
        $this->assign('commresponlist1',$commresponlist1);
        $this->assign('empty1','<h1 style="font-size: 20px;font-weight: bold;">还没有用户评价信息</h1>');
        //第二天清空点赞表里面的次数
        if($mid){
            $time=time();
            $res=M('Count')->field('gcount,addtime,todaycount,stoptime')->where(array('gid'=>$gid,'mid'=>$mid))->find();
            if($res){
                if($time>$res['stoptime']){
                    $data['todaycount']=0;
                    M('Count')->where(array('gid'=>$gid,'mid'=>$mid))->save($data);
                }
            }
        }
        $totalcount1=M('Comment')->where(array('gid'=>$gid))->count();//总记录数
        $totalcount2=M('Comment')->where(array('gid'=>$gid,'cosid'=>1))->count();//好总记录数
        $totalcount3=M('Comment')->where(array('gid'=>$gid,'cosid'=>2))->count();//中记录数
        $totalcount4=M('Comment')->where(array('gid'=>$gid,'cosid'=>3))->count();//差记录数
        //输出全部，好，中，差的评论条目
        $this->assign('totalcount1',$totalcount1);
        $this->assign('totalcount2',$totalcount2);
        $this->assign('totalcount3',$totalcount3);
        $this->assign('totalcount4',$totalcount4);

        //展示商品的点赞次数
        $gcount=M('Count')->query("select sum(gcount) as goodscount from beauty_count where gid=$gid");
        $this->assign('gcount',$gcount[0]['goodscount']);
        $this->display('goods_detail');

    }

    //限制商品点赞的次数
    public function goodscount(){
        $mid=session('mid');
        $gid=I('post.gid');
        if($mid){
            $res=M('Count')->field('gcount,addtime,todaycount')->where(array('gid'=>$gid,'mid'=>$mid))->find();
            if($res){
                    if($res['todaycount']==3){
                        $this->error(1);
                    }else{
                        M('Count')->where(array('gid'=>$gid,'mid'=>$mid))->setInc('gcount', 1);
                        M('Count')->where(array('gid'=>$gid,'mid'=>$mid))->setInc('todaycount', 1);
                        $gcount=M('Count')->query("select sum(gcount) as goodscount from beauty_count where gid=$gid");
                        $goodsdata['goodscount']=$gcount[0]['goodscount'];
                        M('Goods')->where(array('id'=>$gid))->save($goodsdata);
                        $this->success($gcount[0]['goodscount']);
                    }
                }
            else{
                $countdata['addtime']=time();
                $countdata['gid']=$gid;
                $countdata['gcount']=1;
                $countdata['todaycount']=1;
                $countdata['mid']=$mid;
                $countdata['stoptime']=strtotime(date('Y-m-d',time()))+86400;
                M('Count')->add($countdata);
                $gcount=M('Count')->query("select sum(gcount) as goodscount from beauty_count where gid=$gid");
                $goodsdata['goodscount']=$gcount[0]['goodscount'];
                M('Goods')->where(array('id'=>$gid))->save($goodsdata);
                $this->success($gcount[0]['goodscount']);
            }
        }else{
            $this->error(2);
        }
    }

    public function countpaihang(){
        $goodsinfo=M('Goods')->order('goodscount desc')->limit(0,6)->select();
        $this->assign('goodsinfo',$goodsinfo);
        $this->display('countpaihang');
    }


    //查看全部评价
    public function allcomment(){
        $gid=I('get.gid');
        //显示异步分页的一些信息
        $commentwhere1['c.gid']=$gid;
        $commentwhere2['c.gid']=$gid;
        $commentwhere3['c.gid']=$gid;
        $commentwhere4['c.gid']=$gid;
        $commentwhere5['c.gid']=$gid;
        $commentwhere6['c.gid']=$gid;
        $commentwhere2['c.cosid']=1;
        $commentwhere3['c.cosid']=2;
        $commentwhere4['c.cosid']=3;
        $commentwhere5['c.isimage']=1;
        $commentwhere6['c.zuijiacount']=1;
        //显示好评率，以及好，中，差的百分率
        //全部的评论条目
        $list=D('Comment');
        $limitRows = 1; // 设置每页记录数
        $totalcount1=M('Comment')->where(array('gid'=>$gid))->count();//总记录数
        $p1 = new \Org\Beauty\AjaxPage($totalcount1,$limitRows,"goodsdetail1"); //第三个参数是你需要调用换页的ajax函数名
        $limit_value1 = $p1->firstRow .",". $p1->listRows;
        $commresponlist1=$list->goods($commentwhere1,$limit_value1);
        $page1 = $p1->show(); //产生分页信息，AJAX的连接在此处生成

        $totalcount2=M('Comment')->where(array('gid'=>$gid,'cosid'=>1))->count();//总记录数
        $p2 = new \Org\Beauty\AjaxPage($totalcount2,$limitRows,"goodsdetail2"); //第三个参数是你需要调用换页的ajax函数名
        $limit_value2 = $p2->firstRow .",". $p2->listRows;
        $commresponlist2=$list->goods($commentwhere2,$limit_value2);
        $page2 = $p2->show(); //产生分页信息，AJAX的连接在此处生成

        $totalcount3=M('Comment')->where(array('gid'=>$gid,'cosid'=>2))->count();//总记录数
        $p3 = new \Org\Beauty\AjaxPage($totalcount3,$limitRows,"goodsdetail3"); //第三个参数是你需要调用换页的ajax函数名
        $limit_value3 = $p3->firstRow .",". $p3->listRows;
        $commresponlist3=$list->goods($commentwhere3,$limit_value3);
        $page3 = $p3->show(); //产生分页信息，AJAX的连接在此处生成

        $totalcount4=M('Comment')->where(array('gid'=>$gid,'cosid'=>3))->count();//总记录数
        $p4 = new \Org\Beauty\AjaxPage($totalcount4,$limitRows,"goodsdetail4"); //第三个参数是你需要调用换页的ajax函数名
        $limit_value4 = $p4->firstRow .",". $p4->listRows;
        $commresponlist4=$list->goods($commentwhere4,$limit_value4);
        $page4 = $p4->show(); //产生分页信息，AJAX的连接在此处生成


        //有图的订单
        $totalcount5=M('Comment')->where(array('gid'=>$gid,'isimage'=>1))->count();//总记录数
        $p5 = new \Org\Beauty\AjaxPage($totalcount5,$limitRows,"goodsdetail5"); //第三个参数是你需要调用换页的ajax函数名
        $limit_value5 = $p5->firstRow .",". $p5->listRows;
        $commresponlist5=$list->goods($commentwhere5,$limit_value5);
        $page5 = $p5->show(); //产生分页信息，AJAX的连接在此处生成


        //追加的评论
        $totalcount6=M('Comment')->where(array('gid'=>$gid,'zuijiacount'=>1))->count();//总记录数
        $p6 = new \Org\Beauty\AjaxPage($totalcount6,$limitRows,"goodsdetail6"); //第三个参数是你需要调用换页的ajax函数名
        $limit_value6 = $p6->firstRow .",". $p6->listRows;
        /* $commresponlist6=$list->goods($commentwhere6,$limit_value6);*/
        $commresponlist6=M('Comment')->field('c.content,c.cosid,c.coaddtime,c.response,c.id,u.username,u.imgpath,u.imgname,c.ml,c.readdtime,c.respid,cs.costatus,
  c.imageurl,c.imagename,c.picurl,c.picname,c.zuijia,c.zuijiatime')
            ->table('beauty_comment c,beauty_user u,beauty_comment_status cs')
            ->where($commentwhere6)
            ->where('c.mid=u.id and c.cosid=cs.id')
            ->limit($limit_value6)
            ->order(array('c.coaddtime'=>'desc'))
            ->select();// 查询总评价
        foreach($commresponlist6 as $k=>$v){
            $commresponlist6[$k]['zuijiatime']=ceil(($v['zuijiatime']-$v['coaddtime'])/86400);
        }
        $page6 = $p6->show(); //产生分页信息，AJAX的连接在此处生成


        //显示商品的评论回复信息
        $this->assign('commresponlist1',$commresponlist1);
        $this->assign('empty1','<h1 style="font-size: 20px;font-weight: bold;">还没有用户评价信息</h1>');
        $this->assign('commresponlist2',$commresponlist2);
        $this->assign('empty2','<h1 style="font-size: 20px;font-weight: bold;">还没有用户评价信息</h1>');
        $this->assign('commresponlist3',$commresponlist3);
        $this->assign('empty3','<h1 style="font-size: 20px;font-weight: bold;">还没有用户评价信息</h1>');
        $this->assign('commresponlist4',$commresponlist4);
        $this->assign('empty4','<h1 style="font-size: 20px;font-weight: bold;">还没有用户评价信息</h1>');
        $this->assign('commresponlist5',$commresponlist5);
        $this->assign('empty5','<h1 style="font-size: 20px;font-weight: bold;">还没有用户评价信息</h1>');
        $this->assign('commresponlist6',$commresponlist6);
        $this->assign('empty6','<h1 style="font-size: 20px;font-weight: bold;">还没有用户评价信息</h1>');
        //展示输出分页
        $this->assign('page1',$page1);
        $this->assign('page2',$page2);
        $this->assign('page3',$page3);
        $this->assign('page4',$page4);
        $this->assign('page5',$page5);
        $this->assign('page6',$page6);
        //输出全部，好，中，差的评论条目
        $this->assign('totalcount1',$totalcount1);
        $this->assign('totalcount2',$totalcount2);
        $this->assign('totalcount3',$totalcount3);
        $this->assign('totalcount4',$totalcount4);
        $this->assign('totalcount5',$totalcount5);
        $this->assign('totalcount6',$totalcount6);
        //将评价商品的gid传过去
        $this->assign('gid',$gid);
        if(IS_AJAX){
            switch (I('get.cid')){
                case 1:
                    $this->display('result1');
                    break;
                case 2:
                    $this->display('result2');
                    break;
                case 3:
                    $this->display('result3');
                    break;
                case 4:
                    $this->display('result4');
                    break;
                case 5:
                    $this->display('result5');
                    break;
                case 6:
                    $this->display('result6');
                    break;
            }
        }else{
             $this->display('goodscommentlist');
        }
    }

    public function imgdetail(){
        $gid=I('get.gid');
        $goods=D('Goods');
        $fuimg=$goods->fuimg($gid);
        $this->assign('fuimg',$fuimg);
        $this->display('imgdetail');
    }

    public function shuxing(){
        $this->display('goodslayer');
    }

    public function saleprice(){
        $ml=I('post.xinghao');
        $gid=I('post.gid');
        $where['ml']=substr($ml,0,-2);
        $where['gid']=$gid;
        $saleprice=M('Type')->field('saleprice')->where($where)->find();
        if($saleprice){
            $this->success($saleprice['saleprice']);
        }
    }
}
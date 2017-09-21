<?php
namespace Mobile\Controller;
use Think\Controller;
class CommentController extends Controller
{
    //显示需要评价的商品信息
    public function commentgoods()
    {
        //显示所评价的商品的信息
        $oid = I('get.oid');
        $str = '';
        $gidInfo = M('order_goods')->where(array('oid' => $oid))->select();
        foreach ($gidInfo as $k => $v) {
            $str .= $v['gid'] . ',';
            $str1 = substr($str, 0, -1);
        }
        $where['g.id'] = array('in', $str1);
        $where['o.mid'] = session('mid');
        $where['o.id'] = $oid;
        $goodsInfo = M('Goods')->table('beauty_goods g,beauty_order_goods og,beauty_order o')->where('g.id=og.gid and o.id=og.oid')
            ->field('g.imageurl,g.imagename,g.goodsname,g.id,og.ml,g.saleprice')->where($where)->select();
        $this->assign('goodsInfo', $goodsInfo);
        $this->assign('oid', $oid);
        $this->display('Comment');
    }


    public function usercomment()
    {
        if (IS_POST) {
            $arr = I('post.');
            if ($arr) {
                //上传晒图
                $common = A('Common');
                $info = $common->uploadPic();
                foreach ($arr as $k => $v) {
                    $data[$k]['ml']=$v['ml'];
                    $data[$k]['gid']=$v['gid'];
                    $data[$k]['oid']=$v['oid'];
                    $data[$k]['content']=$v['content'];
                    $data[$k]['cosid']=$v['pingjia'][0];
                    $data[$k]['mid']=session('mid');
                    $data[$k]['coaddtime'] = time();
                    $data[$k]['cstatus']=5;
                    if(is_array($info)) {
                        $data[$k]['imageurl'] = $info["image$k"]['savepath'];
                        $data[$k]['imagename'] = $info["image$k"]['savename'];
                        if($data[$k]['imageurl']&&$data[$k]['imagename']){
                            $data[$k]['isimage']=1;
                        }
                    }
                }
                foreach ($data as $k1 => $val) {
                    //判断一下$k1是否是数值，是的话就执行插入操作
                    if (is_numeric($k1)) {
                        if (M('Comment')->add($val)) {
                            $data1['status'] = 5;
                            //更新订单表里面的状态
                            M('Order')->where(array('id' => $val['oid']))->save($data1);
                        }
                    }
                }

                $this->success('评价成功');
            } else {
                $this->error('评价失败');
            }
        }
    }

//追加评价的一些商品信息
    public function zuijiacomment()
    {
        //显示所评价的商品的信息
        $oid = I('get.oid');
        $str = '';
        $gidInfo = M('order_goods')->where(array('oid' => $oid))->select();
        foreach ($gidInfo as $k => $v) {
            $str .= $v['gid'] . ',';
            $str1 = substr($str, 0, -1);
        }
        $where['g.id'] = array('in', $str1);
        $where['o.mid'] = session('mid');
        $where['o.id'] = $oid;
        $goodsInfo = M('Goods')->table('beauty_goods g,beauty_order_goods og,beauty_order o')->where('g.id=og.gid and o.id=og.oid')
            ->field('g.imageurl,g.imagename,g.goodsname,g.id,og.ml,g.saleprice')->where($where)->select();
        $this->assign('goodsInfo', $goodsInfo);
        $this->assign('oid', $oid);
        $this->display('zuijiacomment');
    }

    //追加评价
    public function zuijiasuccess()
    {
        if (IS_POST) {
            $arr = I('post.');
            if ($arr) {
                //上传晒图
                $common = A('Common');
                $info = $common->uploadPic();
                foreach ($arr as $k => $v) {
                    $data[$k]['ml'] = $v['ml'];
                    $data[$k]['gid'] = $v['gid'];
                    $data[$k]['oid'] = $v['oid'];
                    $data[$k]['content'] = $v['content'];
                    $data[$k]['cosid'] = $v['pingjia'][0];
                    $data[$k]['mid'] = session('mid');
                    $data[$k]['coaddtime'] = time();
                    if (is_array($info)) {
                        $data[$k]['imageurl'] = $info["image$k"]['savepath'];
                        $data[$k]['imagename'] = $info["image$k"]['savename'];
                    }
                }
                foreach ($data as $k1 => $val) {
                    //判断一下$k1是否是数值，是的话就执行插入操作
                    $commentwhere['oid'] = $val['oid'];
                    $commentwhere['gid'] = $val['gid'];
                    $commentwhere['mid'] = session('mid');
                    $commentwhere['ml'] = $val['ml'];
                    $data1['zuijia'] = $val['content'];
                    $data1['cstatus'] = 6;
                    $data1['zuijiatime']=time();
                    if($val['content']){
                        $data1['zuijiacount']=1;
                    }
                    if ($val['imageurl'] && $val['imagename']) {
                        $data1['picurl'] = $val['imageurl'];
                        $data1['picname'] = $val['imagename'];
                    }
                    if (is_numeric($k1)) {
                        if (M('Comment')->where($commentwhere)->save($data1)) {
                            $data2['status'] = 6;
                            //更新订单表里面的状态
                            M('Order')->where(array('id'=>$val['oid']))->save($data2);
                        }
                    }
                }
                $this->success('追加成功');
            } else {
                $this->error('追加失败');
            }
        }
    }

//删除订单
    public function deleteorder()
    {
        $oid = I('post.oid');
        if (M('Order')->where(array('id' => $oid, 'mid' => session('mid')))->delete()) {
            if (M('Order_goods')->where(array('oid' => $oid))->delete()) {
                $this->success();
            } else {
                $this->error();
            }
        }
    }


    //显示需要评价的商品信息
    public function showusercomment(){
        $comment=M('Comment');
        $mid=session('mid');
        $commentwhere['c.mid']=$mid;
        $limitRows = 4; // 设置每页记录数
        $count=$comment->field('g.goodsname,g.imageurl,g.imagename,g.id,c.content,c.response,c.ml')
            ->table('beauty_goods g,beauty_comment c')->where('g.id=c.gid')->where($commentwhere)->count();
        $Page = new \Org\Beauty\AjaxPage($count,$limitRows,"commentlist");
        $show=$Page->show();

        $commentlist=$comment->field('g.goodsname,g.imageurl,g.imagename,c.gid,c.oid,c.content,c.response,c.respid,cs.costatus,c.coaddtime,c.ml')
            ->table('beauty_goods g,beauty_comment c,beauty_comment_status cs')->order('c.coaddtime desc')
            ->where('g.id=c.gid and c.cosid=cs.id')->where($commentwhere)->limit($Page->firstRow.','.$Page->listRows)->select();

        //显示用户的一些信息
        $userwhere['u.id']=$mid;
        $userInfo=M('User')->table('beauty_user u,beauty_user_vipinfo v')->where('u.memberorder=v.id')->where($userwhere)->select();
        $this->assign('userInfo',$userInfo);
        $this->assign('page',$show);
        $this->assign('commentlist',$commentlist);
        $this->assign('count',$count);
        $this->assign('empty','<h1 style="font-size: 20px;font-weight: bold;">该用户还未做出任何评价</h1>');
        $this->display('usercommentlist');

    }

    //删除评论
    public function deletecomment(){
        $gid=I('get.gid');
        $mid=session('mid');
        $oid=I('get.oid');
        $comwhere['gid']=$gid;
        $comwhere['mid']=$mid;
        $comwhere['oid']=$oid;
        if(M('Comment')->where($comwhere)->delete()){
            $this->success();
        }else{
            $this->error();
        }
    }
}



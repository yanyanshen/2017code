<?php
namespace Mobile\Controller;
use Think\Controller;
use Think\Page;

class FootprintController extends Controller{
/*展示足迹方法*/
    public function footprint()
    {
            $where['f.addtime'] = array('between', array(strtotime('-1 month'), time()));
            $where['mid'] = session('mid');
            $where['_string'] = 'f.gid=g.id and g.bid=b.id';
            $footInfo = M('footprint')
                ->table('beauty_footprint f,beauty_goods g,beauty_brands b')
                ->field('f.gid,g.collectnum,b.blogopath,b.blogoname,f.goodsname,b.bname,g.saleprice,g.imageurl,g.imagename,g.cid')
                ->where($where)->select();
        $this->assign('empty','<h3 style="text-align: center;color: orangered">您的足迹为空，快去随便看看吧！！！</h3>');
            $this->assign('footInfo', $footInfo);
            $this->display('history');
    }
    /*删除足迹商品*/
    public function deletefoot(){
        $where['mid']=session('mid');
        $where['gid']=I('gid');
        M('footprint')->where($where)->delete();
        $this->success();
    }
//删除所有足迹商品
    public function deleteAll(){
        $where['mid']=session('mid');
        if( M('footprint')->where($where)->delete()){
            $this->success();
        }
    }

/*足迹页面找相似商品*/
    public function similar(){
        $cid=I('cid');
        $where['cid']=$cid;
        $list=M('goods')->where($where)->select();
        $this->assign('list',$list);
        $this->display('similar');
    }
}
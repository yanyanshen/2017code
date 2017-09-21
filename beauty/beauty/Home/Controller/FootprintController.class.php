<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;

class FootprintController extends Controller
{
/*展示足迹方法*/
    public function footprint()
    {
        if (session('mid')) {
            $where['f.addtime'] = array('between', array(strtotime('-1 month'), time()));
            $where['f.mid'] = session('mid');
            $where['_string'] = 'f.gid=g.id and g.bid=b.id';
            $count = M('footprint')
                ->table('beauty_footprint f,beauty_goods g,beauty_brands b')
                ->where($where)->count();
            $Page = new Page($count, 15);
            $show = $Page->show();
            $footInfo = M('footprint')
                ->table('beauty_footprint f,beauty_goods g,beauty_brands b')
                ->limit($Page->firstRow . ',' . $Page->listRows)
                ->field('f.gid,g.collectnum,b.blogopath,b.blogoname,f.goodsname,b.bname,g.saleprice,g.imageurl,g.imagename,g.cid')
                ->where($where)->select();
            $this->assign('page', $show);
            $this->assign('footInfo', $footInfo);
            $this->display('Footprint');
        }else{
            $this->redirect('Home/Login/Login');
        }
    }
    /*删除足迹商品*/
    public function deletefoot(){
        $where['mid']=session('mid');
        $where['gid']=I('gid');
        M('footprint')->where($where)->delete();
        $this->success();
    }
/*足迹页面找相似商品*/
    public function similar(){
        $cid=I('cid');
        $where['cid']=$cid;
        $list=M('goods')->where($where)->select();
        //print_r($cid);
        $this->assign('list',$list);
        $this->display('similar');
    }
}
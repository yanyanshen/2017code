<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
class MustSeeController extends Controller {
    public function index(){
        $this->mustSee();
        $this->display('Must_see');
    }

    public function mustSee(){
       $goodsInfo= M('goods')->query('SELECT c.cname,g.id,b.bname,g.goodsname,g.imageurl,g.imagename,g.salenum,b.blogopath,b.blogoname,g.bid,g.saleprice
FROM beauty_category c,beauty_brands b,beauty_goods g
where g.bid=b.id and g.cid=c.id and  bid not in (select bid from beauty_activity where astatus=1)
ORDER by g.addtime desc limit 0,8');
        //print_r($goodsInfo);
        $this->assign('goodsInfo',$goodsInfo);
    }
    public function girl(){

        $where['_string']='g.bid=b.id and g.cid=c.id  and g.goodsname like "%女%"
        and g.bid not in (select bid from beauty_activity where astatus=1)';
        $count = M('goods')
            ->table('beauty_category c,beauty_goods g,beauty_brands b')
            ->where($where)->count();
        $Page = new Page($count,12);
        $show = $Page->show();
        $goodsInfo =  M('goods')
            ->table('beauty_category c,beauty_goods g,beauty_brands b')
            ->limit($Page->firstRow . ',' . $Page->listRows)
            ->field(' c.cname,g.id,b.bname,g.goodsname,g.imageurl,
                    g.imagename,g.salenum,b.blogopath,b.blogoname,g.bid,g.saleprice')
            ->where($where)
            ->select();
        $this->assign('page',$show);
        $this->assign('goodsInfo',$goodsInfo);
        $this->display('girl');
    }
    public function boy(){
        $where['_string']='g.bid=b.id and g.cid=c.id  and g.goodsname like "%男%"
        and g.bid not in (select bid from beauty_activity where astatus=1)';
        $count = M('goods')
            ->table('beauty_category c,beauty_goods g,beauty_brands b')
            ->where($where)->count();
        $Page = new Page($count,12);
        $show = $Page->show();
        $goodsInfo =  M('goods')
            ->table('beauty_category c,beauty_goods g,beauty_brands b')
            ->limit($Page->firstRow . ',' . $Page->listRows)
            ->field(' c.cname,g.id,b.bname,g.goodsname,g.imageurl,
                    g.imagename,g.salenum,b.blogopath,b.blogoname,g.bid,g.saleprice')
            ->where($where)->select();
        $this->assign('page',$show);
        $this->assign('goodsInfo',$goodsInfo);
        $this->display('boy');
    }
}
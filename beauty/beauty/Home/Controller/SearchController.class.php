<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
class SearchController extends Controller
{
/*按关键字搜索*/
    public function index()
    {
        $this->brandsInfo();
        $this->recommend();
        $this->sale();
        $this->browse();
        //删除session
        if(I('get.keywords')||I('moren')||I('cid')){
            session('moren1','moren1');
            session('moren2','moren2');
            session('moren','moren');
            session('bid',null);
            session('high',null);
            session('low',null);
            session('saledesc',null);
            session('pricedesc',null);
            session('newGoods',null);
            session('cid',null);
        }
        if(I('moren1')){
            session('moren1','moren1');
            session('bid',null);
        }
        if(I('moren2')){
            session('moren2','moren2');
            session('high',null);
            session('low',null);
        }

        //表单
        session('keywords',I('get.keywords'));
        $where['goodsname']=array('like',"%".session('keywords').'%');
        $keywords=session('keywords');

        if(I('cid')){
            session('cid',I('cid'));
        }
        if(session('cid')){
            $where['cid']=session('cid');
        }
        if(I('get.bid')){
            session('moren',null);
            session('moren1',null);
            session('bid',I('get.bid'));
        }
        if(session('bid')){
            $where['bid']=session('bid');
        }
        if(I('get.price')){
            session('moren',null);
            session('moren2',null);
            $priceArr=explode('-',I('get.price'));
            session('low',$priceArr[0]);
            session('high',$priceArr[1]);
        }

        if(session('high')){
            $where['saleprice']=array('between',array(session('low'),session('high')));
        }

        if(I('get.saledesc')){
            session('pricedesc',null);
            session('newGoods',null);
            session('moren',null);
            session('saledesc',I('get.saledesc'));
        }
        if(session('saledesc')){
            $order=session('saledesc').' '.'desc';
        }

        if(I('get.pricedesc')){
            session('saledesc',null);
            session('newGoods',null);
            session('moren',null);
            session('pricedesc',I('get.pricedesc'));
        }
        if(session('pricedesc')){
            $order=session('pricedesc');
        }
        if(I('get.newGoods')){
            session('saledesc',null);
            session('pricedesc',null);
            session('moren',null);
            session('newGoods',I('get.newGoods'));
        }
        if(session('newGoods')){
            $order=session('newGoods');
        }

        $count=M('Goods')
            ->where($where)
            ->order($order)
            ->count();
        $page=new Page($count,12);
        $show=$page->show();
        $goodsList=M('Goods')
            ->where($where)
            ->order($order)
            ->limit($page->firstRow.','.$page->listRows)
            ->select();
        $this->assign('page',$show);
        $this->assign('empty','<h1>没有你想要的数据</h1>');
        $this->assign('list',$goodsList);
        $this->assign('keywords',$keywords);
        $this->display('product_list');
    }

    //搜索页销量排
    public function sale(){
        $sale=M('goods')->where(array('show'=>1))
            ->order('salenum desc')
            ->limit(0,10)->select();
        $this->assign('sale',$sale);
    }

    //遍历品牌
    public function brandsInfo(){
        $brandtype=M('brandtype')->select();
        foreach($brandtype as $k=>$v){
            $brandtype[$k]['child']=M('brands')->where(array('brandtype'=>$v['id'],'status'=>1))->select();
        }
        $this->assign('brands',$brandtype);
    }

    //搜索页今日推荐
    public function recommend(){
        $recommendGoods=M('goods')->where(array('show'=>1))->order('salenum desc')->limit(0,6)->select();
        $this->assign('recommendGoods',$recommendGoods);
    }

    //浏览记录
    public function browse(){
        $where['_string']='g.id=f.gid';
        $footInfo = M('footprint')
            ->table('beauty_goods g,beauty_footprint f')
            ->where($where)
            ->field('f.gid,g.goodsname,g.saleprice,g.imageurl,g.imagename,g.salenum')
            ->order('f.addtime desc')
            ->limit(0,3)
            ->select();
        $this->assign('footInfo',$footInfo);
    }
}
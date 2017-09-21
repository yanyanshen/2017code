<?php
namespace Mobile\Controller;
use Think\Controller;
use Org\Beauty\AjaxPage;
class GoodsListController extends Controller {
    public function index(){
        $this->cate();
        $this->brand();
        $this->display('goods_list');
    }

    public function goodslist(){
        $this->cate();
        $this->brand();
        $order='saleprice';
        if(I('get.cid')||I('get.moren')){
            session('moren','moren');
            session('sale',null);
            session('collect',null);
            session('price1',null);
            session('price3',null);
            session('low',null);
            session('high',null);
            session('bid',null);
        }
        $where1['id']=I('get.cid');

        if(I('get.bid')){
            session('moren',null);
            session('bid',I('get.bid'));
        }
        if(session('bid')){
            $where4['g.bid']=session('bid');
        }

        if(I('get.price3')){
            session('moren',null);
            $priceArr=explode('-',I('get.price3'));
            session('low',$priceArr[0]);
            session('high',$priceArr[1]);
        }

        if(session('high')){
            $where4['g.saleprice']=array('between',array(session('low'),session('high')));
        }

        if(I('get.sale')){
            session('moren',null);
            session('sale','g.salenum');
        }
        if(session('sale')){
            $order=session('sale');
        }

        if(I('get.collect')){
            session('moren',null);
            session('collect','g.collectnum');
        }
        if(session('collect')){
            $order=session('collect').' '.'desc';
        }


        if(I('get.price1')){
            session('moren',null);
            session('price1','g.saleprice');
        }
        if(session('price1')){
            $order=session('price1').' '.'desc';
        }
        $goodsList=$this->getGoodsCateBycId($where1,$order,$where4);
        $this->assign('goodsList',$goodsList);
        $this->assign('empty','<h3 style="text-align: center;color: #a9a9a9">没有符合的数据</h3>');
        $this->display('goods_list');
    }

    public function getGoodsCateBycId($where1,$order,$where4){
        $pathArr=M('category')->field('path,id,cname')->where($where1)->find();
        $path=$pathArr['path'];
        //得到 以$path 开头的所有子分类id
        $where2['path']=array('like',"{$path}%");
        $idArr=M('category')->field('id,cname')->where($where2)->select();
        $idStr='';
        foreach($idArr as $v){
            //得到的id是个数组 得到里面的字符串值
            $idStr.=$v['id'].',';
        }
        $idStr=substr($idStr,0,-1);
        $where4['g.cid']=array('in',"{$idStr}");
        $goods=M('goods')->table('beauty_goods g')
            ->field('g.id as gid,g.goodsname,g.imageurl,g.imagename,g.salenum,g.saleprice,g.cid')
            ->where($where4)
            ->order($order)
            ->select();

        $goods[0]['cname']=$idArr[0]['cname'];
        return $goods;
    }


    public function cate(){
        $cate=M('category')->field('cname,id')->where('pid=0')->select();
        $this->assign('cate',$cate);

    }
    public function brand(){
        $brand=M('brands')->field('bname,id,blogopath,blogoname')->limit('0,12')->select();
        $this->assign('brand',$brand);
    }
    public function temai(){
        $this->cate();
        $this->brand();
        if(I('get.temai')||I('get.moren')){
            session('moren','moren');
            session('sale1',null);
            session('collect1',null);
            session('price2',null);
            session('price3',null);
            session('bid',null);
            session('cid',null);
            session('low',null);
            session('high',null);
        }
        if(I('get.bid')){
            session('moren',null);
            session('bid',I('get.bid'));
        }
        if(session('bid')){
            $where['a.bid']=session('bid');
        }

        if(I('get.cid')){
            session('moren',null);
            session('cid',I('get.cid'));
        }
        if(session('cid')){
            session('moren',null);
            $where['g.cid']=session('cid');
        }
////
        if(I('get.price3')){
            session('moren',null);
            $priceArr=explode('-',I('get.price3'));
            session('low',$priceArr[0]);
            session('high',$priceArr[1]);
        }

        if(session('high')){
            $where['g.saleprice']=array('between',array(session('low'),session('high')));
        }
        $order='g.addtime desc';
        if(I('get.sale1')){
            session('moren',null);
            session('sale1','g.salenum');
        }
        if(session('sale1')){
            $order=session('sale1');
        }
//
        if(I('get.collect1')){
            session('moren',null);
            session('collect1','g.collectnum');
        }
        if(session('collect1')){
            $order=session('collect1').' '.'desc';
        }
//

        if(I('get.price2')){
            session('moren',null);
            session('price2','g.saleprice');
        }
        $where['_string']='g.bid=a.bid and g.show=1 and a.astatus=1';
        $count = $activityInfo=M('activity')
            ->table('beauty_activity a,beauty_goods g')
            ->where($where)
            ->count();// 查询满足要求的总记录数
        $limitRows = 3; // 设置每页记录数
        $p = new AjaxPage($count, $limitRows,"index"); //第三个参数是你需要调用换页的ajax函数名
        $show       = $p->show();
        $limit_value = $p->firstRow . "," . $p->listRows;
        $activityInfo=M('activity')
            ->field('a.aname,g.saleprice,a.rules, g.id,a.bid,
            g.goodsname,g.imageurl,g.imagename,a.starttime,a.stoptime')
            ->table('beauty_activity a,beauty_goods g')
            ->where($where)
            ->order($order)
            ->limit($limit_value)
            ->select();
        foreach($activityInfo as $k=>$v){
            $activityInfo[$k]['restTime']=$v['stoptime']-time();
        }
        $this->assign('empty','<h3 style="text-align: center;color: #a9a9a9">没有符合的数据</h3>');
        $this->assign('activityInfo', $activityInfo);
        $this->assign('page', $show);
        $this->assign('firstRow',$p->firstRow);
        if(IS_AJAX){
            $this->display('result');
        }else{
            $this->display('temai');
        }

    }



    //品牌商品
    public function brandList(){
        $this->cate();
        $this->brand();
        if(I('get.bid')||I('get.moren')){
            session('bid',I('get.bid'));
            session('moren','moren');
            session('sale',null);
            session('price1',null);
            session('price3',null);
            session('low',null);
            session('high',null);
            session('cid',null);
        }
        $where['bid']=session('bid');
        $where['show']=1;
        if(I('get.cid')){
            session('moren',null);
            session('cid',I('get.cid'));
        }
        if(session('cid')){
            $where['cid']=session('cid');
        }

        if(I('get.price3')){
            session('moren',null);
            $priceArr=explode('-',I('get.price3'));
            session('low',$priceArr[0]);
            session('high',$priceArr[1]);
        }

        if(session('high')){
            $where['saleprice']=array('between',array(session('low'),session('high')));
        }

        if(I('get.sale')){
            session('moren',null);
            session('sale',I('get.sale'));
        }
        if(session('sale')){
            $order=session('sale').' '.'desc';
        }

        if(I('get.price1')){
            session('moren',null);
            session('price1',I('get.price1'));
        }
        if(session('price1')){
            $order=session('price1');
        }
        $count = M('goods')->where($where)->count();
        $limitRows = 5; // 设置每页记录数
        $p = new AjaxPage($count, $limitRows,"index"); //第三个参数是你需要调用换页的ajax函数名
        $show       = $p->show();
        $limit_value = $p->firstRow . "," . $p->listRows;
        $goodsList=M('goods')
            ->where($where)
            ->order($order)
            ->limit($limit_value)
            ->select();
        $this->assign('firstRow',$p->firstRow);
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('empty','<h3 style="text-align: center;color: #a9a9a9">没有符合的数据</h3>');
        $this->assign('goodsList',$goodsList);

        if(IS_AJAX){
            $this->display('brandResult');
        }else{
            $this->display('brandList');
        }
    }

    public function collectGoods(){
        if (session('mid')) {
            $gid = I('gid');
            $where['gid'] = $gid;
            $where['mid'] = session('mid');
            $collectInfo = M('collect')->where($where)->find();
            if (!$collectInfo) {
                $where1['id'] = I('gid');
                $goods = M('goods')->where($where1)->find();
                $date['gid'] = $goods['id'];
                $date['mid'] = session('mid');
                $date['goodsname'] = $goods['goodsname'];
                $date['imageurl'] = $goods['imageurl'];
                $date['imagename'] = $goods['imagename'];
                $date['saleprice'] = $goods['saleprice'];
                M('collect')->add($date);
                M('Goods')->where($where1)->setInc('collectnum', 1);
                $this->success('您已成功收藏该商品');
                $this->success($goods);

            } else {
                $this->error('该商品已经在收藏夹里哦');
            }
        } else {
            $bid=M('goods')->where(array('id'=>I('gid')))->find();
            $a=U('GoodsList/brandList',array('bid'=>$bid['bid']));
            session('collectUrl1',$a);
            $this->error('请先登录');
        }
    }

    public function girl(){
        $this->cate();
        $this->brand();
        $order='saleprice';
        if(I('get.gilr')||I('get.moren')){
            session('moren','moren');
            session('sale',null);
            session('collect',null);
            session('price1',null);
            session('price3',null);
            session('bid',null);
            session('cid',null);
            session('low',null);
            session('high',null);
        }
        $where['goodsname']=array('like',"%女%");
        if(I('get.bid')){
            session('moren',null);
            session('bid',I('get.bid'));
        }
        if(session('bid')){
            $where['bid']=session('bid');
        }
        if(I('get.cid')){
            session('moren',null);
            session('cid',I('get.cid'));
        }
        if(session('cid')){
            $where['cid']=session('cid');
        }
        if(I('get.price3')){
            session('moren',null);
            $priceArr=explode('-',I('get.price3'));
            session('low',$priceArr[0]);
            session('high',$priceArr[1]);
        }

        if(session('high')){
            $where['saleprice']=array('between',array(session('low'),session('high')));
        }

        if(I('get.sale')){
            session('moren',null);
            session('sale','salenum');
        }
        if(session('sale')){
            $order=session('sale');
        }

        if(I('get.collect')){
            session('moren',null);
            session('collect','collectnum');
        }
        if(session('collect')){
            $order=session('collect').' '.'desc';
        }


        if(I('get.price1')){
            session('moren',null);
            session('price1','saleprice');
        }
        if(session('price1')){
            $order=session('price1').' '.'desc';
        }
        $goodsList=M('goods')
            ->where($where)
            ->order($order)
            ->select();
        $this->assign('goodsList',$goodsList);
        $this->assign('empty','<h3 style="text-align: center;color: #a9a9a9">没有符合的数据</h3>');
        $this->display('girl');
    }
    public function boy(){
        $this->cate();
        $this->brand();
        $order='saleprice';
        if(I('get.boy')||I('get.moren')){
            session('moren','moren');
            session('sale',null);
            session('collect',null);
            session('price1',null);
            session('price3',null);
            session('low',null);
            session('high',null);
            session('bid',null);
            session('cid',null);
        }
        $where['goodsname']=array('like',"%男%");
        if(I('get.bid')){
            session('moren',null);
            session('bid',I('get.bid'));
        }
        if(session('bid')){
            $where['bid']=session('bid');
        }
        if(I('get.cid')){
            session('moren',null);
            session('cid',I('get.cid'));
        }
        if(session('cid')){
            $where['cid']=session('cid');
        }

        if(I('get.price3')){
            session('moren',null);
            $priceArr=explode('-',I('get.price3'));
            session('low',$priceArr[0]);
            session('high',$priceArr[1]);
        }

        if(session('high')){
            $where['saleprice']=array('between',array(session('low'),session('high')));
        }

        if(I('get.sale')){
            session('moren',null);
            session('sale','salenum');
        }
        if(session('sale')){
            $order=session('sale');
        }

        if(I('get.collect')){
            session('moren',null);
            session('collect','collectnum');
        }
        if(session('collect')){
            $order=session('collect').' '.'desc';
        }


        if(I('get.price1')){
            session('moren',null);
            session('price1','saleprice');
        }
        if(session('price1')){
            $order=session('price1').' '.'desc';
        }

        $goodsList=M('goods')
            ->where($where)
            ->order($order)
            ->select();
        $this->assign('goodsList',$goodsList);
        $this->assign('empty','<h3 style="text-align: center;color: #a9a9a9">没有符合的数据</h3>');
        $this->display('boy');
    }
}
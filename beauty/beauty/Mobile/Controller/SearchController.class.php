<?php
namespace Mobile\Controller;
use Think\Controller;
use Think\Page;
use Org\Beauty\AjaxPage;
class SearchController extends Controller{
    /*按关键字搜索*/
    public function index()
    {
        $keywordsInfo = D('Keywords')->keywords();
        $this->assign('list', $keywordsInfo);
        $this->display('search');
    }

    public function search()
    {
        $keywords = I('keywords');
        $date['keywords'] = $keywords;
        $date['addtime'] = time();
        if (session('mid')) {
            $date['mid'] = session('mid');
            $where['mid'] = session('mid');
            $where['keywords'] = I('keywords');
            if (!M('keywords')->where($where)->find()) {
                M('keywords')->add($date);
            };
        }

        if (I('get.keywords')) {
            session('sale', null);
            session('price', null);
        }
        //表单
        session('keywords', I('get.keywords'));
        $where['goodsname'] = array('like', "%" . session('keywords') . '%');

        if (I('get.sale')) {
            session('sale', I('get.sale'));
        }
        if (session('sale')) {
            $order = session('sale') . ' ' . 'desc';
        }
        if (I('get.price')) {
            session('price', I('get.price'));
        }
        if (session('price')) {
            $order = session('price');
        }

        $count = M('goods')->where($where)->count();// 查询满足要求的总记录数
        $limitRows = 3; // 设置每页记录数
        $p = new AjaxPage($count, $limitRows,"index"); //第三个参数是你需要调用换页的ajax函数名
        $show       = $p->show();
        $limit_value = $p->firstRow . "," . $p->listRows;
        $goodsInfo = M('goods')
            ->where($where)
            ->order($order)
            ->limit($limit_value)
            ->select();
        foreach ($goodsInfo as $k => $v) {
            $goodsInfo[$k]['rules'] = M('activity')
                ->where(array('bid' => $v['bid'], 'astatus' => 1))
                ->select();
        }
        $this->assign('firstRow',$p->firstRow);
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('keywords', I('keywords'));
        $this->assign('list', $goodsInfo);
        $this->assign('empty', '<h2 style="text-align: center;color: #a9a9a9">没有相关的数据哦</h2>');
        if(IS_AJAX){
            $this->display('result');
        }else{
            $this->display('list');
        }
    }

    public function deleteKeywords(){
            $mid = session('mid');
        if(M('keywords')->where(array('mid'=>$mid))->find()){
            $info=M('keywords')->where(array('mid'=>$mid))->delete();
            if($info){
                $this->success();
            }else{
                $this->error(1);
            }
        }else{
            $this->error(2);
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
            $cid=M('goods')->where(array('id'=>I('gid')))->find();
            $a=U('Search/smilarGoods',array('cid'=>$cid['cid']));
            session('collectUrl',$a);
            $this->error('请先登录');
        }
    }


    public function smilarGoods(){

        if (I('cid')) {
            session('sale', null);
            session('price', null);
        }
        session('cid', I('get.cid'));
        $where['cid']=session('cid');
        $where['show']=1;
        //表单
        if (I('get.sale')) {
            session('sale', I('get.sale'));
            session('price', null);
        }
        if (session('sale')) {
            $order = session('sale') . ' ' . 'desc';
        }
        if (I('get.price')) {
            session('price', I('get.price'));
            session('sale', null);
        }
        if (session('price')) {
            $order = session('price');
        }

        $count = M('goods')->where($where)->count();
        $limitRows = 3; // 设置每页记录数
        $p = new AjaxPage($count, $limitRows,"index"); //第三个参数是你需要调用换页的ajax函数名
        $show       = $p->show();
        $limit_value = $p->firstRow . "," . $p->listRows;
        $goodsInfo = M('goods')
            ->where($where)
            ->order($order)
            ->limit($limit_value)
            ->select();
        foreach ($goodsInfo as $k => $v) {
            $goodsInfo[$k]['rules'] = M('activity')->where(array('bid' => $v['bid'], 'astatus' => 1))->select();
        }
        $this->assign('firstRow',$p->firstRow);
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('list', $goodsInfo);
        $this->assign('keywords', I('keywords'));
//        print_r($goodsInfo);
        if(IS_AJAX){
            $this->display('result1');
        }else{
            $this->display('smilar1');
        }
    }
}


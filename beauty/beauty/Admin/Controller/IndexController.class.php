<?php
namespace Admin\Controller;
use Admin\Common\Controller\BgController;
class IndexController extends BgController {
    public function index(){
        $this->display('index');
    }
    public function main(){
        $aid=session('aid');
        if($aid){
            $admin=M('Admin');
            $userInfo=$admin->where(array('id'=>$aid))->field('username,lastlogin,lastip')->select();
            $goodsList1=M('Goods')->order('salenum desc')->limit(5)->select();
            $goodsList2=M('Goods')->order('num')->limit(5)->select();
            $this->assign('userInfo',$userInfo);
            $this->assign('goodsList1',$goodsList1);
            $this->assign('goodsList2',$goodsList2);
            $this->display('main');
        }

    }
    public function footer(){
        $this->display('public/footer');
    }
    public function top(){
            $username = session('username');
            $aid = session('aid');
            $mail = M('MessageAdmin')->where(array('receiveId' => $aid, 'status' => 1))->count();
            $this->assign('username', $username);
            $this->assign('mail', $mail);
            $this->display('public/top');
    }
    public function left(){
        //获取左侧栏菜单
        $nav=D('AdminNav');
        $navList=$nav->getNavTree();
        $this->assign('navList',$navList);
        $this->display('public/left');
    }

    public function getGoodsTop($num=10){
        if(IS_AJAX){
            $goods=D('Goods');
            $list=$goods->getGoodsTop($num);
            $goodsList=array();
            //饼状图;
            foreach($list as $k=>$v){
                $goodsList['x'][$k]=mb_substr($v['goodsname'],0,12,'utf-8');
                $goodsList['y'][$k]['value']=$v['salenum'];
                $goodsList['y'][$k]['name']=mb_substr($v['goodsname'],0,12,'utf-8');
            }

            /*//柱状图;
            foreach($list as $k=>$v){
                $goodsList['x'][$k]=mb_substr($v['goodsname'],0,10,'utf-8');
                $goodsList['y'][$k]=$v['salenum'];
            }*/
        }
        $this->success($goodsList);
    }
}
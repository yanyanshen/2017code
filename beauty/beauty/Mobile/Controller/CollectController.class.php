<?php
namespace Mobile\Controller;
use Think\Controller;
class CollectController extends Controller {
    public function index(){
        $this->collect();
        $this->display('member_collect_goods');
    }

//    public function collectEmpty(){
//        $this->display('member_collect_empty');
//    }

    public function collect(){
        $collectObj=M('collect');//实例化对象
        $list=$collectObj->where(array('mid'=>session('mid')))->select();
        $this->assign('list',$list);
        $this->assign('empty','<h3 style="text-align: center;color: orangered">您的收藏夹为空，快来添些宝贝吧！！！</h3>');
    }
    /*删除收藏商品*/
    public function deletecollect(){
        $where['mid']=session('mid');
        $where['gid']=I('gid');
        M('collect')->where($where)->delete();
        $this->success();
    }
//删除所有收藏商品
    public function deleteAll(){
        $where['mid']=session('mid');
        if(M('collect')->where($where)->delete()){
            $this->success();
        };

    }
    public function collectGoods(){
        if(session('mid')){
            $gid=I('gid');
            $where['gid']=$gid;
            $where['mid']=session('mid');
            $collectInfo=M('collect')->where($where)->find();
            if(!$collectInfo){
                $where1['id']=I('gid');
                $goods=M('goods')->where($where1)->find();
                $date['gid']=$goods['id'];
                $date['mid']=session('mid');
                $date['goodsname']=$goods['goodsname'];
                $date['imageurl']=$goods['imageurl'];
                $date['imagename']=$goods['imagename'];
                $date['saleprice']=$goods['saleprice'];
                M('collect')->add($date);
                M('Goods')->where($where1)->setInc('collectnum',1);
                $this->success('您已成功收藏该商品');
                $this->success($goods);

            }else{
                $this->error('该商品已经在收藏夹里哦');
            }
        }else{
            if(I('get.jian')&&I('get.man')){
                $a=U('BuyBrands/goodsdetail',array('gid'=>I('get.gid'),'man'=>I('get.man'),'jian'=>I('get.jian')));
            }else{
                $a=U('Order/goodsdetail',array('gid'=>I('get.gid')));
            }
            session('url1',$a);
            $this->error('请先登录','Login');
        }
    }
}
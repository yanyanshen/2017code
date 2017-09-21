<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
class CollectController extends Controller
{
    /*链接用户中心的index方法*/
    public function index()
    {
        $collectObj=M('collect');//实例化对象
        $count=$collectObj->count();
        $Page=new Page($count,1);
        $show=$Page->show();//分页显示
        $list=$collectObj->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);
        $this->assign('firstRow',$Page->firstRow);
        $this->assign('page',$show);
        $this->assign('count',$count);

        //print_r($list);
        $this->display('Product');
    }
    /*用异步做我的收藏*/
    public function collect()
    {
        if(session('mid')){
            $where['mid']=session('mid');
            $collectObj=M('collect');//实例化对象
            $list=$collectObj->where($where)->limit(0,4)->select();
            $count=$collectObj->where($where)->count();
            $this->assign('count',$count);
            if($list){
                $this->success($list);
            }else{
                $this->success(1);
            }
        }else{
            $this->error();
        }
    }

    /*删除用异步做的收藏*/
    public function deleteCollect()
    {
        $where['gid']=I('get.gid');
        $where['mid']=session('mid');
        M('collect')->where($where)->delete();
        $this->success();
    }


    /*点击收藏添加到收藏夹里*/
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
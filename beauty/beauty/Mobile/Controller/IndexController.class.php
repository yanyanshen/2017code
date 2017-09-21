<?php
namespace Mobile\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $one=$this->getGoodsCateBycId(1);
        $two=$this->getGoodsCateBycId(22);
        $three=$this->getGoodsCateBycId(33);
        $five=$this->getGoodsCateBycId(53);
        $six=$this->getGoodsCateBycId(83);
        $senven=$this->getGoodsCateBycId(87);
        $this->assign('one',$one);
        $this->assign('two',$two);
        $this->assign('three',$three);
        $this->assign('five',$five);
        $this->assign('six',$six);
        $this->assign('senven',$senven);
        $this->activityShow();
        $this->like();
        $this->advertise();
        $this->brand();
        $this->boy();
        $this->girl();
        $this->message();

        $this->display('index');
    }


    public function getGoodsCateBycId($cid){
        $where1['id']=$cid;
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
        $where3['cid']=array('in',"{$idStr}");
        $goods=M('goods')->query("SELECT g.id as gid,g.goodsname,g.imageurl,g.imagename,g.salenum,g.saleprice,g.cid from beauty_goods g where
        g.cid in ($idStr) and g.show=1
        and g.bid not in (select bid from beauty_activity where astatus=1) ORDER by g.addtime desc limit 0,1");
        $goods[0]['cname']=$idArr[0]['cname'];
        return $goods;
    }

    public function activityShow(){
        /*活动模块 沈艳艳*/
        $activityInfo=M('activity')->query('SELECT a.rules,a.aname, g.id,a.bid,g.goodsname,g.imageurl,g.imagename,a.starttime,a.stoptime
               FROM beauty_activity a,beauty_brands b,beauty_goods g
                where a.bid=b.id and b.id=g.bid and g.show=1 and a.astatus=1 and b.status=1 and a.aname="限时特卖"
                ORDER BY a.addtime desc, g.salenum desc,g.addtime desc limit 0,2');


        foreach($activityInfo as $k=>$v){
            $activityInfo[$k]['restTime']=$v['stoptime']-time();
        }

        $this->assign('empty','<h2 style="text-align: center">活动已结束</h2>');
        $this->assign('activityInfo', $activityInfo);
//        print_r($activityInfo);
    }

    //品牌优惠
    public function brand(){
        $brand=M('brands');
        $brandGoods=$brand->field('bname,blogopath,blogoname,id')->where(array('status'=>1))->select();
        $this->assign('brandGoods',$brandGoods);
    }
    //猜你喜欢
    public function like(){
        $User=M('goods');
        $list=$User->field('goodsname,saleprice,imageurl,imagename,id')->limit(0,8)->select();
        $this->assign('goodsInfo',$list);
//        print_r($list);
    }
   /* public function more(){
        if(!empty($_POST['p'])){  //点击加载更多
            $p = $_POST['p'];//3 6 9
            $b= 3; //显示条数
            $Model = new \Think\Model();
            $list  = $Model->query("SELECT * FROM `footprint`  LIMIT $p,$b");
            $this->ajaxReturn($list,'JSON');
        }
        $count = M("footprint")->count();
        $Page  = new \Think\Page($count, 3);
        $show  = $Page->show();
        $Model = new \Think\Model();
        //显示三条
        $list  = $Model->query("SELECT * FROM `beauty_footprint` LIMIT " . $Page->firstRow . ',' . $Page->listRows);
        $this->assign('list', $list);
    }*/




    public function girl(){
        $where['_string']='goodsname like "%女%"';
        $girl =  M('goods')->field('imageurl,imagename')
                ->where($where)->limit(0,2)->select();
        $this->assign('girl',$girl);
    }
    public function boy(){
        $where['_string']='goodsname like "%男%"';
        $boy=  M('goods')->field('imageurl,imagename')
            ->where($where)->order('addtime desc')->limit(0,2)->select();
        $this->assign('boy',$boy);
    }

//    轮播广告
    public function advertise(){

        $User=M('advertise');
        $advertise1=$User->where(array('status'=>1,'position'=>5))->limit(0,1)->select();
        $advertise2=$User->where(array('status'=>1,'position'=>5))->limit(2,1)->select();
        $advertise3=$User->where(array('status'=>1,'position'=>5))->limit(4,1)->select();
        $this->assign('advertise1',$advertise1);
        $this->assign('advertise2',$advertise2);
        $this->assign('advertise3',$advertise3);
    }

    //站内信;
    public function message(){
        $message=M('MessageUser');
        $mid=session('mid');
        $list=$message->table('beauty_message_user u,beauty_messagetext t')
            ->where(array('u.receiveId'=>$mid))->where('u.textId=t.id and u.status=1')
            ->field('u.sendId,t.title,t.content')->order('u.id desc')->select();
        $this->assign('list',$list);
    }
}
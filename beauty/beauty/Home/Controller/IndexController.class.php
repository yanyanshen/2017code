<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller
{
    public function index(){
        $categoryInfo = M('category')->where('pid=0')->select();
        foreach ($categoryInfo as $k1 => $v1) {
            $where1['pid'] = $v1['id'];
            $categoryInfo[$k1]['child'] = M('category')->field('id,cname')->where($where1)->select();
            foreach ($categoryInfo[$k1]['child'] as $k2 => $v2) {
                $where2['pid'] = $v2['id'];
                $categoryInfo[$k1]['child'][$k2]['child'] = M('category')->field('id,cname')->where($where2)->select();
            }
        }
        $this->assign('categoryInfo', $categoryInfo);
        $goods = M('goods')->where(array('show' => 1))->limit(0, 6)->select();
        $this->assign('goods',$goods);
        /*分类展示宋豪*/
        $this->showgoods();
        $one=$this->getGoodsCateBycId(1);
        $two=$this->getGoodsCateBycId(87);
        $three=$this->getGoodsCateBycId(33);

        $this->assign('one',$one);
        $this->assign('two',$two);
        $this->assign('three',$three);
         $this->cailike();

//        print_r($two);

        /*白文飞品牌展示*/
        $this->showlogo();
        $this->showlogo1();
        $this->showlogo2();

        /*当时间过期时自动更新红包状态*/
        $packet=M('Packet');
        $info=$packet->field('id,expirationtime,status')->select();
        foreach($info as $v5){
            if($v5['expirationtime']<time()){
                if($v5['status']==1){
                    $date['status']=0;
                    $packet->where(array('id'=>$v5['id']))->save($date);
                }
            }
        }

        /*活动模块 沈艳艳*/
        /*当时间过期时自动更新状态*/
        $activityObj=D('activity');
        $stoptime=$activityObj->field('stoptime')->select();
        foreach($stoptime as $v){
            if($v['stoptime']<time()){
                $date['astatus']=0;
                $where1['stoptime']=$v['stoptime'];$activityObj->where($where1)->save($date);
                $activityObj->where($where1)->save($date);
            }else{
                $date['astatus']=1;
                $where2['stoptime']=$v['stoptime'];
                D('activity')->where($where2)->save($date);
            }
        }
        $this->activityShow();
        /*广告模块*/
        $this->showAdvertises();

        $footer=$this->footer();
        $this->assign('footer',$footer);
        $this->display();

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

//
        $goods=M('goods')->query("SELECT  g.id as gid,g.goodsname,g.imageurl,g.imagename,g.salenum,g.saleprice from beauty_goods g where
        g.cid in ($idStr) and g.show=1 and g.ismember=0
        and g.bid not in (select bid from beauty_activity where astatus=1) ORDER by g.addtime desc limit 0,6");
        foreach($idArr as $v){
            $goods[]['cname']=$v;
        }
        return $goods;
    }


/*分类展示宋豪*/
    public function showgoods(){
        $where['pid'] = 0;
        $where['show'] = 1;
        $categoryInfo = M('category')->where($where)->select();
        foreach ($categoryInfo as $k1 => $v1) {
            $where1['pid'] = $v1['id'];
            $where1['show'] = 1;
            $categoryInfo[$k1]['child'] = M('category')->field('id,cname')->where($where1)->select();
            foreach ($categoryInfo[$k1]['child'] as $k2 => $v2) {
                $where2['pid'] = $v2['id'];
                $where2['show'] = 1;
                $categoryInfo[$k1]['child'][$k2]['child'] = M('category')->field('id,cname')->where($where2)->select();
            }
        }
        //print_r($categoryInfo);
        $this->assign('categoryInfo', $categoryInfo);
    }
/*分类展示结束宋豪*/


    public function activityShow(){
        /*活动模块 沈艳艳*/
        $activityInfo=M('activity')->query('SELECT a.rules,a.aname, g.id,a.bid,g.goodsname,g.imageurl,g.imagename,a.starttime,a.stoptime
               FROM beauty_activity a,beauty_brands b,beauty_goods g
                where a.bid=b.id and b.id=g.bid and g.show=1 and a.astatus=1 and b.status=1 and a.aname="限时特卖"
                ORDER BY a.addtime desc, g.salenum desc,g.addtime desc limit 0,8');

        foreach($activityInfo as $k=>$v){
            $activityInfo[$k]['restTime']=$v['stoptime']-time();
            preg_match_all('/\d+\d/',$v['rules'],$activityInfo[$k]['rules']);
        }
        $this->assign('activityInfo', $activityInfo);
    }


    public function showlogo(){
            $brand=M('brands');
            $logoInfo=$brand->where(array('brandtype'=>1,'status'=>1))->limit(10)->select();
            $this->assign('logoInfo',$logoInfo);
            //print_r($logoInfo);
    }

    public function showlogo1(){
        $brand=M('brands');
        $logoInfo1=$brand->where(array('brandtype'=>2,'status'=>1))->limit(5)->select();
        $this->assign('logoInfo1',$logoInfo1);
        //print_r($logoInfo);
    }

    public function showlogo2(){
        $brand=M('brands');
        $logoInfo2=$brand->where(array('brandtype'=>3,'status'=>1))->limit(5)->select();
        $this->assign('logoInfo2',$logoInfo2);
        //print_r($logoInfo);
    }

    //广告模块展示;
    public function showAdvertises(){
        $advertises=M('Advertise');
        $advertise1=$advertises->where(array('status'=>1,'position'=>1))->order('id desc')->limit(5)->select();
        $advertise2=$advertises->where(array('status'=>1,'position'=>2))->order('id desc')->limit(2)->select();
        $advertise3=$advertises->where(array('status'=>1,'position'=>3))->order('id desc')->limit(2)->select();
        $advertise4=$advertises->where(array('status'=>1,'position'=>4))->order('id desc')->limit(2)->select();
        $advertise5=$advertises->where(array('status'=>1,'position'=>5))->order('id desc')->select();

        $this->assign('advertise1',$advertise1);
        $this->assign('advertise2',$advertise2);
        $this->assign('advertise3',$advertise3);
        $this->assign('advertise4',$advertise4);
        $this->assign('advertise5',$advertise5);
    }


    public function cailike(){
        /*推荐,猜你喜欢*/
        $where['g.ismember']=0;
        $where['g.show']=1;
        $goodsLike = M('footprint')
            ->table('beauty_footprint f,beauty_goods g')
            ->field('g.salenum,f.goodsname,f.gid,f.imageurl,f.imagename,f.saleprice')
            ->where('f.gid=g.id')
            ->where($where)
            ->order('f.addtime desc')
            ->select();
        $this->assign('goodsLike', $goodsLike);
    }

    public function goodsImg(){
        $cid=I('get.cid');
        $where['cid']=$cid;
        $goodsImg=M('goods')->query("SELECT g.imageurl,g.imagename,g.id FROM beauty_goods g
            where g.bid not in (select bid from beauty_activity where astatus=1)
                    and g.cid=$cid and g.show=1 and g.ismember=0 ORDER  by addtime desc limit 0,3 ");
        $this->success($goodsImg);
    }

    public function footer(){
        $where['pid'] = 0;
        $where['show'] = 1;
        $fnameInfo = M('Foote')->where($where)->select();
        foreach ($fnameInfo as $k1 => $v1) {
            $where1['pid'] = $v1['id'];
            $where1['show'] = 1;
            $fnameInfo[$k1]['child'] = M('Foote')->field('id,fname')->where($where1)->select();
        }
        return $fnameInfo;
    }

  public function news(){
      $id=I('get.id');
      $newinfo=M('Foote')->field('newtitle,newcontent')->where(array('id'=>$id))->select();
      $this->assign('newinfo',$newinfo);
      $this->display('footernew');
  }

}






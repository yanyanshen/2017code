<?php
namespace Admin\Controller;
use Admin\Common\Controller\BgController;
use Think\Page;
class CommentController extends BgController{
    public function index(){
        $comment=M('Comment');//实例化comment对象
        $where['c.cstatus']=array('in','5,6');
        $count =$comment->table(array('beauty_comment'=>'c','beauty_order_status'=>'os','beauty_goods'=>'g','beauty_user'=>'u'))
            ->field('g.goodsname,c.oid,os.statusname,c.coaddtime,u.username,c.respid,c.mid,c.gid,c.cosid')
            ->where('c.cstatus=os.id and c.mid=u.id and c.gid=g.id')->where($where)->count();// 查询满足要求的总记录数
        $Page = new Page($count,8);// 实例化分页类 传入总记录数和每页显示的记录数(1)
        $show = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $commentList=$comment->table(array('beauty_comment'=>'c','beauty_order_status'=>'os','beauty_goods'=>'g','beauty_user'=>'u'))
            ->field('g.goodsname,c.oid,os.statusname,c.coaddtime,u.username,c.respid,c.mid,c.gid,c.cosid')
            ->where('c.cstatus=os.id and c.mid=u.id and c.gid=g.id')
            ->limit($Page->firstRow.','.$Page->listRows)->order(array('coaddtime'=>'desc'))->where($where)->select();//查询符合条件的评论列表
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('firstRow',$Page->firstRow);
        $this->assign('count',$count);
        $this->assign('commentList',$commentList);//显示评论列表
        $this->assign('current',ceil(($Page->firstRow+1)/2));//显示当前页
        $this->display('list');//展示模板
    }

    public function yiresponse(){
        $comment=M('Comment');//实例化comment对象
        $where['c.cstatus']=array('in','5,6');
        $where['c.respid']=2;
        $count =$comment->table(array('beauty_comment'=>'c','beauty_order_status'=>'os','beauty_goods'=>'g','beauty_user'=>'u'))
            ->field('g.goodsname,c.oid,os.statusname,c.coaddtime,u.username,c.respid,c.mid,c.gid,c.cosid')
            ->where('c.cstatus=os.id and c.mid=u.id and c.gid=g.id')->where($where)->count();// 查询满足要求的总记录数
        $Page = new Page($count,8);// 实例化分页类 传入总记录数和每页显示的记录数(1)
        $show = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $commentList=$comment->table(array('beauty_comment'=>'c','beauty_order_status'=>'os','beauty_goods'=>'g','beauty_user'=>'u'))
            ->field('g.goodsname,c.oid,os.statusname,c.coaddtime,u.username,c.respid,c.mid,c.gid,c.cosid')
            ->where('c.cstatus=os.id and c.mid=u.id and c.gid=g.id')
            ->limit($Page->firstRow.','.$Page->listRows)->order(array('coaddtime'=>'desc'))->where($where)->select();//查询符合条件的评论列表
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('firstRow',$Page->firstRow);
        $this->assign('count',$count);
        $this->assign('commentList',$commentList);//显示评论列表
        $this->assign('current',ceil(($Page->firstRow+1)/2));//显示当前页
        $this->assign('empty','<h1 style="font-size: 20px;">没有找到相应的数据</h1>');
        $this->display('yiresponse');//展示模板
    }

    public function weiresponse(){
        $comment=M('Comment');//实例化comment对象
        $where['c.cstatus']=array('in','5,6');
        $where['c.respid']=1;
        $count =$comment->table(array('beauty_comment'=>'c','beauty_order_status'=>'os','beauty_goods'=>'g','beauty_user'=>'u'))
            ->field('g.goodsname,c.oid,os.statusname,c.coaddtime,u.username,c.respid,c.mid,c.gid,c.cosid')
            ->where('c.cstatus=os.id and c.mid=u.id and c.gid=g.id')->where($where)->count();// 查询满足要求的总记录数
        $Page = new Page($count,8);// 实例化分页类 传入总记录数和每页显示的记录数(1)
        $show = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $commentList=$comment->table(array('beauty_comment'=>'c','beauty_order_status'=>'os','beauty_goods'=>'g','beauty_user'=>'u'))
            ->field('g.goodsname,c.oid,os.statusname,c.coaddtime,u.username,c.respid,c.mid,c.gid,c.cosid')
            ->where('c.cstatus=os.id and c.mid=u.id and c.gid=g.id')
            ->limit($Page->firstRow.','.$Page->listRows)->order(array('coaddtime'=>'desc'))->where($where)->select();//查询符合条件的评论列表
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('firstRow',$Page->firstRow);
        $this->assign('empty','<h1 style="font-size: 20px;">没有找到相应的数据</h1>');
        $this->assign('count',$count);
        $this->assign('commentList',$commentList);//显示评论列表
        $this->assign('current',ceil(($Page->firstRow+1)/2));//显示当前页
        $this->display('weiresponse');//展示模板
    }

    public function search(){
        $comment=M('Comment');
        if(IS_GET){
            if(I('get.time1')&& !I('get.time2')){
                $time1=strtotime(I('get.time1'));
                $where['coaddtime']=array('gt',$time1);
                $this->assign('time1',date('Y-m-d',$time1));
            }elseif(I('get.time2') && !I('get.time1')){
                $time2=strtotime(I('get.time2'));
                $where['coaddtime']=array('lt',$time2);
                $this->assign('time2',date('Y-m-d',$time2));
            }else if(I('get.time2') && I('get.time1')){
                $time1=strtotime(I('get.time1'));
                $time2=strtotime(I('get.time2'));
                $where['coaddtime']=array('between',array($time1,$time2));
            }
            if(I('get.status')){
                $where['respid']=I('get.status');
                if(I('get.status')==1){
                    $statusname='未回复';
                    $this->assign('respid1',$statusname);
                }if(I('get.status')==1){
                    $statusname='已回复';
                    $this->assign('respid2',$statusname);
                }
            }else{
                $where['respid']=array('in','1,2');
                $statusname='全部';
                $this->assign('respid3',$statusname);
            }
            $where['_string']="c.cstatus=os.id and c.mid=u.id and c.gid=g.id";
            $where['c.cstatus']=array('in','5,6');
        }
      // 查询满足要求的总记录数
        $count=$comment->table(array('beauty_comment'=>'c','beauty_order_status'=>'os','beauty_goods'=>'g','beauty_user'=>'u'))
            ->field('g.goodsname,c.oid,os.statusname,c.coaddtime,u.username,c.respid,c.mid,c.gid')
            ->where($where)->count();
        $Page = new Page($count,8);// 实例化分页类 传入总记录数和每页显示的记录数(1)
        $show = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $commentList=$comment->table(array('beauty_comment'=>'c','beauty_order_status'=>'os','beauty_goods'=>'g','beauty_user'=>'u'))
            ->field('g.goodsname,c.oid,os.statusname,c.coaddtime,u.username,c.respid,c.mid,c.gid')
            ->limit($Page->firstRow.','.$Page->listRows)->order(array('coaddtime'=>'desc'))->where($where)->select();//查询符合条件的评论列表
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('firstRow',$Page->firstRow);
        $this->assign('count',$count);
        $this->assign('empty','<h1 style="font-size: 20px;">没有找到相应的数据</h1>');
        $this->assign('commentList',$commentList);//显示评论列表
        $this->assign('current',ceil(($Page->firstRow+1)/2));//显示当前页
        //print_r($commentList);
        $this->display('list');//展示模板
    }


    public function response(){
        $comment=M('comment');
       if(IS_GET){
           $oid=I('get.oid');
           $gid=I('get.gid');
           $mid=I('get.mid');
           $coaddtime=I('get.coaddtime');
           $where['c.oid']=$oid;
           $where['c.gid']=$gid;
           $where['c.mid']=$mid;
           $where['coaddtime']=$coaddtime;
           $where['_string']=" c.gid=g.id and c.cosid=cs.id and c.mid=u.id";
           //将需要更新的商品信息显示到回复页面
           $commentList=$comment->table('beauty_goods g,beauty_user u,beauty_comment c,beauty_comment_status cs')
               ->field('c.oid,c.gid,g.goodsname,g.imagename,g.imageurl,u.username,c.mid,c.content,cs.costatus,c.coaddtime')->where($where)->select();
       }
        //更新评论表里面的卖家回复
        if(IS_AJAX){
                $coaddtime=I('post.coaddtime');
                $oid=I('post.oid');
                $mid=I('post.mid');
                $gid=I('post.gid');
                $where1['oid']=$oid;
                $where1['mid']=$mid;
                $where1['gid']=$gid;
                $where1['coaddtime']=$coaddtime;
                $data['respid']=2;
                $data['response']=I('post.content');
                $data['readdtime']=time();
            if(I('post.content')){
                if($res=$comment->where($where1)->save($data)){
                    $this->success('回复成功');
                }
                $this->error($where1);
            }
           else{

           }
        }
        $this->assign('commentList',$commentList);
        $this->display('response');
    }

public function see(){
    $comment=M('comment');
    if(IS_GET){
        $oid=I('get.oid');
        $gid=I('get.gid');
        $mid=I('get.mid');
        $coaddtime=I('get.coaddtime');
        $where['c.oid']=$oid;
        $where['c.gid']=$gid;
        $where['c.mid']=$mid;
        $where['coaddtime']=$coaddtime;
        $where['_string']=" c.gid=g.id and c.cosid=cs.id and c.mid=u.id";
        //将需要更新的商品信息显示到回复页面
        $commentList=$comment->table('beauty_goods g,beauty_user u,beauty_comment c,beauty_comment_status cs')
            ->field('c.oid,c.gid,g.goodsname,g.imageurl,u.username,c.mid,c.content,cs.costatus,c.response,g.imageurl,g.imagename,c.coaddtime')->where($where)->select();
    }
    $this->assign('commentList',$commentList);
    $this->display('see');
}

    public function search1(){
        $comment=M('Comment');
        $respid=I('get.respid');
        if(I('get.time1')&& !I('get.time2')){
            $time1=strtotime(I('get.time1'));
            $where['c.coaddtime']=array('gt',$time1);
            $this->assign('time1',date('Y-m-d',$time1));
        }elseif(I('get.time2') && !I('get.time1')){
            $time2=strtotime(I('get.time2'));
            $where['c.coaddtime']=array('lt',$time2);
            $this->assign('time2',date('Y-m-d',$time2));
        }else if(I('get.time2') && I('get.time1')){
            $time1=strtotime(I('get.time1'));
            $time2=strtotime(I('get.time2'));
            $where['c.coaddtime']=array('between',array($time1,$time2));
        }
        if(I('get.cstatus')){
            $cosid=I('get.cstatus');
            $where['c.cosid']=I('get.cstatus');
            $this->assign('cosid',$cosid);
        }else{
            $where['c.cosid']=array('in','1,2,3');
            $this->assign('cosid',0);
        }
        $where['c.respid']=$respid;
        $where['c.cstatus']=array('in','5,6');
        $where['_string']="c.cstatus=os.id and c.mid=u.id and c.gid=g.id";
        $count=$comment->table(array('beauty_comment'=>'c','beauty_order_status'=>'os','beauty_goods'=>'g','beauty_user'=>'u'))
            ->field('g.goodsname,c.oid,os.statusname,c.coaddtime,u.username,c.respid,c.mid,c.gid,c.cosid')
            ->where($where)->count();// 查询满足要求的总记录数
        $Page = new Page($count,8);// 实例化分页类 传入总记录数和每页显示的记录数(1)
        $show = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $commentList=$comment->table(array('beauty_comment'=>'c','beauty_order_status'=>'os','beauty_goods'=>'g','beauty_user'=>'u'))
            ->field('g.goodsname,c.oid,os.statusname,c.coaddtime,u.username,c.respid,c.mid,c.gid,c.cosid')
            ->limit($Page->firstRow.','.$Page->listRows)->order(array('coaddtime'=>'desc'))->where($where)->select();//查询符合条件的评论列表
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('firstRow',$Page->firstRow);
        $this->assign('count',$count);
        $this->assign('empty','<h1 style="font-size: 20px;">没有找到相应的数据</h1>');
        $this->assign('commentList',$commentList);//显示评论列表
        $this->assign('current',ceil(($Page->firstRow+1)/2));//显示当前页
        if($respid==1){
            $this->display('weiresponse');//展示模板
        }else{
            $this->display('yiresponse');//展示模板
        }
    }

   public function duoresponse(){
        $cosid=I('get.cosid');
        $this->assign('cosid',$cosid);
        $this->display('duoresponse');
    }

    public function pilresponse(){
        $content=I('post.content');
        $data['response']=$content;
        $data['readdtime']=time();
        if(I('post.cosid')){
            $cosid=I('post.cosid');
        }else{
            $cosid=array('in','1,2,3');
        }
        if(M('Comment')->where(array('respid'=>1,'cosid'=>$cosid))->save($data)){
            $data1['respid']=2;
            if(M('Comment')->where(array('respid'=>1,'cosid'=>$cosid))->save($data1)){
                $this->success('回复成功');
            }
        }else{
            $this->error($cosid);
        }
    }

}
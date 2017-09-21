<?php
namespace Home\Model;
use Think\Model;
class CommentModel extends Model{
public function goods($where,$limit_value){
    $res=$this->field('c.content,c.cosid,c.coaddtime,c.response,c.id,u.username,u.imgpath,u.imgname,c.ml,c.readdtime,c.respid,cs.costatus,
  c.imageurl,c.imagename,c.picurl,c.picname,c.zuijia')
        ->table('beauty_comment c,beauty_user u,beauty_comment_status cs')
        ->where($where)
        ->where('c.mid=u.id and c.cosid=cs.id')
        ->limit($limit_value)
        ->order(array('c.coaddtime'=>'desc'))
        ->select();// 查询总评价

      return $res;
}

}
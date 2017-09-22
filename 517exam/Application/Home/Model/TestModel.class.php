<?php
namespace Home\Model;
use Think\Model;
/**
 * 读取excel的数据
 * @param  string $cid 分类的id
 * @param  string $count 从数据里取几道题
 * @param  string $type 题的类型  单选多选
 * @return $data       数组
 */
class TestModel extends Model{
        //随机抽取选择题数据
        public function getRandData($type,$cid,$count)
        {
            if($type==2){
                $where['_string'] = "c.id=t.category and t.type=$type and t.status=1 and c.status=1 and c.id=$cid";
                $res = M('test')
                    ->table('exam_testshort t,exam_test_category c')
                    ->field('t.id,t.type,t.status,c.cname,question,right_answer,ifImg')
                    ->where($where)
                    ->select();
                shuffle($res);
                $data=array_slice($res,0,$count);
            }else{
                $where['_string'] = "c.id=t.category and t.type=$type and t.status=1 and c.status=1 and c.id=$cid";
                $res = M('test')
                    ->table('exam_test t,exam_test_category c')
                    ->field('t.id,t.type,t.status,c.cname,question,A,B,C,D,right_answer,ifImg')
                    ->where($where)
                    ->select();
                shuffle($res);
                $data=array_slice($res,0,$count);
            }
            return $data;
        }
    }

<?php
namespace Admin\Model;
use Think\Model;
    class TestModel extends Model{
        //将数据添加到数据表里
        public function table_test_addData($data){
            foreach ($data as $k => $v) {
                    $addData ['question'] = $v [3];
                    $addData ['A'] = $v [4];
                    $addData ['B'] = $v [5];
                    $addData ['C'] = $v [6];
                    $addData ['D'] = $v [7];
                    $addData ['right_answer'] = $v [8];
                $res=M('test_category')->select();
                foreach($res as $val){
                    if($val['cname']==$v['2']){
                        $addData['category']=$val['id'];
                    }
                }

                    if($v [1]=='多选'){
                        $addData ['type'] = 1;
                        $addData ['score'] = 4;
                    }elseif($v [1]=='单选'){
                        $addData ['type'] = 0;
                        $addData ['score'] = 3;
                    }
                    $addData ['status'] = 1;
                    $addData ['ifImg'] = 0;
                    $addData ['create_time'] = time();
                    $res=$this->where(array('question'=>$v['3']))->find();
                    if(!$res){
                        $result = $this->add($addData);
                    }else{
                        $result = $this->where(array('id'=>$res['id']))->save($addData);
                    }
            }
            return $data;
        }

        //查询表
        public function findDate($where){
            $res=$this->where($where)->select();
            return $res;
        }

        public function selectlist($where){
            $res=$this->
            where($where)->select();
            return $res;
        }
    }

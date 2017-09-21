<?php
namespace Home\Controller;
use Think\Controller;
class HongBaoController extends Controller
{
    public function showhongbao(){
        $this->display('hongbao1');
    }

    public function addhongbao(){
        $mid = session('mid');
        $hongbao = I('get.hongbao');
        $reg = '/\d{1}/';
        preg_match_all($reg, $hongbao, $arr);
        foreach ($arr as $v) {
            $num = $v[0] . $v[1];
        }
        //判断数据表中是否存在该用户今天的拆红包的记录，存在的话就不让其再进行拆红包操作
        $nexttime = strtotime(date('Y-m-d', time())) + 86400;
        $info = M('Packet')->where(array('mid' => $mid, 'stoptime' => $nexttime))->find();
        if (!$info) {
            $data['addtime'] = time();
            $data['money'] = $num;
            $data['mid'] = $mid;
            $data['packtag'] = 1;
            $data['expirationtime'] = mktime(0, 0, 0, 12, 12, 2016);
            $data['stoptime'] = $nexttime;
            $id = M('Packet')->add($data);
            if ($id) {
                $this->success();
            }
        } else {
            $this->error('今天只能拆一次，明天再来吧');
        }
    }

    /*public function addhongbao()
    {
        $mid = session('mid');
        $hongbao = I('get.hongbao');
        $reg = '/\d{1}/';
        preg_match_all($reg, $hongbao, $arr);
        foreach ($arr as $v) {
            $num = $v[0] . $v[1];
        }
        //判断数据表中是否存在该用户今天的拆红包的记录，存在的话就不让其再进行拆红包操作
        $nexttime = strtotime(date('Y-m-d', time())) + 86400;
        $prevtime = strtotime(date('Y-m-d', time()));
        $addtime = M('Packet')->field('addtime')->where(array('mid' => $mid,'stoptime'=>$nexttime))->find();
        if(isset($addtime)&&$addtime){
            if ($addtime['addtime']>$prevtime&&$addtime['addtime']<$nexttime) {
                $this->error();
            }else{
                $packetwhere['mid'] = $mid;
                $time = time();
                $data['addtime'] = $time;
                $data['money'] = $num;
                $data['mid'] = $mid;
                $data['packtag'] = 1;
                $time1 = mktime(0, 0, 0, 12, 12, 2016);
                $data['expirationtime'] = $time1;
                $data['stoptime'] = $nexttime;
                $id = M('Packet')->add($data);
                if ($id) {
                    if (time()>mktime(0, 0, 0, 12, 12, 2016)) {
                        M('packet')->where($packetwhere)->save(array('status' => 0));
                    }
                    $this->success();
                }
            }
        }else{
            $packetwhere['mid'] = $mid;
            $time = time();
            $data['addtime'] = $time;
            $data['money'] = $num;
            $data['mid'] = $mid;
            $data['packtag'] = 1;
            $time1 = mktime(0, 0, 0, 12, 12, 2016);
            $data['expirationtime'] = $time1;
            $data['stoptime'] = $nexttime;
            $id = M('Packet')->add($data);
            if ($id) {
                if (time() > mktime(0, 0, 0, 12, 12, 2016)) {
                    M('packet')->where($packetwhere)->save(array('status' => 0));
                }
                $this->success();
            }
        }
    }*/
}



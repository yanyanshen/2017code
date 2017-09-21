<?php
namespace Mobile\Controller;
use Think\Controller;
class AddressController extends Controller
{
//地址列表
    public function addresslist()
    {
        $mid = session('mid');
        $addresswhere['mid'] = $mid;
        $addresswhere['isdefault'] = 1;
        $res = M('Addresses')->where($addresswhere)->find();
        if ($res) {
            $address = M('Addresses')->where($addresswhere)->order('addtime desc')->select();
        } else {
            $address = M('Addresses')->where(array('mid' => 8))->order('addtime desc')->limit(0, 1)->select();
        }
        $areastr = $address[0]['area'];
        $areaarr = explode('-', $areastr);
        $address[0]['province'] = $areaarr[0];
        $address[0]['country'] = $areaarr[1];
        $address[0]['city'] = $areaarr[2];
        $this->assign('address',$address);
    }

    public function numaddresslist()
    {
        $mid = session('mid');
        $oid = I('get.oid');
        session('oid',$oid);
        $addresswhere['mid'] = $mid;
        $address = M('Addresses')->where($addresswhere)->order('addtime desc')->select();
        //将区域分割为省市县形式的
        foreach ($address as $k => $v) {
            $areastr = $v['area'];
            $areaarr = explode('-', $areastr);
            $address[$k]['province'] = $areaarr[0];
            $address[$k]['country'] = $areaarr[1];
            $address[$k]['city'] = $areaarr[2];
        }
        $this->assign('oid', $oid);
        $this->assign('address', $address);
    }

//展示地址列表
    public function totaladdresslist()
    {
        $this->numaddresslist();
        $this->display('addresslist');
    }

//展示管理地址的页面
    public function manageAddress()
    {
        //调用显示地址列表的方法
        $this->numaddresslist();
        $this->display('manageAddress');
    }

//展示添加地址的页面
    public function addAddress()
    {   $this->numaddresslist();
        $this->display('addAddress');
    }

//添加地址
    public function add()
    {
        $mid=session('mid');
        $data['area'] = I('post.province') . '-' . I('post.country') . '-' . I('post.city');
        $data['mobile'] = I('post.mobile');
        $data['username'] = I('post.username');
        $data['address'] = I('post.address');
        $data['addtime'] = time();
        $data['isdefault'] = I('post.isdefault');
        $data['mid'] = $mid;
        if (I('post.ecode')) {
            $ecode = I('post.ecode');
            $data['ecode']=$ecode;
        }
        if (I('post.isdefault') == 1) {
            $savedata['isdefault'] = 0;
            M('Addresses')->where(array('mid' => $mid))->save($savedata);
        }
        $aid = M('Addresses')->add($data);
        if ($aid) {
            $this->success();
        } else {
            $this->error();
        }
    }

//需要编辑的地址列表
    public function editorlist()
    {
        $id = I('get.id');
        $oid=session('oid');
        $addressInfo = M('addresses')->where(array('id' => $id))->select();
        $this->assign('addressInfo', $addressInfo);
        $this->assign('addressid', $id);
        $this->assign('oid',$oid);
        $this->display("editAddress");
    }

    public function editAddress()
    {   $oid=session('oid');
        if (IS_POST) {
            $id = I('post.addressid');
            $address = M('Addresses');
            if (I('post.area')) {
                $data['area'] = I('post.area');
            } else {
                $data['area'] = I('post.province'). '-'. I('post.country') .'-'.I('post.city');
            }
            $data['username'] = I('post.username');
            $data['mobile'] = I('post.mobile');
            $data['address'] = I('post.address');
            if ($address->where(array('id' => $id))->save($data)) {
                $this->success($oid);
            } else {
                $this->error($id);
            }
        }
    }

//删除地址
    public function deleteAddress()
    {
        $id = I('post.id');
        $oid=session('oid');
        if (M('addresses')->where(array('id' => $id))->delete()) {
            $this->success($oid);
        } else {
            $this->error('删除失败');
        }
    }

//设置默认地址
    public function setdefault()
    {
        $id = I('post.id');
        $mid = session('mid');
        $mid = 8;
        //设置默认地址，并将该用户其他的isdefault属性设置为0
        $where1['mid'] = $mid;
        $where1['id'] = $id;
        $data1['isdefault'] = 1;
        //更新除了设置该地址的其他的地址的isdefault值
        $where2['mid'] = $mid;
        $where2['id'] = array('notin', $id);
        $data2['isdefault'] = 0;
        if (M('addresses')->where($where1)->save($data1)) {
            M('addresses')->where($where2)->save($data2);
            $this->success('设置成功');
        } else {
            $this->error('请稍后再进行设置');
        }
    }
}
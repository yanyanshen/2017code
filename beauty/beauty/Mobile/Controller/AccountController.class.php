<?php
namespace Mobile\Controller;
use Think\Controller;
class AccountController extends Controller{
    public function index(){
        $this->display('index');
    }

    //余额及交易记录;
    public function record(){
        if(IS_AJAX){
            $id=I('post.id');
            $account=M('Account');
            $info=$account->where(array('id'=>$id))->find();
            if($info){
                $data['status']=($info['status']==0)?1:0;
                if($account->where(array('id'=>$id))->save($data)){
                    $this->success('操作成功');
                }else{
                    $this->error('操作失败');
                }
            }else{
                $this->error('没有查到数据');
            }
        }else{
            $mid=session('mid');
            $account=M('Account')->where(array('mid'=>$mid))->find();
            $recharge=M('AccountRecharge')->where(array('mid'=>$mid))->order('id desc')->find();
            $cash=M('AccountCash')->where(array('mid'=>$mid))->order('id desc')->find();
            $trade=M('AccountTrade')->where(array('mid'=>$mid))->order('id desc')->find();
            $this->assign('account',$account);
            $this->assign('recharge',$recharge);
            $this->assign('cash',$cash);
            $this->assign('trade',$trade);
            $this->assign('status',1);
            $this->display('record');
        }
    }

    //查看充值记录;
    public function rechargeRecord(){
        $mid=session('mid');
        $recharge=M('Account_recharge');
        $list=$recharge->where(array('mid'=>$mid))->select();
        $this->assign('list',$list);
        $this->assign('status',2);
        $this->display('record');
    }

    //查看取现记录;
    public function cashRecord(){
        $mid=session('mid');
        $recharge=M('Account_cash');
        $list=$recharge->where(array('mid'=>$mid))->select();
        $this->assign('list',$list);
        $this->assign('status',3);
        $this->display('record');
    }

    //查看消费记录;
    public function tradeRecord(){
        $mid=session('mid');
        $recharge=M('Account_trade');
        $list=$recharge->where(array('mid'=>$mid))->select();
        $this->assign('list',$list);
        $this->assign('status',4);
        $this->display('record');
    }

    //立即充值;
    public function recharge(){
        if(IS_AJAX){
            $paypwd=trim(I('post.paypwd'));
            $money=trim(I('post.money'));
            if($paypwd && $money) {
                $mid = session('mid');
                $where['id'] = $mid;
                $where['paypwd'] = md5($paypwd);
                //判断支付密码是否正确;
                $res = M('User')->where($where)->find();
                if($res){
                    //判断充值的金额;
                    if (is_numeric($money) && $money > 0) {
                        $recharge = M('Account_recharge');
                        $account = M('Account');
                        //开启事务;
                        $recharge->startTrans();
                        $rechargeInfo = $recharge->where(array('mid' => $mid))->order('id desc')->find();
                        $accountInfo = $account->where(array('mid' => $mid))->find();
                        if ($rechargeInfo && $accountInfo) {
                            $data['rechargemoney'] = trim(I('post.money'));
                            $data['rechargetime'] = time();
                            $data['rechargesum'] = $rechargeInfo['rechargesum'] + I('post.money');
                            $data['mid'] = $mid;
                            $info['balance'] = $accountInfo['balance'] + I('post.money');
                            $info['remark'] = I('post.remark');
                            $info['time'] = time();
                            //事务同时操作;
                            if (!$recharge->add($data)) {
                                $recharge->rollback();
                            }
                            if (!$account->where(array('mid' => $mid))->save($info)) {
                                $recharge->rollback();
                            }
                            //事务提交;
                            if ($recharge->commit()) {
                                $this->success('充值成功');
                            } else {
                                $this->error('充值失败');
                            }
                        } elseif (!$rechargeInfo && !$accountInfo) {
                            $data['rechargemoney'] = trim(I('post.money'));
                            $data['rechargetime'] = time();
                            $data['rechargesum'] = I('post.money');
                            $data['mid'] = $mid;
                            $info['balance'] = I('post.money');
                            $info['time'] = time();
                            $info['mid'] = $mid;
                            $info['remark'] = I('post.remark');
                            //事务同时操作;
                            if (!$recharge->add($data)) {
                                $recharge->rollback();
                            }
                            if (!$account->add($info)) {
                                $recharge->rollback();
                            }
                            //事务提交;
                            if ($recharge->commit()) {
                                $this->success('充值成功');
                            } else {
                                $this->error('充值失败');
                            }
                        } else {
                            $this->error('充值失败');
                        }
                    }else{
                        $this->error('你输入的金额不正确');
                    }
                }else{
                    $this->error('支付密码错误');
                }
            }else{
                $this->error('支付密码和充值金额不能为空');
            }
        }else{
            $this->display('Account/recharge');
        }
    }

    //提取现金操作;
    public function cash(){
        if(IS_AJAX){
            $paypwd=trim(I('post.paypwd'));
            $money=trim(I('post.money'));
            if($paypwd && $money) {
                $mid = session('mid');
                $where['id'] = $mid;
                $where['paypwd'] = md5($paypwd);
                //判断支付密码是否正确;
                $res = M('User')->where($where)->find();
                if ($res) {
                    //判断提现的金额;
                    if (is_numeric($money) && $money > 0) {
                        $cash = M('Account_cash');
                        $account = M('Account');
                        $cashInfo = $cash->where(array('mid' => $mid))->order('id desc')->find();
                        $accountInfo = $account->where(array('mid' => $mid))->find();
                        //只有账户总表存在以及同时余额大于提现额度,才能进行提现操作;
                        if ($accountInfo && $accountInfo['balance'] >= $money) {
                            //查看资金账户是否被冻结;
                            if ($accountInfo['status'] == 1) {
                                //开启事务;
                                $cash->startTrans();
                                //分两种情况,是否有过体现记录;
                                if ($cashInfo) {
                                    //有过提现记录,主表更新,提现表插入以及更新;
                                    $data['cashmoney'] = $money;
                                    $data['cashtime'] = time();
                                    $data['cashsum'] = $cashInfo['cashsum'] + $money;
                                    $data['mid'] = $mid;
                                    $info['balance'] = $accountInfo['balance'] - $money;
                                    $info['time'] = time();
                                    //事务同时操作;
                                    if (!$cash->add($data)) {
                                        $cash->rollback();
                                    }
                                    if (!$account->where(array('mid' => $mid))->save($info)) {
                                        $cash->rollback();
                                    }
                                    //事务提交;
                                    if ($cash->commit()) {
                                        $this->success('提现成功');
                                    } else {
                                        $this->error('提现失败');
                                    }
                                } else {
                                    //没有提现记录,主表更新,体现表插入;
                                    $data['cashmoney'] = $money;
                                    $data['cashtime'] = time();
                                    $data['cashsum'] = $money;
                                    $data['mid'] = $mid;
                                    $info['balance'] = $accountInfo['balance'] - $money;
                                    $info['time'] = time();
                                    //事务同时操作;
                                    if (!$cash->add($data)) {
                                        $cash->rollback();
                                    }
                                    if (!$account->where(array('mid' => $mid))->save($info)) {
                                        $cash->rollback();
                                    }
                                    //事务提交;
                                    if ($cash->commit()) {
                                        $this->success('提现成功');
                                    } else {
                                        $this->error('提现失败');
                                    }
                                }
                            } else {
                                $this->error('你的资金账户被冻结');
                            }
                        } else {
                            $this->error('你的余额不足');
                        }
                    } else {
                        $this->error('你输入的金额不正确');
                    }
                } else {
                    $this->error('支付密码错误');
                }
            }else{
                $this->error('取现金额和支付密码不能为空');
            }
        }else{
            $this->display('Account/cash');
        }
    }
}
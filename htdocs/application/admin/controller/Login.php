<?php
namespace app\admin\controller;

use think\Controller;


class Login extends Controller{

    public function index(){
        return $this->fetch();
    }
    public function do_login(){
        $data=input('post.');
        $db=db('user');
        $username=$data['username'];
        $password=$data['password'];
        $info=$db->where("username='".$username."'")->find();
        if($info){
            if($info['password']==MD5($password)){
                session('userid',$info['Id']);
                $this->success('登录成功','Index/index');
            }else{
                $this->error('密码错误,请重新输入');
            }
        }else{
            $this->error('用户名不存在,请重新输入');
        }
    }
}
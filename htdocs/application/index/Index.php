<?php

namespace app\index\controller;

use think\Controller;

class index extends Controller
{
        //注册和登录 读的是后台用户表 应该读狱犯表
    public function login(){ //登录方法测试
        $username=input('post.username');
        $password=input('post.password');
        $db=db('suspect');
        $info=$db->where("membername='".$username."'")->find();
        if($info){
            if($info['password']==MD5($password))
            {
                return json('succ');
            }else{
                return json('fail');
            }
        }else{
            return json('error');
        }
    }       
    public function register(){//注册方法测试
        $all=input('post.');
        $db=db('menbername');
        $list=$db->where("menbername='".$all['username']."'")->find();
        if($all['username']==''){
            return json('userkong');
        }
        if(!$list){
            if($all['password']==$all['passwordd']){
                $all['password']=MD5($all['password']);
                unset($all['passwordd']);
                $info=$db->insert($all);
                if($info){
                    return json('succ');
                }
            }
            else{
                return json('fail');
            }
        }
        else{
            return json('error');
        }
    }
    public function law_list(){     //法律法规列表查询测试
        $page=input('post.currage');
        $list=db('law')->page($page,7)->where("cate=0")->order('Id desc')->select();

        $list['photo']='';
        if($list['photo']==''){
            $list['photo']="http://uploads.xuexila.com/allimg/1605/741-1605260RQ2-52.jpg";
        }
        return json($list);
    }
    public function process_list(){ //司法流程列表查询测试
        //http://192.168.98.254/index/index/process_list
        $page=input('post.currage');
        $list=db('law')->page($page,10)->where("cate=1")->order('Id desc')->select();
        return json($list);
    }
    public function store_list(){   //商品列表查询测试
        $page=input('post.currage');
        $list=db('goods')->page($page,10)->order('Id desc')->select();
        foreach($list as &$v){
            $v['photo']='http://192.168.98.254/Uploads/'.$v['photo'];
        }
        return json($list);
    }
    public function news_content(){
        $id=input('post.nid');
        $list=db('law')->alias('a')->join('user','user.Id=a.uid')
        ->where('a.Id='.$id)->field('a.*,user.username')->find();
        //$list=db('law')->where('Id='.$id)->find();
        $list['pubdate']=date('Y-m-d',$list['pubdate']);
        return json($list);
    }
    public function userinfo(){  //用户信息读取
        $uid=input('post.userid');
        $list=db('suspect')->where('Id',$uid)->find();
            $list['photo']='http://192.168.98.254/Uploads/'.$list['photo'];
        return json($list);
    }
    public function goodsinfo(){//商品读取
        $Id=input('post.gid');
        $data=db('goods')->where("Id='".$Id."'")->find();
        $data['photo']='http://192.168.98.254/Uploads/'.$data['photo'];
        return json($data);
    }
    public function upimg(){  //图片上传  update/数据库里的数据
        $file=request()->file('images');
        $info=$file->move(config('upload_path'));
        $result="http://192.168.98.254/Uploads/".$info->getSavename();
        return json($result);
    }
}
?>

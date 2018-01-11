<?php

namespace app\prisonapi\controller;

use think\Controller;
use think\Db;

class index extends Controller
{
//登录&注册注册不能用了
    public function login()
    {
        $username=input('post.username');
        $password=input('post.password');
        $db=db('suspect');
        $info=$db->where("membername='".$username."'")->find();
        $info['photo']='http://www.alroy.cn/Uploads/'.$info['photo'];
        if($info){
            if($info['password']==md5($password)){
                $data=['msg'=>'succ',
                      'info'=>$info];
            return json($data);
            }else{
                $data=['msg'=>'fail'];
            return json($data);
            }
        }else{
            $data=['msg'=>'error'];
        return json($data);
        }
    }
    public function register(){//注册方法
        $all=input('post.');
        $db=db('suspect');
        $list=$db->where("membername='".$all['username']."'")->find();
        if($all['username']==''){
            return json('userkong');
        }
        if(!$list){
            if($all['password']==$all['passwordd']){
                $all['password']=MD5($all['password']);
                unset($all['passwordd']);
                $info=$db->insert($all);
                if($info){
                    return json('succ');}
            }else{
                return json('fail');}
        }else{
            return json('error');}
    }
//法律法规 司法流程
    public function law_list(){     //法律法规列表查询
        $page=input('post.currage');
        $list=db('law')->where("cate=0")->page($page,7)->order('Id desc')->select();
        return json($list);
    }
    public function process_list(){ //司法流程列表查询
        $page=input('post.currage');
        $list=db('law')->page($page,7)->where("cate=1")->order('Id desc')->select();
        return json($list);
    }
    public function news_content(){ //法律法规 司法流程详情页
        $id=input('post.nid');
        $list=db('law')->alias('a')->join('user','user.Id=a.uid')
            ->where('a.Id='.$id)->field('a.*,user.username')->find();
        $list['pubdate']=date('Y-m-d',$list['pubdate']);
        return json($list);
    }
//商品&购物
    public function store_list(){   //商品列表查询
        $page=input('post.currage');
        $list=db('goods')->page($page,6)->where("is_sale=1")->order('Id desc')->select();
        foreach($list as &$v){
            $v['photo']='http://www.alroy.cn/Uploads/'.$v['photo'];
        }
        return json($list);
    }
    public function goodsinfo(){ //商品读取
    $Id=input('post.gid');
    $data=db('goods')->where("Id='".$Id."'")->find();
    $data['photo']='http://www.alroy.cn/Uploads/'.$data['photo'];
    return json($data);
}
    public function offer_add(){             //商品购买审核表
        $data['mid']=input('post.userid');   //用户Id
        $data['nums']=input('post.nums');    //购买数量
        $data['goodsid']=input('post.id');   //商品id
        $data['pubdate'] = time();           //申请时间
        if($data['nums']==''){
            $data['nums']=1;
        }
            $good = db('goods')->where('Id', $data['goodsid'])->field('price,score')->find();
            $usermoney = db('suspect')->where('Id', $data['mid'])->field('money')->find();
            $total = $good['price'] * $data['nums'];
            if ($data['nums']<=$good['score']){
                if($usermoney['money'] > $total){
                    $usermoney['money']=$usermoney['money']-$total;
                    $good['score']=$good['score']-$data['nums'];
                $info =db('offer')->insert($data);
                if($info){
                    $yuer=db('suspect')->where("Id=".$data['mid'])->update($usermoney);
                    $kucun=db('goods')->where("Id=".$data['goodsid'])->update($good);
                    if($yuer&&$kucun){
                        return json('succ');
                    }else{
                        return json('error');
                    }
                }
            }else{
                return json('money');
            }
        }else{
            return json('kucun');
        }
    }
    public function offer_list(){ //购物申请列表查询
        $id=input('post.userid');
        $list=db('offer')->alias('a')->join('goods','goods.Id=a.goodsid')->where('a.mid',$id)->field('a.*,goods.goodsname')->order('Id desc')->select();
        foreach($list as &$v){
            if($v['status']==1){
                $v['status']='通过';
            }else if($v['status']==0){
                $v['status']='未通过';
            }
            $v['pubdate']=date('m-d H:i',$v['pubdate']);
        }
        return json($list);
    }
    public function expenditurelist(){
        $id=input('post.userid');
        $list=db('offer')->alias('a')->join('goods','goods.Id=a.goodsid')->where("a.mid=$id and a.status=1")->field('a.*,goods.goodsname,goods.price')->order('Id desc')->select();
        foreach($list as &$v){
            $v['totalmoney']=$v['price'] * $v['nums'];
        }
        return json($list);
    }
//签到表
    public function sign_none_add(){
        $id=input('post.userid');
        //$nowmonth = date('n',time());        //当前月
        $list=db('sign')->where("mid=$id and state=1")->column('pubdate');
        $datalist="";
        foreach($list as $key=>$v) {
            $datalist[$v]=[
                "0"=>["startingDay"=>'true','color'=>'#77e979'],
                "1"=>["endingDay"=>'true', 'color'=>'#77e979']
            ];
        }
        return json($datalist);
    }
    public function sign_list(){ //签到记录列表查询
        $id = input('post.userid');
        $list = db('sign')->where("mid=$id and state=1")->order('Id desc')->select();
        return json($list);
    }
    public function sign_add(){  //签到表添加
        $id=input('post.userid');
        $data['mid']=$id;
        $data['state']=1;
        $data['pubdate']=date('Y-m-d',time());
        $data['month']=date('n',time());
        $sign=db('sign')->where('mid',$id)->order('Id desc')->find();//查询最新数据
        if($sign['pubdate']==date('Y-m-d',time())){
            $list['info']='error';
            //return json($list);
            exit;
        }else{
            $info=db('sign')->insert($data);
            if($info['mid']){
                $list['info']='succ';
                //return json($list);
            }else{
                $list['info']='cuowu';
                //return json($list);
            }
        }
    }
//个人信息&修改密码
    public function userinfo(){ //个人信息余额
        $id=input('post.userid');
        $list=db('suspect')->where('Id',$id)->find();
        $list['photo']='http://www.alroy.cn/Uploads/'.$list['photo'];
        return json($list);
    }
    public function up_password(){   //修改密码
        $data=input('post.');
        $table=db('suspect');
        $userid=input('post.userid');
        $lodpass=MD5($data['lodpass']);
        $newpass=MD5($data['newpass']);
        $lodverify=$table->where("Id='".$userid."' and password='".$lodpass."'")->find();
        if($lodverify){	   //原密码是否存在
            $data['Id']=$userid;
            $data['password']=$newpass;
            unset($data['userid']);
            unset($data['newpass']);
            unset($data['lodpass']);
            $info=$table->update($data);
            if($info){
                $info2=$table->where('Id='.$userid)->find();
                $info2['info']='succ';
                unset($info2['money']);
                unset($info2['photo']);
                unset($info2['birth']);
                unset($info2['intime']);
                    return json($info2);
            }elseif($info===false){
                $info4['info']='fail';
                    return json($info4);
        }
        }else{
                $info3['info']='bucunzai';
                return json($info3);
            }
    }
//图片上传 ,暂时用不到
//  public function upimg(){  //图片上传  update/数据库里的数据
//     $file=request()->file('images');
//     $info=$file->move(config('upload_path'));
//     $result="http://192.168.98.254/Uploads/".$info->getSavename();
//      return json($result);
//  }
}
?>

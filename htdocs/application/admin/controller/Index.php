<?php
namespace app\admin\controller;

use think\Controller;

//use app\admin\Controller\Common;

//class Index extends Common
class Index extends Common
{
//首页
    public function index(){
        $userinfo=db('user')->where('Id='.session('userid'))->find();
        $this->assign('user',$userinfo);
        return $this->fetch();
    }
//退出
    public function session_del(){
        session_unset();
            $this->success('退出成功','Login/index');
    }
//法律法规、司法流程
    public function law_add(){
        $db=db('user');
        $user=$db->where('Id='.session('userid'))->find();
        $this->assign('user1',$user);//作者为当前登录的用户的username
        return $this->fetch();
    }
    public function law_do_add(){
        $data=input('post.');
        $db=db('law');
        $data['pubdate']=time();
        $info=$db->insert($data);
        if($info){
            $this->success('添加成功','Index/law_list');
        }else{
            $this->errot('添加失败');
        }
    }
    public function law_list(){
        $db=db('law');
        $db2=db('user');
        $list=$db->paginate(6);
        $list1=$list->toArray()['data'];
        for($a=0;$a<count($list1);$a++){
            $list1[$a]['username']=$db2->field('username')->where('Id='.$list1[$a]['uid'])->find()['username'];
        }
        $this->assign('list',$list1);
        $this->assign('page',$list->render());
        return $this->fetch();
    }
    public function law_del(){
        $Id=input('Id');
        $db=db('law');
        $info=$db->where('Id in('.$Id.')')->delete();
        if($info){
            $this->success('删除成功','Index/law_list');
        }else{
            $this->error('删除失败');
        }
    }
    public function law_up(){
        $data=input('Id');
        $find=db('law')->where('Id='.$data)->find();
        $this->assign('vo',$find);
        return $this->fetch();
    } //修改的作者值没加
    public function law_do_up(){
        $data=input();
        $db=db('law');
        $data['pubdate']=time();
        $info=$db->update($data);
        if($info){
            $this->success('修改成功','Index/law_list');
        }else{
            $this->error('修改失败');
        }
    }
//签到表
    public function sign_list(){
        $signlist=db('sign')->alias('a')->join('suspect','suspect.Id=a.mid')->field('a.*,suspect.membername')->paginate(6);
        $this->assign('page',$signlist->render());
        $this->assign('signlist',$signlist);
        return $this->fetch();
    }
    public function sign_del(){
        $db=db('sign');
        $Id=input('Id');
        $info=$db->where("Id in(".$Id.")")->delete();
        if($info){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }
//预警管理
   public function  warning_list(){
       return $this->fetch();
   }
//嫌犯表
    public function suspect_add(){
        return $this->fetch();
    }
    public function suspect_do_add(){
        $data=input('post.');
        $data['password']=MD5('111');
        $file=request()->file('photo');
        if($file){
            $info=$file->move(config('upload_path'));//图片地址
            $data['photo']=$info->getSavename();
        }else{
            $this->error('图片不能为空');
        }
        $db=db('suspect');
        if($data['membername']!=''){
            if($data['password']!=''){
                $data['password']=MD5($data['password']);
                $infos=$db->insert($data);
                if($infos){
                    $this->success('嫌犯添加成功');
                }else{
                    $this->error('嫌犯添加失败');
                }
            }else{
                $this->error('嫌犯密码不可为空');
            }
        }
        else{
            $this->error('嫌犯不可为空');
        }
    }
    public function suspect_list(){
        $db=db('suspect');
        $info=$db->paginate(7);
        $this->assign('find',$info->toArray());
        $page=$info->render();
        $this->assign('page',$page);
        return $this->fetch();
    }
    public function suspect_del(){
        $id=input('Id');
        $db=db('suspect');
        $info=$db->where("Id in(".$id.")")->delete();
        if($info){
            $this->success('嫌犯删除成功','Index/suspect_list');
        }else{
            $this->success('嫌犯删除失败');
        }
    }
    public function suspect_up(){
        $id=input('Id');
        $db=db('suspect');
        $info=$db->where("Id=".$id)->findOrfail(); //fetchSql 返回sql语句不返回结果
        $this->assign('info',$info);
        return $this->fetch();
    }
    public function suspect_do_up(){
        $id=input('Id');
        $data=input('post.');
        $file=request()->file('photo');
        if($file){
            $filephoto=$file->move(config('upload_path'));
            $data['photo']=$filephoto->getSavename();
        }
        $db=db('suspect');
        $info=$db->where("Id=".$id)->update($data);
        if($info!==false){
            $this->success('修改成功','Index/suspect_list');
        }else{
            $this->error('修改失败');
        }
    }
//商品表
    public function goods_add(){
        return $this->fetch();
    }
    public function goods_do_add(){
        $data=input('post.');
        $file=request()->file('photo');
        $fileinfo=$file->move(config('upload_path'));//将图片移动到文件夹
        $data['photo']=$fileinfo->getSavename();//获取图片的值
        $db=db('goods');
        $info=$db->insert($data);
        if($info){
            $this->success('添加成功','Index/goods_list');
        }else{
            $this->error('添加失败','Index/goods_list');
        }
    }
    public function goods_list(){
        $db=db('goods');
        $lawslist=$db->order('Id desc')->paginate(5);
        $this->assign('page',$lawslist->render());
        $this->assign('lawslist',$lawslist);
        return $this->fetch();
    }
    public function goods_del(){
        $db=db('goods');
        $Id=input('Id');
        $info=$db->where("Id in(".$Id.")")->delete();
        if($info){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }
    public function goods_up(){
        $db=db('goods');
        $id=input('id');
        $info=$db->where('Id='.$id)->find();
        $this->assign('info',$info);
        return $this->fetch();
    }
    public function goods_do_up(){
        $data=input('post.');
        $data['Id']=$data['id'];
        unset($data['id']);
        $file=request()->file('photo');
        if($file){
            $fileinfo=$file->move(config('upload_path'));
            $data['photo']=$fileinfo->getSavename();
        }
        $db=db('goods');
        $info=$db->update($data);
        if($info!==false){
            $this->success('修改成功','Index/goods_list');
        }else{
            $this->error('修改失败','Index/goods_list');
        }
    }
//审核表
    public function offer_add(){
        $table=db('goods')->select();
        $this->assign('goodsall',$table);
        return $this->fetch();
    }
    public function offer_do_add(){
        $data=input('post.');
        $db=db('offer');
        $data['pubdate']=time();
        $info=$db->insert($data);
        if($info){
            $this->success('添加成功','Index/offer_list');
        }else{
            $this->error('添加失败','Index/offer_list');
        }
    }
    public function offer_list(){
        $table=db('offer')->alias('a')->join('suspect','suspect.Id =a.mid')->join('goods','goods.Id=a.goodsid')->field('suspect.membername,a.Id,suspect.Id as sid,goods.Id as gid,goods.goodsname,a.pubdate,a.nums,a.status')->order('a.Id desc')->paginate(6);
        $this->assign('page',$table->render());
        $this->assign('offerlist',$table);
        return $this->fetch();
    }
    public function offer_del(){
        $db=db('offer');
        $offerid=input('Id');
        $info=$db->where('Id in ('.$offerid.')')->delete();
        if($info){
            $this->success('删除成功','Index/offer_list');
        }else{
            $this->error('删除失败','Index/offer_list');
        }
    }
    public function offer_up(){
        $db=db('offer');
        $offerid=input('Id');
        $info=$db->where('Id='.$offerid)->find();
        $this->assign('info',$info);
        return $this->fetch();
    }
    public function offer_do_up(){
        $data=input('post.');
        $db=db('offer');
        if($data['status']==0){
            $table=db('offer')->alias('a')->join('goods','a.goodsid=goods.Id')->field('goods.price,goods.score,a.nums,a.mid,a.Id,a.goodsid')->where('a.goodsid',$data['goodsid'])->find();
            $money=db('suspect')->where('Id',$table['mid'])->find(); //嫌犯余额
            $totalmoney=$table['price']*$table['nums'];//购物钱数
            $money['money']=$money['money']+$totalmoney;
            $score=db('goods')->where('Id',$table['goodsid'])->find();//商品编号
            $score['score']=$score['score']+$table['nums'];
            $suspect=db('suspect')->update($money);
            $goods=db('goods')->update($score);
            $info=$db->where('Id',$table['Id'])->delete();
        }elseif($data['status']==1){
            $info=$db->update($data);
        }
        if($info!==false){
            $this->success('修改成功','Index/offer_list');
        }else{
            $this->error('修改失败','Index/offer_list');
        }
    }
//用户管理
    public function set_add(){//组添加
        return $this->fetch();
    }
    public function set_do_add(){//组添加处理
        $data=input();
        $db=db('group');
        $info=$db->insert($data);
        if($info){
            $this->success('添加成功','Index/set_add');
        }else{
            $this->error('添加失败');
        }
    }
    public function set_list(){//组列表
        $db=db('group');
        $list=$db->paginate(4);
        $this->assign('list',$list);
        $this->assign('page',$list->render());
        return $this->fetch();
    }
    public function set_del(){//组删除
        $db=db('group');
        $id=input('id');
        $info=$db->where('id in('.$id.')')->delete();
        if($info){
            $this->success('删除成功','Index/set_list');
        }else{
            $this->error('删除失败');
        }
    }
    public function set_up(){//组修改
        $id=input('id');
        $db=db('group');
        $info=$db->where('id='.$id)->find();
        $this->assign('info',$info);
        return $this->fetch();
    }
    public function set_do_up(){//组修改处理
        $data=input();
        $db=db('group');
        $info=$db->update($data);
        if($info){
            $this->success('修改成功','Index/set_list');
        }else{
            $this->error('修改失败');
        }
    }
//规则表
    public function rule_add(){//规则添加
        $db=db('rule');
        $rulelist=$db->where('parentid=0')->select();
        foreach($rulelist as &$v){
            $v['second']=$db->where('parentid='.$v['id'])->select();
        }
        $this->assign('rulelist',$rulelist);
        return $this->fetch();
    }
    public function rule_do_add(){//规则添加处理
        $data=input();
        $db=db('rule');
        $info=$db->insert($data);
        if($info){
            $this->success('添加成功');
        }else{
            $this->error('添加失败');
        }
    }
    public function rule_list(){//规则列表
        $db=db('rule');
        $list=$db->paginate(4);
        $this->assign('list',$list);
        $this->assign('page',$list->render());
        return $this->fetch();
    }
    public function rule_del (){//规则删除
        $id=input('id');
        $db=db('rule');
        $info=$db->where('id in('.$id.')')->delete();
        if($info){
            $this->success('删除成功','Index/rule_list');
        }else{
            $this->error('删除失败');
        }
    }
    public function rule_up(){//规则修改
        $id=input('id');
        $db=db('rule');
        $info=$db->where('id='.$id)->find();
        $this->assign('info',$info);
        return $this->fetch();
    }
    public function rule_do_up(){//规则修改处理
        $data=input();
        $db=db('rule');
        $info=$db->update($data);
        if($info){
            $this->success('修改成功','Index/rule_list');
        }else {
            $this->error('修改失败');
        }
    }
//js检测规则名是否重复
    public function  checkenname(){
        $name=input('post.names');
        $db=db('rule');
        $info=$db->where("name='".$name."'")->find();
        if($info){
            $adata=[
                'status'=>1,
                'msg'=>'英文名称已存在'
            ];
        }else{
            $adata=[
                'status'=>0,
                'msg'=>'英文名称可用'
            ];
        }
        return json($adata);
    }
    public function  checkzhname(){
        $name=input('post.names');
        $db=db('rule');
        $info=$db->where("title='".$name."'")->find();
        if($info){
            $adata=[
                'status'=>1,
                'msg'=>'中文名称已存在'
            ];
        }else{
            $adata=[
                'status'=>0,
                'msg'=>'中文名称可用'
            ];
        }
        return json($adata);
    }
//用户表
    public function user_add(){
        $db=db('group');
        $grouplist=$db->select();
        $this->assign('grouplist',$grouplist);
        return $this->fetch();
    }
    public function user_do_add(){
        $data=input();
        $data['password']=MD5('111');
        $file=request()->file('photo');
        if($file){
            $fileinfo=$file->move(config('upload_path'));
            $data['photo']=$fileinfo->getSavename();
        }
        $data['inputtime']=time();
        $gdata['group_id']=$data['groupid'];
        unset($data['groupid']);
        $db=db('user');
        $info=$db->insert($data);
        if($info){
            $gdata['uid']=$db->getLastInsID();
            $table=db('group_access');
            $ainfo=$table->insert($gdata);
            if($ainfo){
                $this->success('添加成功','Index/user_list');
            }else{
                $this->error('添加失败');
            }
        }
    }
    public function user_list(){ //用户列表
        $db=db('user');
        $list=$db->paginate(4);
        $this->assign('list',$list);
        $this->assign('page',$list->render());
        return $this->fetch();
    }
    public function user_del(){
        $db=db('user');
        $Id=input('Id');
        $info=$db->where('Id in('.$Id.')')->delete();
        if($info){
            $this->success('删除成功','Index/user_list');
        }else{
            $this->error('删除失败');
        }
    }
    public function user_up(){
        $db=db('group');
        $grouplist=$db->select();
        $this->assign('grouplist',$grouplist);

        $Id=input('Id');
        $info=db('user')->where('Id='.$Id)->find();
        $this->assign('info',$info);

        $group=db('group_access')->where('uid='.$Id)->find();
        $this->assign('groupid',$group['group_id']);
        return $this->fetch();
    }
    public function user_do_up(){
        $data=input();
        $id=$data['uid'];
        unset($data['uid']);
        if($_FILES['photo']['error']==0){
            $file=request()->file('photo');
            $fileinfo=$file->move(config('upload_path'));
            $data['photo']=$fileinfo->getSavename();
        }
        //$data['password']=MD5('111111');
        $gdata['group_id']=$data['groupid'];
        unset($data['groupid']);
        $info1=db('user')->where('Id='.$id)->update($data);
        $info2=db('group_access')->where('uid='.$id)->update($gdata);
        if($info1 || $info2){
            $this->success('修改成功','Index/user_list');
        }else{
            $this->error('未进行任何操作');
        }
    }
    public function setrule()
    {
        $groupid=input('id');
        $db=db('rule');
        $rulelist=$db->where('parentid=0')->select();
        foreach($rulelist as &$v){  //遍历数组 & 传址
            $v['second']=$db->where('parentid='.$v['id'])->select();
            foreach($v['second'] as &$t){
                $t['third']=$db->where('parentid='.$t['id'])->select();
            }
        }
        $info=db('group')->where('id='.$groupid)->find();
        $this->assign('info',$info);

        $this->assign('groupid',$groupid);
        $this->assign('rulelist',$rulelist);
        return $this->fetch();
    }
    public function do_setrule(){
        $data=input();
        $db=db('group');
        $rules=implode(',',$data['rule']);
        $adata=[
            'rules'=>$rules
        ];
        $info=$db->where('id='.$data['id'])->update($adata);
        if($info!==false){
            $this->success('保存成功','Index/set_list');
        }else{
            $this->error('未知原因,失败');
        }
    }
}
?>
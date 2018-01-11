<?php
 namespace app\admin\controller;

 use think\Controller;

 class Common extends Controller{
     public function _initialize(){  //控制器初始化
         parent::_initialize();
         if(session('userid')==''){
            $this->redirect('Login/index');  //重定向
         }
         ////TODO:自定义的初始化
     }
 }
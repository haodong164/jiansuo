<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:73:"D:\phpStudy\WWW\prison\public/../application/admin\view\index\set_up.html";i:1496577510;s:72:"D:\phpStudy\WWW\prison\public/../application/admin\view\public\head.html";i:1496286527;s:72:"D:\phpStudy\WWW\prison\public/../application/admin\view\public\foot.html";i:1496279236;}*/ ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Amaze UI Admin index Examples</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="__STATIC__assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="__STATIC__assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="__STATIC__assets/css/amazeui.min.css" />
    <link rel="stylesheet" href="__STATIC__assets/css/admin.css">
    <link rel="stylesheet" href="__STATIC__assets/css/app.css">
</head>
<body>
        <div class="tpl-content-wrapper">
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                         用户组添加
                    </div>
                    <div class="tpl-portlet-input tpl-fz-ml">
                        <div class="portlet-input input-small input-inline">
                            <div class="input-icon right">
                                <i class="am-icon-search"></i>
                                <input type="text" class="form-control form-control-solid" placeholder="搜索..."> </div>
                        </div>
                    </div>
                </div>
                <div class="tpl-block ">
                    <div class="am-g tpl-amazeui-form">
                        <div class="am-u-sm-12 am-u-md-9">
                            <form class="am-form am-form-horizontal" action="<?php echo url('Index/set_do_up'); ?>" >
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">用户组名称 / GroupName</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" value="<?php echo $info['title']; ?>" name="title" id="user-name" placeholder="姓名 / Name">
                                        <small>输入用户组名称</small>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label  class="am-u-sm-3 am-form-label">状态 / Status</label>
                                    <div class="am-u-sm-9">
                                        <input type="radio" <?php if($info['status'] == 1): ?>checked="checked"<?php endif; ?> name="status" value="1" ><small>启用</small>
                                        <input type="radio" <?php if($info['status'] == 0): ?>checked="checked"<?php endif; ?>name="status" value="0" ><small>禁用</small>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <div class="am-u-sm-9 am-u-sm-push-3">
                                        <button type="submit" class="am-btn am-btn-primary">保存</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<script src="__STATIC__assets/js/jquery.min.js"></script>
<script src="__STATIC__assets/js/amazeui.min.js"></script>
<script src="__STATIC__assets/js/app.js"></script>
</body>
</html>
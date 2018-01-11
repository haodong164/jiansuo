<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"/data/home/bxu2711760022/htdocs/application/admin/view/login/index.html";i:1500863577;}*/ ?>
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

<body data-type="login">

<div class="am-g myapp-login">
    <div class="myapp-login-logo-block  tpl-login-max">
        <div class="myapp-login-logo-text">
            <div class="myapp-login-logo-text">
                阳光监所 <span>登录</span> <i class="am-icon-skyatlas"></i>
            </div>
        </div>
        <div class="login-font">
            <i>后台管理系统 </i>
        </div>
        <div class="am-u-sm-10 login-am-center">
            <form class="am-form" action="<?php echo url('Login/do_login'); ?>" method="post" >
                <fieldset>
                    <div class="am-form-group">
                        <input type="text" class="" name="username" id="doc-ipt-email-1" placeholder="输入用户名">
                    </div>
                    <div class="am-form-group">
                        <input type="password" class="" name="password" id="doc-ipt-pwd-1" placeholder="输入密码">
                    </div>
                    <p><button type="submit" class="am-btn am-btn-default">登录</button></p>
                </fieldset>
            </form>
        </div>
    </div>
</div>
<script src="__STATIC__assets/js/jquery.min.js"></script>
<script src="__STATIC__assets/js/amazeui.min.js"></script>
<script src="__STATIC__assets/js/app.js"></script>
</body>

</html>
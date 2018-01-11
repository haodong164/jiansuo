<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:74:"D:\phpStudy\WWW\prison\public/../application/admin\view\index\setrule.html";i:1496638715;s:72:"D:\phpStudy\WWW\prison\public/../application/admin\view\public\head.html";i:1496286527;s:72:"D:\phpStudy\WWW\prison\public/../application/admin\view\public\foot.html";i:1496279236;}*/ ?>
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
<div class="tpl-portlet-components">
    <div class="portlet-title">
        <div class="caption font-green bold">
            <?php echo $info['title']; ?> 权限设置
        </div>
    </div>
    <div class="tpl-block ">
        <div class="am-g tpl-amazeui-form">
            <div class="am-u-sm-12 am-u-md-9">
                <form method="post" action="<?php echo url('Index/do_setrule'); ?>" class="am-form am-form-horizontal">
                    <input type="hidden" name="id" value="<?php echo $info['id']; ?>"/>
                    <?php if(is_array($rulelist) || $rulelist instanceof \think\Collection || $rulelist instanceof \think\Paginator): $i = 0; $__LIST__ = $rulelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <div class="am-form-group">
                        <div class="am-u-sm-9">
                            <input type="checkbox" name="rule[]" class="first_level first_level_<?php echo $vo['id']; ?>" data-id="<?php echo $vo['id']; ?>"  value="<?php echo $vo['id']; ?>"><small><?php echo $vo['title']; ?></small>
                        </div>
                        <?php if(is_array($vo['second']) || $vo['second'] instanceof \think\Collection || $vo['second'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['second'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sec): $mod = ($i % 2 );++$i;?>
                        <div class="am-form-group">
                            <div class="am-u-sm-9" style="padding-left: 40px;">
                                <input type="checkbox" name="rule[]" class="second_level_<?php echo $sec['parentid']; ?> second_level_<?php echo $sec['id']; ?> second_level" data-id="<?php echo $sec['id']; ?>" data-parentid="<?php echo $sec['parentid']; ?>"  value="<?php echo $sec['id']; ?>"> <small><?php echo $sec['title']; ?></small>
                                <div style="padding-left: 40px;">
                                    <?php if(is_array($sec['third']) || $sec['third'] instanceof \think\Collection || $sec['third'] instanceof \think\Paginator): $i = 0; $__LIST__ = $sec['third'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$third): $mod = ($i % 2 );++$i;?>
                                    <input type="checkbox" name="rule[]" class="second_level_<?php echo $sec['parentid']; ?> third_level_<?php echo $sec['id']; ?> third_level" data-id="<?php echo $third['id']; ?>" data-parentid="<?php echo $sec['id']; ?>" data-ppid="<?php echo $vo['id']; ?>"  value="<?php echo $third['id']; ?>"><small><?php echo $third['title']; ?></small>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
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
<script src="__STATIC__assets/js/jquery.min.js"></script>
<script src="__STATIC__assets/js/amazeui.min.js"></script>
<script src="__STATIC__assets/js/app.js"></script>
<script type="text/javascript">
    $('.first_level').click(function(){
        var id=$(this).attr('data-id');
        if($(this).is(':checked')) {
            $('.second_level_'+id).prop('checked',true);
        }
        else {
            $('.second_level_'+id).prop('checked',false);
        }
    });
    $('.second_level').click(function(){
        var id=$(this).attr('data-id');
        var parentid=$(this).attr('data-parentid');
        if($(this).is(':checked'))
        {
            $('.first_level_'+parentid).prop('checked',true);
            $('.third_level_'+id).prop('checked',true);
        }
        else{
            $('.third_level_'+id).prop('checked',false);
        }
    });
    $('.third_level').click(function(){
        var id=$(this).attr('data-id');
        var pid=$(this).attr('data-parentid');
        var ppid=$(this).attr('data-ppid');
        if($(this).is(':checked')){
            $('.second_level_'+pid).prop('checked',true);
            $('.first_level_'+ppid).prop('checked',true);
        }
    });
</script>
</body>
</html>
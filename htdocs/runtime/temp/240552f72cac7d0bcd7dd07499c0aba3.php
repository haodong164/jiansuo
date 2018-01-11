<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:75:"/data/home/bxu2711760022/htdocs/application/admin/view/index/sign_list.html";i:1500446530;s:71:"/data/home/bxu2711760022/htdocs/application/admin/view/public/head.html";i:1499651237;s:71:"/data/home/bxu2711760022/htdocs/application/admin/view/public/foot.html";i:1499651237;}*/ ?>
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
<body >
<div class="tpl-portlet-components">
    <div class="portlet-title">
        <div class="caption font-green bold">
            <span class="am-icon-code"></span>签到记录表
        </div>
        <div class="tpl-portlet-input tpl-fz-ml">
            <div class="portlet-input input-small input-inline">
                <div class="input-icon right">
                    <i class="am-icon-search"></i>
                    <input type="text" class="form-control form-control-solid" placeholder="搜索..."> </div>
            </div>
        </div>
    </div>
    <div class="tpl-block">
        <div class="am-g">
            <div class="am-u-sm-12 am-u-md-6">
                <div class="am-btn-toolbar">
             
                </div>
            </div>
            <div class="am-u-sm-12 am-u-md-3">
            </div>
            <div class="am-u-sm-12 am-u-md-3">
                <div class="am-input-group am-input-group-sm">
                    <input type="text" class="am-form-field">
                                <span class="am-input-group-btn">
            <button class="am-btn  am-btn-default am-btn-success tpl-am-btn-success am-icon-search" type="button"></button>
          </span>
                </div>
            </div>
        </div>
        <div class="am-g">
            <div class="am-u-sm-12">
                <form class="am-form">
                    <table class="am-table am-table-striped am-table-hover table-main">
                        <thead>
                        <tr>
							<th class="table-check"><input type="checkbox" id="check_rule_all" class="tpl-table-fz-check" /></th>
                            <th class="table-id">ID</th>
                            <th class="table-title">嫌犯ID </th>
                            <th class="table-author am-hide-sm-only">嫌犯姓名</th>
                            <th class="table-type">签到时间</th>
                            <th class="table-set">操作</th>
                        </tr>
                        </thead>
                        <?php if(is_array($signlist) || $signlist instanceof \think\Collection || $signlist instanceof \think\Paginator): $i = 0; $__LIST__ = $signlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <tr>
							<td><input type="checkbox" class="ids" /></td>
                            <td><?php echo $vo['Id']; ?></td>
                            <td><a href="#"><?php echo $vo['mid']; ?></a></td>
                            <td><?php echo $vo['membername']; ?></td>
                            <td class="am-hide-sm-only"><?php echo $vo['pubdate']; ?></td>
                            <!-- <td class="am-hide-sm-only"><a href="#"><?php echo !empty($vo['status'])?"通过":"不通过"; ?></a></td> -->
                            <td>
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs">
                                        <a href="<?php echo url('Index/sign_del',['Id'=>$vo['Id']]); ?>" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                    <div class="am-cf">
                        <div class="am-fr">
                            <ul class="am-pagination tpl-pagination">
                               <?php echo $page; ?>
                            </ul>
                        </div>
                    </div>
                    <hr>
                </form>
            </div>
        </div>
    </div>
    <div class="tpl-alert"></div>
</div>
<script src="__STATIC__assets/js/jquery.min.js"></script>
<script src="__STATIC__assets/js/amazeui.min.js"></script>
<script src="__STATIC__assets/js/app.js"></script>
</body>
</html>
<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:77:"D:\phpStudy\WWW\prison\public/../application/admin\view\index\offer_list.html";i:1496661510;s:72:"D:\phpStudy\WWW\prison\public/../application/admin\view\public\head.html";i:1496286527;s:72:"D:\phpStudy\WWW\prison\public/../application/admin\view\public\foot.html";i:1496279236;}*/ ?>
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
            <span class="am-icon-code"></span>购物审核列表
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
                    <div class="am-btn-group am-btn-group-xs">
                        <a href="<?php echo url('Index/offer_add'); ?>" type="button" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span> 新增</a>
                        <button type="button" class="am-btn am-btn-default am-btn-warning"><span class="am-icon-archive"></span> 审核</button>
                        <button id="del_offer_all" type="button" class="am-btn am-btn-default am-btn-danger"><span class="am-icon-trash-o"></span> 删除</button>
                    </div>
                </div>
            </div>
            <div class="am-u-sm-12 am-u-md-3">
                <div class="am-form-group">
                    <select data-am-selected="{btnSize: 'sm'}">
                        <option value="option1">所有类别</option>
                        <option value="option2">法律法规</option>
                        <option value="option3">司法流程</option>
                    </select>
                </div>
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
                            <th class="table-check"><input type="checkbox" id="check_offer_all" class="tpl-table-fz-check"></th>
                            <th class="table-id">ID</th>
                            <th class="table-title">嫌疑犯ID/姓名 </th>
                            <th class="table-author am-hide-sm-only">商品ID/名称</th>
                            <th class="table-type">申请时间</th>
                            <th class="table-date am-hide-sm-only">状态</th>
                            <th class="table-date am-hide-sm-only">商品数量</th>
                            <th class="table-set">操作</th>
                        </tr>
                        </thead>
                        <?php if(is_array($offerlist) || $offerlist instanceof \think\Collection || $offerlist instanceof \think\Paginator): $i = 0; $__LIST__ = $offerlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <tr>
                            <td><input type="checkbox" class="ids" value="<?php echo $vo['Id']; ?>"></td>
                            <td><?php echo $vo['Id']; ?></td>
                            <td><a href="#"><?php echo $vo['sid']; ?>/<?php echo $vo['membername']; ?></a></td>
                            <td><?php echo $vo['gid']; ?>/<?php echo $vo['goodsname']; ?></td>
                            <td class="am-hide-sm-only"><?php echo date("Y-m-d",$vo['pubdate']); ?></td>
                            <td class="am-hide-sm-only"><a href="#"><?php echo !empty($vo['status'])?"通过":"不通过"; ?></a></td>
                            <td class="am-hide-sm-only"><?php echo $vo['nums']; ?></td>
                            <td>
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs">
                                        <a href="<?php echo url('Index/offer_up',['Id'=>$vo['Id']]); ?>" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</a>
                                        <a href="<?php echo url('Index/offer_del',['Id'=>$vo['Id']]); ?>" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</a>
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
<script type="text/javascript">
    $('#check_offer_all').click(function(){
        if($(this).is(':checked')){
            $('.ids').prop('checked',true);
        }else{
            $('.ids').prop('checked',false);
        }
    });
    $('#del_offer_all').click(function(){
        var idds='';
        $('.ids').each(function(){
            if($(this).is(':checked')){
                idds+=$(this).val()+',';
            }
        });
        idds=idds.substr(0,idds.length-1);
        window.location.href="/admin/index/offer_del/Id/"+idds;
    });
</script>
</body>

</html>
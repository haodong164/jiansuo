<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:79:"D:\phpStudy\WWW\prison\public/../application/admin\view\index\suspect_list.html";i:1496645794;s:72:"D:\phpStudy\WWW\prison\public/../application/admin\view\public\head.html";i:1496286527;s:72:"D:\phpStudy\WWW\prison\public/../application/admin\view\public\foot.html";i:1496279236;}*/ ?>
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
            <span class="am-icon-code"></span> 嫌犯列表
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
                                    <a href="<?php echo url('Index/suspect_add'); ?>" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span> 新增</a>
                                    <button type="button" id="shanchu_all" class="am-btn am-btn-default am-btn-danger"><span class="am-icon-trash-o"></span> 删除</button>
                                </div>
                            </div>
                        </div>
                        <div class="am-u-sm-12 am-u-md-3">
                            <div class="am-form-group">
                                <select data-am-selected="{btnSize: 'sm'}">
              <option value="option1">所有类别</option>
              <option value="option2">无期徒刑</option>
              <option value="option2">有期徒刑</option>

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
                                            <th class="table-check"><input type="checkbox" id="check_all" class="tpl-table-fz-check"></th>
                                            <th class="table-id">ID</th>
											<th class="table-id">头像</th>
                                            <th class="table-title">嫌疑犯名称</th>
                                            <th class="table-type">性别</th>
                                            <th class="table-author am-hide-sm-only">余额</th>
                                            <th class="table-date am-hide-sm-only">出生日期</th>
											<th class="table-date am-hide-sm-only">入狱时间</th>
                                            <th class="table-set">操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php if(is_array($find['data']) || $find['data'] instanceof \think\Collection || $find['data'] instanceof \think\Paginator): if( count($find['data'])==0 ) : echo "" ;else: foreach($find['data'] as $key=>$main): ?>
                                        <tr>
                                            <td><input type="checkbox" class="check_once" value="<?php echo $main['Id']; ?>"></td>
                                            <td><?php echo $main['Id']; ?></td>
											<td><img src="/Uploads/<?php echo $main['photo']; ?>" width="30px" height="30px;" alt=""></td>
                                            <td><a href="#"><?php echo $main['membername']; ?></a></td>
                                            <td><?php echo !empty($main['sex'])?'男':'女'; ?></td>
                                            <td class="am-hide-sm-only"><?php echo $main['money']; ?></td>
                                            <td class="am-hide-sm-only"><?php echo $main['birth']; ?></td>
											<td class="am-hide-sm-only"><?php echo $main['intime']; ?></td>
                                            <td>
                                                <div class="am-btn-toolbar">
                                                    <div class="am-btn-group am-btn-group-xs">
                                                        <a href="<?php echo url('Index/suspect_up',['Id'=>$main['Id']]); ?>" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</a>
                                                        <a href="<?php echo url('Index/suspect_del',['Id'=>$main['Id']]); ?>" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</a>
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
					当前有<?php echo $find['total']; ?>条数据,
					在第<?php echo $find['current_page']; ?>页
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
        </div>
    </div>
<script src="__STATIC__assets/js/jquery.min.js"></script>
<script src="__STATIC__assets/js/amazeui.min.js"></script>
<script src="__STATIC__assets/js/app.js"></script>
	<script type="text/javascript">
		$('#check_all').click(function(){	//单击总复选框执行{}
		if($(this).is(':checked')){         //判断单选框是否为选中状态
			$('.check_once').prop('checked',true);
		}else{
			$('.check_once').prop('checked',false);
		};

		});
		
		$('#shanchu_all').click(function(){
			
			var checks='';
			$('.check_once').each(function(){
				if($(this).is(':checked')){
					checks=checks+$(this).val()+',';
				}
			});		//遍历所有.check_once,有多少遍历多少
			checks=checks.substr(0,checks.length-1)
			window.location.href="/index.php/admin/index/suspect_del/Id/"+checks;
		});
	</script>
</body>

</html>
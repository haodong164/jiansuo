<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:74:"/data/home/bxu2711760022/htdocs/application/admin/view/index/offer_up.html";i:1501226266;s:71:"/data/home/bxu2711760022/htdocs/application/admin/view/public/head.html";i:1499651237;s:71:"/data/home/bxu2711760022/htdocs/application/admin/view/public/foot.html";i:1499651237;}*/ ?>
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

<div class="tpl-portlet-components">
    <div class="portlet-title">
        <div class="caption font-green bold">
            <span class="am-icon-code"></span> 申请修改
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
            <div class="tpl-form-body tpl-form-line">
                <form class="am-form tpl-form-line-form" method="post" action="<?php echo url('Index/offer_do_up'); ?>" enctype="multipart/form-data">
                    <div class="am-form-group">
                        <label for="user-name" class="am-u-sm-3 am-form-label">申请人Id <span class="tpl-form-line-small-title">Proposer</span></label>
                        <div class="am-u-sm-9">
                            <input type="hidden" name="Id" value="<?php echo $info['Id']; ?>" />
                            <input type="text" class="tpl-form-input" value="<?php echo $info['mid']; ?>" name="mid" placeholder="请输入申请人Id">
                            <small>请输入申请人Id。</small>
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-name" class="am-u-sm-3 am-form-label">商品Id <span class="tpl-form-line-small-title">Commodity</span></label>
                        <div class="am-u-sm-9">
                            <input type="text" class="tpl-form-input" value="<?php echo $info['goodsid']; ?>" name="goodsid"  placeholder="请输入商品Id">
                            <small>请输入商品Id</small>
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-name" class="am-u-sm-3 am-form-label">状态 <span class="tpl-form-line-small-title">state</span></label>
                        <div class="am-u-sm-9">
                            <input type="radio" class="tpl-form-input" <?php if($info['status']==1): ?>checked="checked"<?php endif; ?> name="status" value="1">同意
                            <input type="radio" class="tpl-form-input" <?php if($info['status']==0): ?>checked="checked"<?php endif; ?> name="status" value="0">未同意
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-name" class="am-u-sm-3 am-form-label">申请数量<span class="tpl-form-line-small-title">Amount</span></label>
                        <div class="am-u-sm-9">
                            <input type="text" class="tpl-form-input" value="<?php echo $info['nums']; ?>" name="nums" id="user-name" placeholder="请输入申请数量">
                            <small>请填写申请数量。</small>
                        </div>
                    </div>
                    <div class="am-form-group">
                        <div class="am-u-sm-9 am-u-sm-push-3">
                            <button type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
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
<script type="text/javascript">
    $(function() {
        $("#doc-form-file").change(function() {
            var $file = $(this);
            var fileObj = $file[0];
            var windowURL = window.URL || window.webkitURL;
            var dataURL;
            var $img = $("#preview");

            if(fileObj && fileObj.files && fileObj.files[0]){
                dataURL = windowURL.createObjectURL(fileObj.files[0]);
                $img.attr('src',dataURL);
            }else{
                dataURL = $file.val();
                var imgObj = document.getElementById("preview");
// 两个坑:
// 1、在设置filter属性时，元素必须已经存在在DOM树中，动态创建的Node，也需要在设置属性前加入到DOM中，先设置属性在加入，无效；
// 2、src属性需要像下面的方式添加，上面的两种方式添加，无效；
                imgObj.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
                imgObj.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = dataURL;

            }
        });
    });

</script>
</body>

</html>>
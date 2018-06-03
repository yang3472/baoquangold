<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>

    <!-- start: Meta -->
    <meta charset="utf-8">
    <title>后台管理系统</title>
    <meta name="description" content="后台管理系统">
    <meta name="author" content="Yang jing qin">
    <meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <!-- end: Meta -->
    <!-- start: Mobile Specific -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- end: Mobile Specific -->

<!-- start: CSS -->
<link id="bootstrap-style" href="/Public/admin/css/bootstrap.min.css" rel="stylesheet">
<link href="/Public/admin/css/bootstrap-responsive.min.css" rel="stylesheet">
<link id="base-style" href="/Public/admin/css/style.css" rel="stylesheet">
<link id="base-style-responsive" href="/Public/admin/css/style-responsive.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
<!-- end: CSS -->


<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<link id="ie-style" href="/Public/admin/css/ie.css" rel="stylesheet">
<![endif]-->

<!--[if IE 9]>
<link id="ie9style" href="/Public/admin/css/ie9.css" rel="stylesheet">
<![endif]-->

<!-- start: Favicon -->
<link rel="shortcut icon" href="/Public/admin/img/favicon.ico">
<!-- end: Favicon -->

<link id="ie9style" href="/Public/common/css/page.css" rel="stylesheet">

    <link rel="stylesheet" href="/Public/kindeditor-4.1.10/themes/default/default.css" />
    <script charset="utf-8" src="/Public/kindeditor-4.1.10/kindeditor-min.js"></script>
    <script charset="utf-8" src="/Public/kindeditor-4.1.10/lang/zh_CN.js"></script>
    <style>
        textarea {
            display: block;
        }
    </style>
    <script>
        var editor;
        KindEditor.ready(function(K) {
            editor = K.create('textarea[name="detail"]', {
                allowFileManager : true
            });
            K('input[name=getHtml]').click(function(e) {
                alert(editor.html());
            });
            K('input[name=isEmpty]').click(function(e) {
                alert(editor.isEmpty());
            });
            K('input[name=getText]').click(function(e) {
                alert(editor.text());
            });
            K('input[name=clear]').click(function(e) {
                editor.html('');
            });
        });
    </script>
</head>

<body>
<!-- start: Header -->
<div class="navbar">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="index.html"><span>后台管理系统</span></a>
            <!-- start: Header Menu -->
            <div class="nav-no-collapse header-nav">
                <ul class="nav pull-right">

                    <!-- start: User Dropdown -->
                    <li class="dropdown">
                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="halflings-icon white user"></i> <?php echo (cookie('admin_name')); ?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo (C("INDEX_MODE")); ?>/admin/user/editInfo.html?id=<?php echo (cookie('admin_id')); ?>"><i class="halflings-icon user"></i>账号设置</a></li>
                            <li><a href="<?php echo (C("INDEX_MODE")); ?>/admin/login/logout"><i class="halflings-icon off"></i> 退出</a></li>
                        </ul>
                    </li>
                    <!-- end: User Dropdown -->
                </ul>
            </div>
            <!-- end: Header Menu -->

        </div>
    </div>
</div><!--头部-->

<div class="container-fluid-full" style="height: 600px;overflow: auto" >
    <div class="row-fluid">

        <!-- start: Main Menu -->
        <div id="sidebar-left" class="span2">
    <div class="nav-collapse sidebar-nav">
        <ul class="nav nav-tabs nav-stacked main-menu">
            <li <?php if($menu_id == 'leaveword'): ?>class="active" <?php else: ?> class=""<?php endif; ?> ><a href="<?php echo (C("INDEX_MODE")); ?>/admin/leaveword/index.html"><i class="icon-envelope"></i><span class="hidden-tablet"> 留言管理</span></a></li>
            <li>
                <a class="dropmenu" href="#"><i class="icon-tasks"></i><span>产品管理</span></a>
                <ul>
                    <li <?php if($menu_id == 'product_list'): ?>class="active" <?php else: ?> class=""<?php endif; ?> ><a class="submenu" href="<?php echo (C("INDEX_MODE")); ?>/admin/product/index.html">&nbsp;&nbsp;<i class="icon-file-alt"></i><span class="hidden-tablet">产品列表</span></a></li>
                    <li <?php if($menu_id == 'product_edit'): ?>class="active" <?php else: ?> class=""<?php endif; ?>><a class="submenu" href="<?php echo (C("INDEX_MODE")); ?>/admin/product/edit.html">&nbsp;&nbsp;<i class="icon-file-alt"></i><span class="hidden-tablet">添加/编辑产品</span></a></li>
                </ul>
            </li>

            <li>
                <a class="dropmenu" href="#"><i class="icon-eye-open"></i><span class="hidden-tablet">广告管理</span></a>
                <ul>
                    <li <?php if($menu_id == 'adver_list'): ?>class="active" <?php else: ?> class=""<?php endif; ?> ><a class="submenu" href="<?php echo (C("INDEX_MODE")); ?>/admin/adver/index.html">&nbsp;&nbsp;<i class="icon-file-alt"></i><span class="hidden-tablet">广告列表</span></a></li>
                    <li <?php if($menu_id == 'adver_edit'): ?>class="active" <?php else: ?> class=""<?php endif; ?>><a class="submenu" href="<?php echo (C("INDEX_MODE")); ?>/admin/adver/edit.html">&nbsp;&nbsp;<i class="icon-file-alt"></i><span class="hidden-tablet">添加/编辑广告</span></a></li>
                </ul>
            </li>

            <li>
                <a class="dropmenu" href="#"><i class="icon-dashboard"></i><span class="hidden-tablet">新闻管理</span></a>
                <ul>
                    <li <?php if($menu_id == 'news_list'): ?>class="active" <?php else: ?> class=""<?php endif; ?> ><a class="submenu" href="<?php echo (C("INDEX_MODE")); ?>/admin/news/index.html">&nbsp;&nbsp;<i class="icon-file-alt"></i><span class="hidden-tablet">新闻列表</span></a></li>
                    <li <?php if($menu_id == 'news_edit'): ?>class="active" <?php else: ?> class=""<?php endif; ?>><a class="submenu" href="<?php echo (C("INDEX_MODE")); ?>/admin/news/edit.html">&nbsp;&nbsp;<i class="icon-file-alt"></i><span class="hidden-tablet">添加/编辑新闻</span></a></li>
                </ul>
            </li>
            <li>
                <a class="dropmenu" href="#"><i class="icon-edit"></i><span class="hidden-tablet">后台用户管理</span></a>
                <ul>
                    <li <?php if($menu_id == 'user_list'): ?>class="active" <?php else: ?> class=""<?php endif; ?> ><a class="submenu" href="<?php echo (C("INDEX_MODE")); ?>/admin/user/index.html">&nbsp;&nbsp;<i class="icon-file-alt"></i><span class="hidden-tablet">用户列表</span></a></li>
                    <li <?php if($menu_id == 'user_add'): ?>class="active" <?php else: ?> class=""<?php endif; ?>><a class="submenu" href="<?php echo (C("INDEX_MODE")); ?>/admin/user/addUser.html">&nbsp;&nbsp;<i class="icon-file-alt"></i><span class="hidden-tablet">添加/编辑用户</span></a></li>
                </ul>
            </li>

            <li <?php if($menu_id == 'delete_file'): ?>class="active" <?php else: ?> class=""<?php endif; ?> ><a href="<?php echo (C("INDEX_MODE")); ?>/admin/adver/deleteFile"><i class="icon-list-alt"></i><span class="hidden-tablet">清理垃圾图片</span></a></li>
        <!--
       <li><a href="typography.html"><i class="icon-font"></i><span class="hidden-tablet"> Typography</span></a></li>
       <li><a href="gallery.html"><i class="icon-picture"></i><span class="hidden-tablet"> Gallery</span></a></li>
       <li><a href="table.html"><i class="icon-align-justify"></i><span class="hidden-tablet"> Tables</span></a></li>
       <li><a href="calendar.html"><i class="icon-calendar"></i><span class="hidden-tablet"> Calendar</span></a></li>
       <li><a href="file-manager.html"><i class="icon-folder-open"></i><span class="hidden-tablet"> File Manager</span></a></li>
       <li><a href="icon.html"><i class="icon-star"></i><span class="hidden-tablet"> Icons</span></a></li>
       <li><a href="login.html"><i class="icon-lock"></i><span class="hidden-tablet"> Login Page</span></a></li>
       -->
        </ul>
    </div>
</div><!--左边菜单-->
        <!-- end: Main Menu -->

        <noscript>
            <div class="alert alert-block span10">
                <h4 class="alert-heading">Warning!</h4>
                <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
            </div>
        </noscript>

        <!-- start: Content -->
        <div id="content" class="span10">

            <ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="#">首页</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li><a href="#">产品管理</a><i class="icon-angle-right"></i></li>
                <li><a href="#">添加/编辑产品</a></li>
            </ul>

            <div class="box-content">
                <form class="form-horizontal">
                    <input type="hidden" id="id" value="<?php echo ($id); ?>">
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="product_type"><span style="color: red">*</span>产品分类</label>
                            <div class="controls">
                                <select name="product_type" id="product_type">
                                    <option value="0" >请选择产品分类</option>
                                    <?php if(is_array($productCategoryConfig)): foreach($productCategoryConfig as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>" <?php if($data["product_type"] == $vo["id"] ): ?>selected<?php endif; ?> ><?php echo ($vo["category_name"]); ?></option><?php endforeach; endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="product_name"><span style="color: red">*</span>产品名称</label>
                            <div class="controls">
                                <input class="input-xlarge" value="<?php echo ((isset($data["product_name"]) && ($data["product_name"] !== ""))?($data["product_name"]):''); ?>" id="product_name" placeholder="请输入产品名称" type="text">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="material"><span style="color: red">*</span>材质</label>
                            <div class="controls">
                                <input class="input-xlarge" value="<?php echo ((isset($data["material"]) && ($data["material"] !== ""))?($data["material"]):''); ?>" id="material" placeholder="请输入产品材质" type="text">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="weight"><span style="color: red">*</span>重量（单位：克）</label>
                            <div class="controls">
                                <input class="input-xlarge" value="<?php echo ((isset($data["weight"]) && ($data["weight"] !== ""))?($data["weight"]):''); ?>" id="weight" placeholder="请输入产品重量" type="text">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="spec"><span style="color: red">*</span>规格</label>
                            <div class="controls">
                                <input class="input-xlarge" value="<?php echo ((isset($data["spec"]) && ($data["spec"] !== ""))?($data["spec"]):''); ?>" id="spec" placeholder="请输入产品规格" type="text">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="purpose"><span style="color: red">*</span>用途</label>
                            <div class="controls">
                                <input class="input-xlarge" value="<?php echo ((isset($data["purpose"]) && ($data["purpose"] !== ""))?($data["purpose"]):''); ?>" id="purpose" placeholder="请输入产品用途" type="text">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="detail"><span style="color: red">*</span>产品详情</label>
                            <div class="controls">
                                <textarea name="detail" id="detail" style="width:800px;height:400px;visibility:hidden;"><?php echo ((isset($data["detail"]) && ($data["detail"] !== ""))?($data["detail"]):''); ?></textarea>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">
                                <span style="color: red">*</span>分类展示图（PC端）<br/>
                                <span>图片规格:385*385px</span><br/>
                                <a style="margin-right: 10px;color: red" href="/public/admin/img/class_example.png" target="_blank" >查看位置</a>
                            </label>
                            <div class="controls">
                                <input type="file" name="file_upload"  id="upload_img_1"  multiple="false" >
                                <input id="img_1" class="input-xlarge" readonly type="text" value="<?php echo ((isset($data["img_1"]) && ($data["img_1"] !== ""))?($data["img_1"]):''); ?>"  style="width: 350px" >
                                <span class="btn btn-small btn-danger" style="cursor: pointer" onclick="clearImg('img_1')" >清除</span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">分类展示图（手机端）</label>
                            <div class="controls">
                                <input type="file" name="file_upload"  id="upload_img_2" multiple="false" >
                                <input id="img_2" class="input-xlarge" readonly type="text" value="<?php echo ((isset($data["img_2"]) && ($data["img_2"] !== ""))?($data["img_2"]):''); ?>" style="width: 350px" >
                                <span class="btn btn-small btn-danger" style="cursor: pointer"  onclick="mobile_img_same_pc(2,1)" >同PC端</span>
                                <span class="btn btn-small btn-danger" style="cursor: pointer" onclick="clearImg('img_2')" >清除</span>
                            </div>
                        </div>
                        <div style="border-top: 1px dashed #ccc;margin-bottom: 10px"></div>
                        <div class="control-group">
                            <label class="control-label">
                                <span style="color: red">*</span>列表展示图（PC端）<br/>
                                <span>图片规格:282*260px</span><br/>
                                <a style="margin-right: 10px;color: red" href="/public/admin/img/img_list.png" target="_blank" >查看位置</a>
                            </label>
                            <div class="controls">
                                <input type="file" name="file_upload"  id="upload_img_3"  multiple="false" >
                                <input id="img_3" class="input-xlarge" readonly type="text" value="<?php echo ((isset($data["img_3"]) && ($data["img_3"] !== ""))?($data["img_3"]):''); ?>" style="width: 350px" >
                                <span class="btn btn-small btn-danger" style="cursor: pointer" onclick="clearImg('img_3')" >清除</span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">列表展示图（手机端）</label>
                            <div class="controls">
                                <input type="file" name="file_upload"  id="upload_img_4" multiple="false" >
                                <input id="img_4" class="input-xlarge" readonly type="text" value="<?php echo ((isset($data["img_4"]) && ($data["img_4"] !== ""))?($data["img_4"]):''); ?>" style="width: 350px" >
                                <span class="btn btn-small btn-danger" style="cursor: pointer"  onclick="mobile_img_same_pc(4,3)" >同PC端</span>
                                <span class="btn btn-small btn-danger" style="cursor: pointer" onclick="clearImg('img_4')" >清除</span>
                            </div>
                        </div>
                        <div style="border-top: 1px dashed #ccc;margin-bottom: 10px"></div>
                        <div class="control-group">
                            <label class="control-label">详情页轮播图（pc端）<br/><span style="color: #ff0000;font-size: 12px;">按住ctrl键可选择多张</span></label>
                            <div class="controls">
                                <input type="file" name="file_upload"  id="upload_img_5" multiple="true" >
                                <div id="img5_queue"></div>
                                <textarea id="img_5" style="width: 400px; height: 100px;margin-bottom: 12px" readonly ><?php echo ((isset($data["img_5"]) && ($data["img_5"] !== ""))?($data["img_5"]):''); ?></textarea><br/>
                                <a class="btn btn-small btn-danger" href="javascript:$('#upload_img_5').uploadify('upload','*')">开始上传</a>
                                <span class="btn btn-small btn-danger" style="cursor: pointer" onclick="clearImg('img_5')" >清除</span>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">详情页轮播图（手机端）<br/><span style="color: #ff0000;font-size: 12px;">按住ctrl键可选择多张</span></label>
                            <div class="controls">
                                <input type="file" name="file_upload"  id="upload_img_6" multiple="true" >
                                <div id="img6_queue"></div>
                                <textarea id="img_6" style="width: 400px; height: 100px;margin-bottom: 10px" readonly ><?php echo ((isset($data["img_6"]) && ($data["img_6"] !== ""))?($data["img_6"]):''); ?></textarea><br/>
                                <a class="btn btn-small btn-danger" href="javascript:$('#upload_img_6').uploadify('upload','*')">开始上传</a>
                                <span class="btn btn-small btn-danger" style="cursor: pointer"  onclick="mobile_img_same_pc(6,5)" >同PC端</span>
                                <span class="btn btn-small btn-danger" style="cursor: pointer" onclick="clearImg('img_6')" >清除</span>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="button" id="submit" class="btn btn-primary">提交</button>
                        </div>
                    </fieldset>
                </form>
            </div><!--/.fluid-container-->
            <!-- end: Content -->
        </div><!--/#content.span10-->
    </div><!--/fluid-row-->
</div>

<!-- start: JavaScript-->

<script src="/Public/admin/js/jquery-1.9.1.min.js"></script>
<script src="/Public/admin/js/jquery-migrate-1.0.0.min.js"></script>

<script src="/Public/admin/js/jquery-ui-1.10.0.custom.min.js"></script>

<script src="/Public/admin/js/jquery.ui.touch-punch.js"></script>

<script src="/Public/admin/js/modernizr.js"></script>

<script src="/Public/admin/js/bootstrap.min.js"></script>

<script src="/Public/admin/js/jquery.cookie.js"></script>

<script src='/Public/admin/js/fullcalendar.min.js'></script>

<script src='/Public/admin/js/jquery.dataTables.min.js'></script>

<script src="/Public/admin/js/excanvas.js"></script>
<script src="/Public/admin/js/jquery.flot.js"></script>
<script src="/Public/admin/js/jquery.flot.pie.js"></script>
<script src="/Public/admin/js/jquery.flot.stack.js"></script>
<script src="/Public/admin/js/jquery.flot.resize.min.js"></script>

<script src="/Public/admin/js/jquery.chosen.min.js"></script>

<script src="/Public/admin/js/jquery.uniform.min.js"></script>

<script src="/Public/admin/js/jquery.cleditor.min.js"></script>

<script src="/Public/admin/js/jquery.noty.js"></script>

<script src="/Public/admin/js/jquery.elfinder.min.js"></script>

<script src="/Public/admin/js/jquery.raty.min.js"></script>

<script src="/Public/admin/js/jquery.iphone.toggle.js"></script>

<script src="/Public/admin/js/jquery.uploadify-3.1.min.js"></script>

<script src="/Public/admin/js/jquery.gritter.min.js"></script>

<script src="/Public/admin/js/jquery.imagesloaded.js"></script>

<script src="/Public/admin/js/jquery.masonry.min.js"></script>

<script src="/Public/admin/js/jquery.knob.modified.js"></script>

<script src="/Public/admin/js/jquery.sparkline.min.js"></script>

<script src="/Public/admin/js/counter.js"></script>

<script src="/Public/admin/js/retina.js"></script>

<script src="/Public/admin/js/custom.js"></script>

<script src="/Public/admin/js/common.js"></script>

<!-- end: JavaScript-->
<script>
    $('.active').parent().slideDown();
</script>

<script language="JavaScript" type="text/javascript">
    if (navigator.userAgent.indexOf('Firefox') < 0) {
        $('body').html('<h1 style="padding-top: 100px ;text-align: center" >为了呈现更好的效果，请使用火狐浏览器。</h1>');
    }
</script><!--底部-->

<script src="/Public/uploadify/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="/Public/uploadify/uploadify.swf"></script>
<script src="/Public/uploadify/jquery.uploadify.min.js"></script>

</body>
</html>
<script>
    $('#submit').click(function(){
        var id=$('#id').val();
        var product_type=$('#product_type').val().trim();
        var product_name=$('#product_name').val().trim();
        var material=$('#material').val().trim();
        var weight=$('#weight').val().trim();
        var spec=$('#spec').val().trim();
        var purpose=$('#purpose').val().trim();
        var detail=editor.html().trim();
        var img_1=$('#img_1').val();
        var img_2=$('#img_2').val();
        var img_3=$('#img_3').val();
        var img_4=$('#img_4').val();
        var img_5=$('#img_5').val();
        var img_6=$('#img_6').val();
        if(img_1=='' || img_1.indexOf('/')==-1){
            alert('请上传分类展示图（PC端）');
            return;
        }
        if(img_3=='' || img_3.indexOf('/')==-1){
            alert('列表展示图（PC端）');
            return;
        }
        if(img_2.indexOf('/')==-1){
            img_2='';
        }
        if(img_4.indexOf('/')==-1){
            img_4='';
        }
        if(product_type=='0'){
            alert('请选择产品分类');
            return;
        }
        if(product_name==''){
            alert('请输入产品名称');
            return;
        }
        if(material==''){
            alert('请输入产品材质');
            return;
        }
        if(weight==0 || isNaN(weight)){
            alert('请输入产品重量');
            return;
        }
        if(spec==''){
            alert('请输入产品规格');
            return;
        }
        if(purpose==''){
            alert('请输入产品用途');
            return;
        }
        if(detail==''){
            alert('请输入产品详情');
            return;
        }
        var data={
                    id: id,
                    product_type: product_type,
                    product_name: product_name,
                    material: material,
                    weight: weight,
                    spec: spec,
                    purpose: purpose,
                    detail: detail,
                    img_1: img_1,
                    img_2: img_2,
                    img_3: img_3,
                    img_4: img_4,
                    img_5: img_5,
                    img_6: img_6
                };

        $.ajax({
            type: 'POST',
            url: INDEX_MODE+'/admin/product/edit',
            data: data,
            success: function(dt){
               if(dt=='1'){
                   alert('操作成功');
               }else{
                   alert('操作失败');
               }
            }
        });

    });
</script>
<script type="text/javascript">
    <?php $timestamp = time();?>

    $(function() {
        $('#upload_img_1').uploadify({
            'formData'     : {
                'timestamp' : '<?php echo $timestamp;?>',
                'token'     : '<?php echo md5('unique_salt' . $timestamp);?>',
                'folder':'product/'
            },
            'swf'      : '/Public/uploadify/uploadify.swf',
            'uploader' : INDEX_MODE+'/admin/uploadify/upload',
            'buttonText':'选择图片',
            'multi': false,
            'onUploadSuccess': function (fileObj, data, response) {
                $('#img_1').val(data);
            }
        });
    });

    $(function() {
        $('#upload_img_2').uploadify({
            'formData'     : {
                'timestamp' : '<?php echo $timestamp;?>',
                'token'     : '<?php echo md5('unique_salt' . $timestamp);?>',
                'folder':'product/'
            },
            'swf'      : '/Public/uploadify/uploadify.swf',
            'uploader' : INDEX_MODE+'/admin/uploadify/upload',
            'buttonText':'选择图片',
            'multi': false,
            'onUploadSuccess': function (fileObj, data, response) {
                $('#img_2').val(data);
            }
        });
    });

    $(function() {
        $('#upload_img_3').uploadify({
            'formData'     : {
                'timestamp' : '<?php echo $timestamp;?>',
                'token'     : '<?php echo md5('unique_salt' . $timestamp);?>',
                'folder':'product/'
            },
            'swf'      : '/Public/uploadify/uploadify.swf',
            'uploader' : INDEX_MODE+'/admin/uploadify/upload',
            'buttonText':'选择图片',
            'multi': false,
            'onUploadSuccess': function (fileObj, data, response) {
                $('#img_3').val(data);
            }
        });
    });

    $(function() {
        $('#upload_img_4').uploadify({
            'formData'     : {
                'timestamp' : '<?php echo $timestamp;?>',
                'token'     : '<?php echo md5('unique_salt' . $timestamp);?>',
                'folder':'product/'
            },
            'swf'      : '/Public/uploadify/uploadify.swf',
            'uploader' : INDEX_MODE+'/admin/uploadify/upload',
            'buttonText':'选择图片',
            'multi': false,
            'onUploadSuccess': function (fileObj, data, response) {
                $('#img_4').val(data);
            }
        });
    });


    $(function() {
        $('#upload_img_5').uploadify({
            'formData'     : {
                'timestamp' : '<?php echo $timestamp;?>',
                'token'     : '<?php echo md5('unique_salt' . $timestamp);?>',
                'folder':'product/'
            },
            'swf'      : '/Public/uploadify/uploadify.swf',
            'uploader' : INDEX_MODE+'/admin/uploadify/upload',
            'buttonText':'选择图片',
            'multi': true,
            'auto':false,
            'queueID':'img5_queue',
            'onUploadSuccess': function (fileObj, data, response) {
                var pre_img_url= $('#img_5').val();
                if(pre_img_url!=''){
                    img_url=pre_img_url+';\r\n'+data;
                }else{
                    img_url=data;
                }
                $('#img_5').val( img_url);
            }
        });
    });

    $(function() {
        $('#upload_img_6').uploadify({
            'formData'     : {
                'timestamp' : '<?php echo $timestamp;?>',
                'token'     : '<?php echo md5('unique_salt' . $timestamp);?>',
                'folder':'product/'
            },
            'swf'      : '/Public/uploadify/uploadify.swf',
            'uploader' : INDEX_MODE+'/admin/uploadify/upload',
            'buttonText':'选择图片',
            'multi': true,
            'auto':false,
            'queueID':'img6_queue',
            'onUploadSuccess': function (fileObj, data, response) {
                var pre_img_url= $('#img_6').val();
                if(pre_img_url!=''){
                    img_url=pre_img_url+';\r\n'+data;
                }else{
                    img_url=data;
                }
                $('#img_6').val( img_url);
            }
        });
    });

    function mobile_img_same_pc(target,orgin){
        var img=$('#img_'+orgin).val();
        if(img==undefined || img==''){
            return ;
        }
        $('#img_'+target).val( img  );
        return ;
    }

    function clearImg(obj){
        $('#'+obj).val('');
    }
</script>
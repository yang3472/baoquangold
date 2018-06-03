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

    <script type="text/javascript" src="/Public/common/js/date/WdatePicker.js"></script>
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
                <li><a href="#">广告管理</a><i class="icon-angle-right"></i></li>
                <li><a href="#">广告列表</a></li>
            </ul>

            <div class="panel-body">
                <form class="search_form" action="" method="get">
                    <div class="form-inline" style="margin-bottom: 10px">
                        <select name="position" id="position">
                            <option value="" >广告位置</option>
                            <?php if(is_array($position_config)): foreach($position_config as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>" <?php if($_GET['position']== $vo["id"] ): ?>selected<?php endif; ?> ><?php echo ($vo["remark"]); ?></option><?php endforeach; endif; ?>
                        </select>
                        <label for="start_time">添加时间：</label>
                        <input type="text" class="form-control" placeholder="开始时间" name="start_time" id="start_time" value="<?php echo ($_GET['start_time']); ?>"
                               style="width: 150px" onclick="WdatePicker()">
                        <label for="end_time">-</label>
                        <input type="email" class="form-control" placeholder="结束时间" name="end_time" id="end_time"
                               value="<?php echo ($_GET['end_time']); ?>" style="width: 150px" onclick="WdatePicker()">
                        <button type="button" class="btn btn-primary" onclick="javascript:$('.search_form').submit()" >搜索</button>
                    </div>
                </form>

                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>位置</th>
                        <th>图片</th>
                        <th>跳转地址</th>
                        <th>标题</th>
                        <th>描述</th>
                        <th>排序</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($data)): foreach($data as $key=>$vo): ?><tr>
                        <td style="vertical-align: middle">
                            <?php if(is_array($position_config)): foreach($position_config as $key=>$vp): if($vo["position"] == $vp[id]): echo ($vp["remark"]); endif; endforeach; endif; ?>
                        </td>
                        <td style="vertical-align: middle"><img src="<?php echo ($vo["img_url"]); ?>"></td>
                        <td style="vertical-align: middle"><?php echo ($vo["href_url"]); ?> <a href="<?php echo (C("INDEX_MODE")); echo ($vo["href_url"]); ?>" target="_blank" >点击查看</a></td>
                        <td style="vertical-align: middle"><?php echo ($vo["title"]); ?></td>
                        <td style="vertical-align: middle"><?php echo ($vo["descrip"]); ?></td>
                        <td style="vertical-align: middle"><?php echo ($vo["order_sort"]); ?></td>
                        <td style="vertical-align: middle">
                            <a href="<?php echo (C("INDEX_MODE")); ?>/admin/adver/edit?id=<?php echo ($vo["id"]); ?>" class="badge badge-success" style="cursor: pointer">编辑</a>
                            <a href="javascript:void(0)" onclick="del(<?php echo ($vo["id"]); ?>)" class="badge label-important" style="cursor: pointer">删除</a>
                        </td>
                    </tr><?php endforeach; endif; ?>
                    </tbody>
                </table>
            </div>
            <div  style="float: right" class="sabrosus"><?php echo ($page); ?></div>
        </div><!--/.fluid-container-->
        <!-- end: Content -->
    </div><!--/#content.span10-->
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

</body>
</html>
<script>
    function del(id){
        if(confirm('你确定要删除吗？')){
            MyPost(INDEX_MODE+'/admin/adver/delAdver',
                    {
                        id: id
                    },
                    null,
                    null,
                    function (data) {
                        window.location.reload();
                    },
                    function (data, msg, code) {
                        alert(msg);
                    }
            );
        }

    }
</script>
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


    <style type="text/css">
        body { background: url(/Public/admin/img/bg-login.jpg) !important; }
    </style>

</head>

<body>

<div class="container-fluid-full">
    <div class="row-fluid">

        <div class="row-fluid">
            <div class="login-box">
                <div class="icons">
                    <a href="index.html"><i class="halflings-icon home"></i></a>
                    <a href="#"><i class="halflings-icon cog"></i></a>
                </div>
                <h2>Login to your account</h2>
                <form class="form-horizontal" action="index.html" method="post">
                    <fieldset>

                        <div class="input-prepend" title="Username">
                            <span class="add-on"><i class="halflings-icon user"></i></span>
                            <input class="input-large span10" name="user_name" id="user_name" type="text" placeholder="type username"/>
                        </div>
                        <div class="clearfix"></div>

                        <div class="input-prepend" title="Password">
                            <span class="add-on"><i class="halflings-icon lock"></i></span>
                            <input class="input-large span10" name="password" id="password" type="password" placeholder="type password"/>
                        </div>
                        <div class="clearfix"></div>

                        <div class="button-login">
                            <button type="button" onclick="login()" class="btn btn-primary">Login</button>
                        </div>
                        <div class="clearfix"></div>
                </form>


            </div><!--/span-->
        </div><!--/row-->


    </div><!--/.fluid-container-->

</div><!--/fluid-row-->

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

<script language="JavaScript" type="text/javascript">
    if (navigator.userAgent.indexOf('Firefox') < 0) {
        $('body').html('<h1 style="padding-top: 100px ;text-align: center" >为了呈现更好的效果，请使用火狐浏览器。</h1>');
    }
</script>

</body>
</html>
<script>
    function login(){
        var user_name=$('#user_name').val().trim();
        var password=$('#password').val().trim();
        MyPost(INDEX_MODE+'/admin/login/login',
                {
                    user_name: user_name,
                    password: password
                },
                null,
                null,
                function (data) {
                    JumpUrl(INDEX_MODE+'/admin/leaveword/index');
                },
                function (data, msg, code) {
                    alert(msg);
                }
        );
    }
</script>
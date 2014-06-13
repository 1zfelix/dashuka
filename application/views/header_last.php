<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <script src="<?=base_url('js/jquery.min.js')?>"></script>
    <link rel="shortcut icon" href="<?=base_url('images/favicon.png')?>">
    
    <link href="<?=base_url('css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
    <script src="<?=base_url('js/bootstrap.min.js')?>"></script>
    <!-- 
    <script src="<?=base_url('js/headroom.min.js')?>"></script>
    <script src="<?=base_url('js/jQuery.headroom.min.js')?>"></script>
 -->
 <!--    <link href="<?=base_url('css/semantic.min.css')?>" rel="stylesheet" type="text/css">
    <script src="<?=base_url('js/semantic.min.js')?>"></script>
   -->  
    <link href="<?=base_url('css/docs-new.css')?>" rel="stylesheet" type="text/css" />
    <!-- <link href="<?=base_url('css/animate.css')?>" rel="stylesheet" type="text/css" /> -->
    
    
    
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
<script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.min.js"></script>
<script src="http://cdn.bootcss.com/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
<!-- 
    <script type="text/javascript">
    $(document).ready(function() {
        $("#header0").headroom({
            "tolerance": 50,
            "offset": 0,
            "classes": {
                "initial": "animated", //"fadeInDown",
                "pinned": "slideInDown", //"fadeInDown",
                "unpinned": "slideOutUp" //"fadeOutUp"
            }
        });
    });
    </script>
 -->
    <title>
        <?php if(isset($title)){ echo $title. "-";}?>Dashuka</title>

</head>

<body>
    <div id="wrapper" class="clearfix">

        <!-- <div id="header0" class="navbar navbar-inverse navbar-fixed-top header--fixed animated" role="navigation"> -->
        <div id="header0" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#login" style="padding: 7.5px 10px; margin-top: 6px; margin-bottom: 6px;">
                        <span class="navbar-text">登录</span>
                    </button> -->
                    <a class="navbar-brand" href="<?=base_url('index.php')?>">5145</a>
                </div>


               <!--  <nav class="navbar-collapse collapse" id="login">
                    <form action="<?=base_url('index.php/go/login')?>" class="navbar-form navbar-right" role="form" method="post">
                        <div class="form-group">
                            <input type="text" placeholder="用户名" class="form-control" name="username">
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="密码" class="form-control" name="password">
                        </div>
                        <button type="submit" class="btn btn-success">登录</button>
                        <button type="button" class="btn btn-warning">注册</button>
                    </form>
                </nav> -->

            </div>
        </div>

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
    <script src="<?=base_url('js/jquery.form.js')?>"></script>
    <link rel="shortcut icon" href="<?=base_url('images/favicon.png')?>">
    
    <link href="<?=base_url('css/semantic.min.css')?>" rel="stylesheet" type="text/css">
    <script src="<?=base_url('js/semantic.min.js')?>"></script>  
    
    <link href="<?=base_url('css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
    <script src="<?=base_url('js/bootstrap.min.js')?>"></script>
    <!-- 
    <script src="<?=base_url('js/headroom.min.js')?>"></script>
    <script src="<?=base_url('js/jQuery.headroom.min.js')?>"></script>
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
 <?php error_reporting(E_ERROR | E_WARNING | E_PARSE);?>
    <title>
        <?php if(isset($title)){ echo $title. "-";}?>格子</title>
        <?php
            $burl = '';
            global $burl;
            $burl = $_SERVER['HTTP_REFERER'];
        ?>
</head>

<body>
    <div id="wrapper" class="clearfix">

        <!-- <div id="header0" class="navbar navbar-inverse navbar-fixed-top header--fixed animated" role="navigation"> -->
        <div id="header0" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#login" style="padding: 7.5px 10px; margin-top: 6px; margin-bottom: 6px;">
                        <span class="navbar-text">登录</span>
                    </button>
                    <a class="navbar-brand" href="<?=base_url('index.php')?>">格子书店</a>
                </div>
<!-- 
                <?php
                    if (isset($title) && $title=='index') {
                ?>
                    <a class="btn btn-info navbar-btn navbar-right" href="<?=base_url('index.php/go/service')?>">服务</a>
                <?php
                    }
                ?> -->
                <nav id="navLogIn" class="navbar-collapse collapse">
                    <form id="hdLogInForm" class="navbar-form navbar-right" role="form" method="post">
                        <div class="form-group">
                            <input type="text" placeholder="用户名" class="form-control" name="usr">
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="密码" class="form-control" name="pwd">
                        </div>
                        <button type="button" class="btn btn-success" id="hdLogIn">登录</button>
                        <a type="button" class="btn btn-warning" id="hdReg" href="<?=base_url('index.php/go/goToRegPage')?>">注册</a>
                    </form>

                    <ul id="hdLogged" class="nav navbar-nav navbar-right" style="display:none">
                        <li>
                            <p class='navbar-text' id='hdLogWc'>
                                
                                <!-- <small><a href='#' class='hdLogOut'>注销</a></small> -->
                            </p>
                        </li>
                    </ul>

                </nav>

            </div>
        </div>

<script type="text/javascript">
function headerCheckLoggedIn()
{
    var flag,usr;
    $.ajax({
        url: '<?=base_url('index.php/go/logstatus')?>',
        async: false,
        success: function(data){
            if (data == 'n') {
                flag = false;
            }
            else {
                flag = true;
                usr = data;
            }
        }
    });
    if (!flag) {
        return false;
    }
    loggedInHeader(usr);
    return true;
}
function loggedInHeader(usr)
{
    $('#hdLogInForm').hide();
    $('#hdLogWc').html("hello, "+usr+"&nbsp;<small><a class='hdLogOut' onclick='javascript:logOutClick();'>注销</a></small>");
    if (<?=$last?>==1) $('.hdLogOut').hide();
    $('#hdLogged').show();
    // $("#navLogIn").html("<ul class='nav navbar-nav navbar-right'><li><p class='navbar-text'>hello, "+usr+"&nbsp;<small><a href='#' id='hdLogOut'>注销</a><small></p></li></ul>");
    // $("#navLogIn").html('<p class="navbar-right navbar-text">hello, '+usr+'&nbsp;&nbsp;<small><a id="hdLogOut"></a></small></p>');
}
function logOutClick()
{
    $.ajax({
        url:'<?=base_url('index.php/go/logout')?>',
        success:function(data){
            alert('确定注销?');
            $('#hdLogged').hide();
            $('#hdLogWc').html("");
            $('#hdLogInForm').show();
        }
    });
}

$(function(){
    headerCheckLoggedIn();
    $('#hdLogIn').click(function(){
        $('#header0 input').parent('.form-group').removeClass('has-error');
        if ($("#header0 input[name='usr']").val() == ''){
            $("#header0 input[name='usr']").parent('.form-group').addClass('has-error');
            return false;
        }
        if ($("#header0 input[name='pwd']").val() == ''){
            $("#header0 input[name='pwd']").parent('.form-group').addClass('has-error');
            return false;
        }
        $('#hdLogInForm').ajaxSubmit({
            url:'<?=base_url('index.php/go/login')?>',
            success:function(data){
                console.log(data);
                data = JSON.parse(data);
                if (data[0] == 'u'){
                    $("#header0 input[name='usr']").parent('.form-group').addClass('has-error');
                    return false;
                }
                else if (data[0] == 'p'){
                    $("#header0 input[name='pwd']").parent('.form-group').addClass('has-error');
                    return false;
                }
                else if (data[0] == 'y'){
                    loggedInHeader(data[1]);
                }
                else if (data[0] == 'a'){
                    $("#admin").show();
                }
            }
        });
    });

});
</script>
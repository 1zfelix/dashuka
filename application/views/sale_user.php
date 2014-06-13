<?php $this->load->view('header');?>

<?php $this->load->view('sale_sidebar');?>

<div class="container">
    <div class="row .Book" style="margin: 0 50px; padding-top: 40px; text-align: left">
        <div class="alert alert-success">
            请在左侧"已添加的书"中查看出售书籍信息
        </div>
    </div>
    <!-- <pre class="xdebug-var-dump" dir="ltr"><b>添加的书籍</b> <i>(size=4)</i>
          0 <font color="#888a85">=&gt;</font> <small>string</small> <font color="#cc0000">'开放源代码的Web服务高级编程'</font> <i>(length=39)</i>
    </pre> -->
    <div class="row" style="margin: 0 50px; padding: 40px 0">
        
        <form class="form-horizontal" action="<?=base_url('index.php/go/bookstorage')?>" method="post">

            <div class="form-group">
                <label for="contact" class="col-lg-3 control-label">手机号</label>
                <div class="col-lg-8">
                    <!-- <div class="input-group">
                        <span class="input-group-addon">手机号</span>
                        <input type="text" class="form-control FormInputItem User" name="contact" id="contact">
                    </div> -->
                    <input type="text" class="form-control FormInputItem User" name="contact" id="contact">

                </div>
            </div>


            <div class="form-group">
                <label for="type" class="col-lg-3 control-label">交易地点</label>
                <div class="col-lg-8">
                    <select class="form-control FormInputItem User" name="place" id="place">
                        <option value="none">请选择</option>
                        <option value="52">52斋</option>
                        <!-- <option value="dh">大活</option> -->
                    </select>
                </div>
            </div>
        </form>
    </div>

    <div class="row" style="margin: 0 50px;">
        <center>
            <form action="<?=base_url('index.php/go/succ')?>" method="post" id="totalInfoForm">
                <input type='hidden' id='YXM_here' />
                <input type='hidden' id="jsoninfo" name="jsoninfo"/>
                <br />
                <button type="button" id="YXM_submit_btn" disabled="disabled" class="btn btn-success">提交</button>
            </form>
        </center>
        <script type='text/javascript' charset='gbk' id='YXM_script' src='http://api.yinxiangma.com/api3/yzm.yinxiangma.php?pk=e890c698a353889605c123e923edf593&v=YinXiangMaJsSDK_4.0'></script>
        <script type='text/javascript'>
        function YXM_valided_true()
        {
            //验证码输入正确后的操作
            document.getElementById("YXM_submit_btn").disabled="";  
        }
        function YXM_valided_false()
        {
            //验证码输入错误后的操作
            document.getElementById("YXM_submit_btn").disabled="disabled";  
        }
        </script>
    </div>
</div>

<script>

function formInput2Json(data) {
    var userAttrCnt = $('.FormInputItem').size();
    var userInfo = '{';
    var i = 1;
    
    $('.FormInputItem').each(function(){
        userInfo += '"' + $(this).attr('name') + '":"' + $(this).val() + '"';
        if (i == userAttrCnt) {
            userInfo += '}';
        }
        else {
            userInfo += ',';
        }
        i++;
    })
    var myEscapedJSONString = data.replace(/\\n/g, "");

    userInfo = '{"bk":'+myEscapedJSONString+','+'"us":'+userInfo+'}';
    return userInfo;
}

function formInput2Json_S(data) {
    var userAttrCnt = $('.FormInputItem').size();
    var userInfo = '{';
    var i = 1;
    
    $('.FormInputItem').each(function(){
        userInfo += '"' + $(this).attr('name') + '":"' + $(this).val() + '"';
        if (i == userAttrCnt) {
            userInfo += '}';
        }
        else {
            userInfo += ',';
        }
        i++;
    })

    obj=JSON.parse(data);
    var ts = '[';
    for (var i = 0 ; i < obj.length ; i++) {
        ts += JSON.stringify(obj[i]['usr']);
        if ( i < obj.length - 1 ) {
            ts += ',';
        }
        else {
            ts += ']';
        }
    }
    var myEscapedJSONString = ts.replace(/\\n/g, "");

    userInfo = '{"bk":'+myEscapedJSONString+','+'"us":'+userInfo+'}';
    return userInfo;
}

function initSidebar() {
    $('#allBookSubmitBtn').hide();
    var obj = <?=$jsoninfo?>;
    obj = JSON.parse(obj);
    if (obj == '') { 
        return false;
    }
    $('.demo.sidebar .SidebarEmptyInfo').hide();

    var menuitem = '<div class="item"></div>';
    
    for (var i=0;i<obj.length;i++) {
        data = obj[i];
        $('.demo.sidebar .header.item').after(
            $('<div class="item"></div>').append(
                $('<b></b>').append(
                    data['org']['title']+" "+data['usr']['price']+"元"
                ),
                $('<div class="menu"></div>').append(
                    $(menuitem).append(
                        data['org']['author']
                    ),
                    $(menuitem).append(
                        data['org']['publisher']
                    ),
                    $(menuitem).append(
                        data['usr']['pubdate']
                    )
                )                
            )
        );
    }
}

function checkInputEmpty()
{
    var flag=true;
    $('.FormInputItem.User').each(function() {
        if ($(this).val()=="" || $(this).val()=="none") {
            $(this).parent().parent('.form-group').addClass('has-error');
            flag=false;
        }
    });
    
    if (flag) {
        return true;
    }
    else {
        alert('手机和地点不能为空');
        return false;
    } 
}

function checkInputFormat()
{
    var flag=true;
    var phone=$('#contact').val();
    var rule="(^1[3|4|5|8]\\d{9}$)|(^\\++\\d{2,}$)";
    if (phone.match(rule)==null) {
        flag=false;
        alert('手机号码格式错误');
    }
    if (!flag) {
        $('#contact').parent().parent('.form-group').addClass('has-error');
        return false;
    }
    return true;
}

$(window).load(function(){
    $('.YXM-bg').css('width',parseFloat($('.YXM-content').css('width'))+22);
    $('.YXM-box').css('width',parseFloat($('.YXM-bg').css('width'))+8);
    $('.input-wrap').css('height',$('.sub-wrap .sub-btn').css('height'));
})

$(function(){

    initSidebar();
    
    $('#YXM_submit_btn').click(function(){
        if (!checkInputEmpty()) return false;
        if (!checkInputFormat()) return false;
        var info=formInput2Json(<?=$jsoninfo?>);
        $('#jsoninfo').val(info);
        $('#totalInfoForm').submit();
    })
    
    $('.FormInputItem.User').focus(function() {
        $(this).parent().parent('.form-group').removeClass('has-error');
    });

    $('.FormInputItem.User').blur(function() {
        if ($(this).val()=="" || $(this).val()=="none") {
            $(this).parent().parent('.form-group').addClass('has-error');
            flag=false;
        }
    });
})

</script>
<?php $this->load->view('footer_empty'); ?>
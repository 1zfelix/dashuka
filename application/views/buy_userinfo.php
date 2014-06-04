<?php $this->load->view('header');?>

<div class="container">
    <div class="row" style="margin: 0 50px; padding: 40px 0">
        <?php 
            $row=$row[0];
            $imgurl = base_url('/images/bk.jpg');
            if (isset($row->imgurl)) {
                $imgurl = $row->imgurl;
            }
            $bkurl = base_url('/index.php/go/showbook/'.$row->id);
            $succurl = base_url('/index.php/go/pay/');
        ?>
       
        <div class="row">
            <label for="contact" class="col-lg-3 control-label" style="text-align: right">书籍信息</label>
            <div class="col-lg-8">
                <p>[<?=$row->type?>]&nbsp;&nbsp;<i><?=$row->name?></i>&nbsp;&nbsp;
                <?=$row->authors?>&nbsp;著&nbsp;&nbsp;<?=$row->press?>&nbsp;&nbsp;版次:&nbsp;<?=$row->pubdate?>&nbsp;&nbsp;成色:&nbsp;<?=$row->old?></p>
            </div>
        </div>
        
        <hr>
        
        <form class="form-horizontal">

            <div class="form-group">
                <label for="contact" class="col-lg-3 control-label">联系方式</label>
                <div class="col-lg-8">
                    <div class="input-group">
                        <span class="input-group-addon">手机号</span>
                        <input type="text" class="form-control" name="contact" id="contact">
                    </div>
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
            <form action="<?=$succurl?>" method="post">
                <input type='hidden' id='YXM_here' />
                <input type='hidden' id="jsoninfo" name="jsoninfo"/>
                <br />
                <button type="submit" id="YXM_submit_btn" disabled="disabled" class="btn btn-success">提交</button>
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
$(window).load(function(){
    $('.YXM-bg').css('width',parseFloat($('.YXM-content').css('width'))+22);
    $('.YXM-box').css('width',parseFloat($('.YXM-bg').css('width'))+8);
    $('.input-wrap').css('height',$('.sub-wrap .sub-btn').css('height'));
}) 
</script>
<?php $this->load->view('footer_empty'); ?>
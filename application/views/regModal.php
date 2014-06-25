    <div class="modal fade" id="regModal" tabindex="-1" role="dialog" aria-labelledby="regModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="regModalLabel">注册</h4>
            </div>
            <div class="modal-body">

                <form id="regForm" style="display:none">
                    <input type="text" name="usr">
                    <input type="password" name="pwd">
                </form>
                
                <div class="ui form segment">
                    <div class="field">
                        <label>用户名</label>
                        <input placeholder="用户名长度至少4位" name="username" type="text">
                    </div>
                    <div class="field">
                        <label>密码</label>
                        <input placeholder="密码长度6~16位" name="password" type="password">
                    </div>
                    <div class="ui error message"></div>
                    <div class="ui blue submit button" style="display:none" id="fbtn">Submit</div>
                    <div>
                        <center>
                        <form>
                            <input type='hidden' id='YXM_here' /><br/>
                            <button type="button" id="cr" class="ui blue button disabled" disabled="disabled">注册并登录</button>
                        </form>
                        </center>
                    </div>
                    <!-- <div class="ui error message"></div> -->
                </div>

            </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

<script type='text/javascript' charset='gbk' id='YXM_script' src='http://api.yinxiangma.com/api3/yzm.yinxiangma.php?pk=e890c698a353889605c123e923edf593&v=YinXiangMaJsSDK_4.0'></script>
<script type='text/javascript'>
function YXM_valided_true()
{
    //验证码输入正确后的操作
    $('#cr').removeClass('disabled');
    document.getElementById("cr").disabled="";  
}
function YXM_valided_false()
{
    //验证码输入错误后的操作
    $('#cr').addClass('disabled');
    document.getElementById("cr").disabled="disabled";  
}
</script>

<script>
    $(window).load(function(){
        $('.YXM-bg').css('width',parseFloat($('.YXM-content').css('width'))+22);
        $('.YXM-box').css('width',parseFloat($('.YXM-bg').css('width'))+8);
        // $('.input-wrap').css('height',$('.sub-wrap .sub-btn').css('height'));
        $('.input-wrap').css('height',26);
    });

    $(function(){
        $('#cr').click(function(){
            $('input[name="usr"]').val($('input[name="username"]').val());
            $('input[name="pwd"]').val($('input[name="password"]').val());
            $('#fbtn').click();

            if ($('.field').hasClass('error')) {
                return false;
            }
            $('#regForm').ajaxSubmit({
                url:"<?=base_url('index.php/go/register')?>",
                method: 'post',
                success:function(data){
                    console.log(data);
                    data = JSON.parse(data);
                    if (data[0] == 'y') {
                        $('#regModal').modal('hide');
                        headerCheckLoggedIn();
                    }
                    else if (data[0] == 'u') {
                        alert('用户名已被注册');
                    }
                }
            })
        });
        $('.ui.form').form({
            usr: {
              identifier : 'username',
              rules: [
                {
                  type   : 'empty',
                  prompt : '请输入用户名'
                },
                {
                  type   : 'length[4]',
                  prompt : '用户名至少4位'
                }
              ]
            },
            pwd: {
              identifier : 'password',
              rules: [
                {
                  type   : 'empty',
                  prompt : '请输入密码'
                },
                {
                  type   : 'length[6]',
                  prompt : '密码至少6位'
                }
              ]
            }
        });
    });
</script>


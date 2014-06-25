	<center>
	    <form method="post">
	        <input type='hidden' id='YXM_here' />
	        <br />
	        <button type="button" id="cp1" disabled="disabled" class="btn btn-success">确认</button>
	    </form>
	</center>
	<script type='text/javascript' charset='gbk' id='YXM_script' src='http://api.yinxiangma.com/api3/yzm.yinxiangma.php?pk=e890c698a353889605c123e923edf593&v=YinXiangMaJsSDK_4.0'></script>
	<script type='text/javascript'>
	function YXM_valided_true()
	{
	    //验证码输入正确后的操作
	    document.getElementById("cp1").disabled="";  
	}
	function YXM_valided_false()
	{
	    //验证码输入错误后的操作
	    document.getElementById("cp1").disabled="disabled";  
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
			$('#cp1').click(function(){
				$.ajax({
					url:"<?=base_url('index.php/go/checkPaid/1/')?>"+"<?=$bid?>/0",
					success:function(data){
						if (data == 'y') {
							location.href = "<?=base_url('index.php/mail/call/1/')?>"+"<?=$bid?>";
						}
					}
				});
			});
		});
	</script>
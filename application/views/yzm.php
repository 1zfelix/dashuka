	<center>
	    <form action="<?=$succurl?>" method="post">
	        <input type='hidden' id='YXM_here' />
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
	<script>
		$(window).load(function(){
		    $('.YXM-bg').css('width',parseFloat($('.YXM-content').css('width'))+22);
		    $('.YXM-box').css('width',parseFloat($('.YXM-bg').css('width'))+8);
		    // $('.input-wrap').css('height',$('.sub-wrap .sub-btn').css('height'));
		    $('.input-wrap').css('height',26);
		}) 
	</script>
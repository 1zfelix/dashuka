

<div class="modal-body">
	<h2>这将从您的账户余额&nbsp;&nbsp;
		<small class="acc"><?=$acc?>元</small>&nbsp;&nbsp;中扣除<small>&nbsp;&nbsp;<?=$pr?>元</small>
	</h2><h2>
	<small>若确认，请点击<b><i>“确认支付”</i></b><small>
	</h2>	    	
</div>
<div class="modal-footer">
    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">支付失败</button> -->
    <button type="button" class="btn btn-primary confirmPay" id="cp0">确认支付</button>
</div>

<script type="text/javascript">
$(function(){
	$('#cp0').click(function(){
		$.ajax({
			url:"<?=base_url('index.php/go/checkPaid/0/')?>"+"<?=$bid?>/"+"<?=$pr?>",
			success:function(data){
				if (data == 'y') {
					location.href = "<?=base_url('index.php/mail/call/0/')?>"+"<?=$bid?>";
				}
			}
		})
	});
});
</script>
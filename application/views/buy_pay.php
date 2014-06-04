<?php $this->load->view('header_last');?>

<div class="container" style="padding: 40px">
	<?php
		// $callurl = base_url('index.php/go/calluser/'.$jobid);
		$payonl = "http://www.taobao.com";
		$payoffl = base_url('index.php/go/payoffline/'.$jobid);
		$yzm['succurl'] = $payoffl; 
	?>
	<div class="row">
		<h2>您的交易号:</h2>
		<?php var_dump($jobid)?>
	</div>
	
	<hr>
	
	<div class="row">
		<h2>请选择支付方式:</h2>
		<div class="jumbotron">
			  <h4>网上支付</h4>
			  <p>...</p>
			  <a id="payOn" class="btn btn-primary" role="button" data-toggle="modal" data-target="#payOnLineModal">点击以支付</a>
		</div>
	
		<div class="jumbotron">
			  <h4>取书点支付</h4>
			  <p>...</p>
			  <button class="btn btn-primary" data-toggle="modal" data-target="#payOffLineModal">点击以确认</button>
		</div>
	</div>

	<div class="modal fade" id="payOffLineModal" tabindex="-1" role="dialog" aria-labelledby="payOffLineModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	        <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title" id="payOffLineModalLabel">线下支付验证</h4>
	        </div>
	        <div class="modal-body">
	        	<div class="row" style="margin: 0px 50px;">
	        		<center>您选择线下支付吗?如确认,请输入以下验证码,这可以防止机器作弊</center>
			    </div>
				<div class="row" style="margin: 20px 50px;">
			        <?php $this->load->view('yzm',$yzm);?>
			    </div>
	        </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<div class="modal fade" id="payOnLineModal" tabindex="-1" role="dialog" aria-labelledby="payOnLineModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
		    <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title" id="payOnLineModalLabel">线上支付验证</h4>
		    </div>
		    <div class="modal-body">

		    </div>
	        <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">支付失败</button>
		        <button type="button" class="btn btn-primary">已完成支付</button>
	        </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	
</div>

<script type="text/javascript">
$(function() {
	$('#payOn').click(function(){
		window.open("<?=$payonl?>");
	})
})
</script>

<?php $this->load->view('footer');?>
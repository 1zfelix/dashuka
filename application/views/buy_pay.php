<?php $this->load->view('header');?>

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
		<h2>您的账户余额:&nbsp;&nbsp;<small><?=$acc?>元</small></h2>
		<br>
			<!-- 
		<?php var_dump($acc)?> -->
	</div>
	
	<hr>
	<div class="row">
		<h2>请选择支付方式:</h2>
		<br>
	</div>
	<div class="row jumbotron payment">
		<div class="col-xs-4">
			<a href="" target="_blank">
				<img src="<?=base_url('images/taobao.gif')?>">
			</a>
		</div>
		<div class="col-xs-8">
			<div class="row">
				<!-- <font color="#9BB831" size="3"><strong>官方淘宝店充值</strong></font> -->
				<h3><font color="#9BB831"><strong>官方淘宝店充值</strong></font></h3>
				<p>
					<font color="#666666">只要您在官方淘宝店拍了商品，在此输入淘宝订单编号即可充值。</font>
			        <br>
			        <font color="#666666">例如，您需要充值36元，只要拍36件商品即可（单价1元）</font>
				</p>
				<br>
			</div>
			<div class="row">
				<p>
					<span class="style2">官方淘宝充值地址：</span><a href="http://item.taobao.com/item.htm?id=36276252806" target="_blank">http://item.taobao.com/item.htm?id=36276252806</a>
					<br>
					亲：拍完宝贝后，千万不要忘记在下面输入“淘宝购买商品的订单编号”，并且点击“淘宝订单编号支付”按钮！
				</p>
				<br>
			</div>
			<div class="row">
				<h2>充值&nbsp;&nbsp;<small>请输入订单编号:</small></h2>
				<input type="text" class="form-control" placeholder="淘宝商品订单编号">
				<button class="btn btn-primary" data-toggle="modal" data-target="#payOnLineModal">点击以支付</button>
				<br><br>
			</div>
			
			<div class="row">
				<p>
				<small>购买书籍网上支付操作流程：
		            <br>
		            1，登录本网站。
		            <br>
		            2，选择您要购买的书籍，点击购买，根据单价计算充值金额，得到所需要拍的相应的商品数量。
		            <br>
		            3，在5145官方店铺拍下您需要购买的商品数量（单价1元），并且付款。
		            <br>
		            4，在充值页面，输入“淘宝购买商品的订单编号”，点击“淘宝订单支付”按钮。
		            <br>
		  			5，进入“提交订单”页面，提交成功之后，等待电话确认和通知。
				</small>
				</p>
			</div>
		</div>
	</div>


	<div class="row jumbotron payment">
			<div class="col-xs-4">
				
			</div>
			<div class="col-xs-8">
				<div class="row">
					<h3><font color="#9BB831"><strong>取书点支付</strong></font></h3>
					<br>
					<!-- <h4>取书点支付</h4> -->
				  	<p>...</p>
				  	<button class="btn btn-primary" data-toggle="modal" data-target="#payOffLineModal">点击以确认</button>
				</div>
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
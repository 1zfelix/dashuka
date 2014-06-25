<?php $this->load->view('header');?>

    <?php
        $TypeMap = array(
            'textbook' => '教材',
            'magazine' => '杂志',
            'journal' => '英语',
            'other' => '其他'
        );
        $OldMap = array(
            '100' => '全新',
            '99' => '99成新',
            '90' => '9成新',
            '50' => '其他'
        );
    ?>

<div class="container" style="padding: 40px">
	<?php
		// $callurl = base_url('index.php/go/calluser/'.$jobid);
		$payOnLineTaobao = "http://item.taobao.com/item.htm?id=39704385529";
		// $payoffl = base_url('index.php/go/payoffline/'.$jobid);
		// $yzm['succurl'] = $payoffl;
		// var_dump($bookinfo);
		$bookinfo = $bookinfo[0];
		$jsoninfo = json_decode($jsoninfo);

		$pr = $bookinfo->price;
		$bid = $bookinfo->bid;
		$data['pr']=$pr;
		$data['acc']=$acc;
		$data['bid']=$bid;
		$bookinfo = array(
			'name' => $bookinfo->name,
			'contact' => $jsoninfo->contact,
			'place' => $jsoninfo->place,
			'price' => $bookinfo->price
		 );
		
	?>
	 <!-- <font color="#888a85"></font> -->
	<div class="row">
		<h2>您的交易信息:</h2>
		<pre class="xdebug-var-dump" dir="ltr">
			&nbsp;
 &nbsp;<font color="#cc0000"><?=$bookinfo['name']?></font>&nbsp;<i><?=$bookinfo['price']?>元</i>&nbsp;<font color="#cc0000"><?=$bookinfo['place']?></font>&nbsp;<i><?=$bookinfo['contact']?></i>
		</pre>
		<br>
		<h4>
			请核对交易信息后，在下方<font color="#FF0000"><strong>进行支付</strong></font>，否则您并没有购买书籍。若网上支付，请在下方使用<font color="#FF0000"><strong>淘宝商品订单编号</strong></font>充值。
		</h4>
	</div>
	
	<hr>

	<div class="row">
		<h2>您的账户余额:&nbsp;&nbsp;<small class="acc"><?=$acc?>元</small></h2>
		<br>
			<!-- 
		<?php var_dump($acc)?> -->
	</div>
	
<!-- 	<hr>
	<div class="row">
		<h2>请选择支付方式:</h2>
		<br>
	</div> -->
	<div class="row jumbotron payment">
		<div class="col-xs-4">
			<a href="<?=$payOnLineTaobao?>" target="_blank">
				<img src="<?=base_url('images/taobao.gif')?>" width="260px" height="240px">
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
					<span class="style2">官方淘宝充值地址：</span><a href="<?=$payOnLineTaobao?>" target="_blank">http://item.taobao.com/item.htm?id=36276252806</a>
					<br>
					亲：拍完宝贝后，千万不要忘记在下面输入“淘宝购买商品的订单编号”，并且点击“点击以充值”按钮！
				</p>
				<br>
			</div>
			<div class="row">
				<h2>充值&nbsp;&nbsp;<small>请输入订单编号:</small></h2>
				<form id="rechargeForm">
					<input type="text" class="form-control" placeholder="淘宝商品订单编号" id="taobaoOID">
				</form>
				<button class="btn btn-info" id="recharge">点击以充值</button>
				<br><br>
			</div>
				</div>
	</div>

	<hr>
	<div class="row">
		<h2>请选择支付方式:</h2>
		<br>
	</div>
	
	<div class="row jumbotron payment">
			<div class="row">
				<h3><font color="#9BB831"><strong>网上支付</strong></font></h3>
				<p>
				购买书籍网上支付操作流程（对账户无余额的用户）：
		            <br>
		            1.&nbsp;购书：需注册并登录。
		            <br>
		            2.&nbsp;拍淘宝物品：在淘宝店铺拍下大于等于书价格的商品（单价1元），付款，得到<font color="#FF0000"><strong>订单编号</strong></font>。
		            <br>
		            3.&nbsp;充值：输入“淘宝购买商品的<font color="#FF0000"><strong>订单编号</strong></font>”，点击“充值”按钮，将等同于商品的价格存入本网站账户。
		            <br>
		  			4.&nbsp;网上支付：点击“点击以支付”，从账户余额中扣除书价，剩余金额仍旧存在账户中。
		  			<br>
		  			5.&nbsp;提交成功之后，等待电话确认和通知，取书类似取快递的方式。
				<!-- <small></small> -->
				</p>

				<button class="btn btn-primary"id="payOnlineBtn">点击以支付</button>
				<br>
			</div>
	</div>


	<div class="row jumbotron payment">
<!-- 			<div class="col-xs-4">
				
			</div>
			<div class="col-xs-8"> -->
				<div class="row">
					<h3><font color="#9BB831"><strong>取书点支付</strong></font></h3>
					<br>
				  	<p>您可以在确认后，等待电话通知，获得电话通知后请带好&nbsp;<?=$pr?>&nbsp;元到&nbsp;<?=$jsoninfo->place?>&nbsp;领取书籍</p>
				  	<br>
				  	<button class="btn btn-primary" data-backdrop="static" data-toggle="modal" data-target="#payOffLineModal">点击以确认</button>
				</div>
			<!-- </div> -->
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
			        <?php $this->load->view('yzm',$data);?>
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
		    	<div id="pmy">
		    			<?php $this->load->view('buy_pay_yes',$data);?>
		    	</div>
		    	<div id="pmn">
		    			<?php $this->load->view('buy_pay_no',$data);?>
		    	</div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	
</div>

<script type="text/javascript">

$(function(){
	
	$('#recharge').click(function(){
		if ($('#taobaoOID').val()=='') {
			alert('请输入订单编号');
			return false;
		}
		var pay;
		$('#rechargeForm').ajaxSubmit({
			url: "<?=base_url('index.php/tb/taobaoRec/')?>"+$('#taobaoOID').val(),
			method: "get",
			success: function(data){
				console.log(data);
				if (data == 'u') {
					alert('此订单编号已使用过');
					return false;
				}
				var flag = false;
				if (data.indexOf('trade_get_response')>=0) {
					flag = true;
				}
				data = JSON.parse(data);
				console.log(data);
				if (!flag) {
					alert('订单编号错误，请仔细检查');
				}
				else {
					pay = data['trade_get_response']['trade']['payment'];
					pay = parseFloat(pay);
					console.log(pay);
					
					$.get("<?=base_url('index.php/tb/updateAcc/')?>"+pay,function(data){
						alert('成功充值'+pay+'元');
						console.log(data);
						var newacc = parseFloat(data);

						$('.acc').text(newacc+'元');
					});
					
				}
				
			}
		});
	});

	$('#payOnlineBtn').click(function(){
		$.get("<?=base_url('index.php/tb/getAcc/')?>",function(data){
						
			console.log(data);
			var acc = parseFloat(data);
			if (acc>=<?=$pr?>) {
				$('#pmy').show();
				$('#pmn').hide();
			}
			else {
				$('#pmn').show();
				$('#pmy').hide();
			}

			$('#payOnLineModal').modal({
			  	keyboard: false,
			  	show: true,
			  	backdrop: 'static'
			});

		});
	});
});

</script>

<?php $this->load->view('footer');?>
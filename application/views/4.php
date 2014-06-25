<?php $this->load->view('header');?>

<div class="container" style="padding: 40px">
	<div class="row">
		<h2>支付成功&nbsp;&nbsp;<small class="acc">请保持手机开机，我会很快联系您</small></h2>
	</div>

	<div class="row">
		<h2>您的账户余额:&nbsp;&nbsp;<small class="acc"><?=$acc?>元</small>
			&nbsp;&nbsp;<a href="<?=base_url('index.php/go/SBP/1/10/all/0')?>" class="btn btn-primary">继续购买</a></h2>
	</div>
	<div class="row">
		<h2>其他服务:</h2>
		<hr>
	</div>
	<div class="jumbotron">
	    <h1>捐助</h1>
	  	<p>...</p>
	  	<p><a class="btn btn-primary btn-lg" role="button" disabled="disabled">Learn more</a></p>
	</div>
	<div class="jumbotron">
	 	<h1>置顶</h1>
	  	<p>...</p>
	  	<p><a class="btn btn-primary btn-lg" role="button" disabled="disabled">Learn more</a></p>
	</div>
	<center><a href="<?=base_url('index.php')?>" class="btn btn-primary btn-lg">返回主页</a></center>
</div>
<?php $this->load->view('footer');?>
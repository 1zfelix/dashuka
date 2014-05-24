<?php $this->load->view('header');?>

<div class="container" style="padding: 40px">
	<div class="row" style="text-align:center;">
		<div class="col-xs-8">
			<div class="alert alert-success">
    			添加成功
    		</div>
			<div class="panel panel-default">
 				<div class="panel-body">
 					这里添加提交的信息<br />
 	<table class="table table-striped table-hover">
	<tr>
		<th>书名</th>
		<th>类型</th>
		<th>作者</th>
		<th>出版社</th>
		<th>学院</th>
		<th>卖主</th>
		<th>联系方式</th>
		<th>交易地点</th>
		<th>价格</th>
		<th>添加时间</th>
	</tr>
	<?php 
	var_dump($row);
		echo "<tr>";
		echo "<td>{$row['name']}</td>";
		echo "<td>{$row['type']}</td>";
		echo "<td>{$row['authors']}</td>";
		echo "<td>{$row['press']}</td>";
		echo "<td>{$row['school']}</td>";
		echo "<td>{$row['owner']}</td>";
		echo "<td>{$row['contact']}</td>";
		echo "<td>{$row['place']}</td>";
		echo "<td>{$row['price']}</td>";
		//echo "<td>{$row['time']}</td>";
		echo "</tr>";
	?>
	</table>
 				</div>
 			</div>	
		</div>

		<div class="col-xs-4">
			<div class="panel panel-default">
 				<div class="panel-body">
					<ul class="list-unstyled">
						<li style="padding: 10px"><h1>您可以:&nbsp;</h1></li>
						<li style="padding: 10px"><hr /></li>
						<li style="padding: 10px"><a href="<?=base_url('index.php/go/bookrec')?>" class="btn btn-primary btn-lg">继续添加</a></li>
						<li style="padding: 10px"><a href="<?=base_url('index.php')?>" class="btn btn-default btn-lg">返回主页</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('footer');?>
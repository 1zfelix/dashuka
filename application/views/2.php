<?php $this->load->view('header');?>

<div class="container" style="padding: 40px">
	<!--<div style="padding: 20px">-->
	<div class="row" style="padding: 10px">
		<div class="col-lg-1" id="sizedescr">
			每页显示:
		</div>
		<div class="col-lg-2">
		<select class="form-control";id="sizesel">
			<option value="10">10</option>
			<option value="20">20</option>
			<option value="50">50</option>
		</select>
		</div>
	</div>
	<div id="table_1"></div>
<!---->
	<div class="table-responsive">
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
	foreach ($result as $row) {
		echo "<tr>";
		echo "<td>$row->name</td>";
		echo "<td>$row->type</td>";
		echo "<td>$row->authors</td>";
		echo "<td>$row->press</td>";
		echo "<td>$row->school</td>";
		echo "<td>$row->owner</td>";
		echo "<td>$row->contact</td>";
		echo "<td>$row->place</td>";
		echo "<td>$row->price</td>";
		echo "<td>$row->time</td>";
		echo "</tr>";
	}
	?>
</table>
</div>
	<?php
		$backPage=$currPage>1?$currPage-1:1;
		$forwPage=$currPage<$pageNum?$currPage+1:$pageNum;
		//echo "<p>backPage = $backPage "."forwPage = $forwPage "."pageNum = $pageNum "."currPage = $currPage</p>"
	?>
<ul class="pagination">
	<?php
		if ($currPage==1)
			echo "<li class='disabled'><a>&laquo;</a></li>";
		else {
			echo "<li>";
	?>
		<a href="<?=base_url('index.php/go/booklist').'/'.$backPage.'/'.$perSize?>">&laquo;</a></li>
	<?php
			}
		for ($i=1;$i<=$pageNum;$i++){
		  	if ($i==$currPage)
  				echo "<li class='active'>";
  	 		else 
				echo "<li>";
	?>
			<a href="<?=base_url('index.php/go/booklist').'/'.$i.'/'.$perSize?>"><?=$i?></a></li>
	<?php 
		} 
	?>
	<?php
		if ($currPage==$pageNum)
			echo "<li class='disabled'><a>&raquo;</a></li>";
		else {
			echo "<li>";
	?>
		<a href="<?=base_url('index.php/go/booklist').'/'.$forwPage.'/'.$perSize?>">&raquo;</a></li>
	<?php 
			} 
	?>

</ul>

<!--<center></center>-->
<a href="" class="btn btn-primary btn-md" style="float: right; margin-left: 5px; margin-right: 5px; margin-top: 20px; margin-bottom: 20px;">返回顶部</a>
<a href="<?=base_url('index.php')?>" class="btn btn-default btn-md" style="float: right; margin-left: 5px; margin-right: 5px; margin-top: 20px; margin-bottom: 20px;">返回主页</a>
</div>

<!--
<script type="text/javascript">
$(document).ready(
function setPerSize(num){
	urlstr="index.php/go/booklist/1";
	urlstr=urlstr+'/'+num;
	$.ajax({url:urlstr});
	$("#table_1").load("2_1.php #table_1");
}
);
</script>
-->
<?php $this->load->view('footer');?>
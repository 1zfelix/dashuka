<?php $this->load->view('header');?>
<div id="table_1">
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
	<li><a href="<?=base_url('index.php/go/booklist').'/'.$backPage.'/'.$perSize?>">&laquo;</a></li>
	<?php
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
  	<li><a href="<?=base_url('index.php/go/booklist').'/'.$forwPage.'/'.$perSize?>">&raquo;</a></li>
</ul>
</div>
<?php $this->load->view('footer');?>
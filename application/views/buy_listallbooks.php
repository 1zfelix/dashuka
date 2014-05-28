	<?php
		$imgurl = base_url('\images\bk.jpg');
		if (isset($row->imgurl)) {
			$imgurl = $row->imgurl;
		}
	?>
	<li class="media" style="margin:0">
	    <a class="pull-left" href="#">
	      <img class="media-object" src="<?=$imgurl?>" alt="" style="width: 50px; height: 70px;">
	    </a>
	    <div class="media-body">
	      	<h4 class="media-heading">[<?=$row->type?>]&nbsp;&nbsp;<i><?=$row->name?></i>&nbsp;&nbsp;<?=$row->price?>元</h4>
      		<div class="list-group">
	      		<p class="list-group-item-text"><?=$row->authors?>&nbsp;著&nbsp;&nbsp;<?=$row->press?>&nbsp;&nbsp;版次:&nbsp;<?=$row->pubdate?></p>
	      		<p class="list-group-item-text">成色:&nbsp;<?=$row->old?></p>
      		</div>
	    </div>
	    <hr style="margin-top: -10px; margin-bottom: 2px">
	</li>

<!-- 
<li class="list-group-item">
	<div class="row">
	<div class="col-lg-1">
		<a href="#" target="_blank">
			<img src="<?=$row->imgurl?>">
		</a>
	</div>
	<div class="col-lg-11">
		<ul>
			<li>[<?=$row->type?>]&nbsp;<i><?=$row->name?></i>&nbsp;<?=$row->price?>元</li>
			<li><?=$row->authors?>作&nbsp;<?=$row->press?>&nbsp;版次:<?=$row->pubdate?></li>
			<li><?=$row->old?></li>
		</ul>
	</div></div>
</li> 
-->

<!--   	
	<div class="item">
    	<img class="ui small image" src="<?=$row->imgurl?>">
    	<div class="content">
      		<div class="header">[<?=$row->type?>]&nbsp;<i><?=$row->name?></i>&nbsp;<?=$row->price?>元</div>
      		<div class="list description">
      			<div class="item"><?=$row->authors?>作&nbsp;<?=$row->press?>&nbsp;版次:<?=$row->pubdate?></div>
      			<div class="item">成色:<?=$row->old?></div>
      		</div>
    	</div>
    </div> 
-->

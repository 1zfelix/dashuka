<?php $this->load->view('header');?>
<?php
    $data=json_decode($jsoninfo);
    var_dump($data);
    // $i=1;
    // $arr = array();
    // $con = $data->us->contact;
    // $pla = $data->us->place;
    // if ($pla == '52') {
    //     $pla = '52斋';
    // }
    // foreach ($data->bk as $key => $value) {
    //     $arr[$i]=$value->org->title;
    //     $i++;
    // }
    // $cc = count($arr);
?><!-- 
<div class="container">
    
    <div class="row .Book" style="margin: 0 50px; padding-top: 40px">
    	<div style="text-align: left">
      		<h3><font color="#888a85">书籍信息,&nbsp;共有</font>
                <i>&nbsp;<?=$cc?>&nbsp;</i>
                <font color="#888a85">本书</font>
            </h3>
		</div>
        <br>
        <?php var_dump($arr);?>
    </div>
    <div class="row .User" style="margin: 0 50px; padding: 40px 0">
      	<div style="text-align: left">
      		<h3><font color="#888a85">我们会向您的手机</font>
            <i>&nbsp;<?=$con?>&nbsp;</i>
            <font color="#888a85">打电话通知,&nbsp;请您届时将指定书籍送至</font>
            <i>&nbsp;<?=$pla?>&nbsp;</i>
            <font color="#888a85">取书点</font></h3>
		</div>
    </div>
    <div class="row" style="margin: 0 50px; padding: 40px 0">
        <center><a href="<?=base_url('index.php')?>" class="btn btn-default">返回主页</a></center>
    </div>
</div> -->
<?php $this->load->view('footer_empty'); ?>
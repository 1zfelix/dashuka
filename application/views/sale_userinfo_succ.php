<?php $this->load->view('header');?>

<div class="container">
    <div class="row" style="margin: 0 50px; padding: 40px 0">
        <?php var_dump($jsoninfo);?>
    </div>
    <div class="row" style="margin: 0 50px; padding: 40px 0">
        <center><a href="<?=base_url('index.php')?>" class="btn btn-default btn-lg">返回主页</a></center>
    </div>
</div>

<?php $this->load->view('footer_empty'); ?>
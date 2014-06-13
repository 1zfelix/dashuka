<?php $this->load->view('header'); ?>

<div class="container" style="padding: 40px">
      <div class="row" style="padding:50px">
        <div class="col-xs-12 col-md-4">
          <h2>我要卖书</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-primary" href="<?=base_url('index.php/go/bookrec')?>" role="button" target="_blank">注册书籍 »</a></p>
        </div>
        <div class="col-xs-12 col-md-4">
          <h2>我要买书</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-primary" href="<?=base_url('index.php/go/SBP/1/10/all/0')?>" role="button">查看书籍 »</a></p>
        </div>
        <div class="col-xs-12 col-md-4">
          <h2>我已卖书</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-info" href="<?=base_url('index.php/go/service')?>" role="button">服务 »</a></p>
        </div>
      </div>
</div>

<?php $this->load->view('footer'); ?>
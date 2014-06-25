<?php $this->load->view('header'); ?>
<?php $this->load->view('regModal');?>
      <div id="myCarousel" class="carousel slide">
        <div class="carousel-inner">
          <div class="item active masthead">
            <div class="masthead-bg"></div>
            <div class="container">
              <div class="carousel-caption">
                <h1>校园二手书</h1>
                <!-- <h2>书看完了？扔掉多可惜，这里帮您找到它下一个有缘人</h2> -->
                <h3>卖书：登记信息->管理员联系卖家->到校园指定地送书取钱</h3>
                <h3>买书：登记信息->支付->管理员联系买家->到校园某地取书</h3>
                <p>
                  <button class="RegBtn btn btn-lg btn-primary btn-shadow bs3-link" data-backdrop="static" data-toggle="modal" data-target="#regModal">立即注册&nbsp;格子书店</button>
                </p>

                  <a class="bs2-link" role="button">
                    本网站用于校园内部书籍流通，现支持天津大学，您能够以实惠的价格获得外网昂贵的书籍，或者难以获取的教材
                    <br>
                    买卖双方需要到校园内指定地点取送书籍
                  </a>
              </div>
            </div>
          </div>
        </div>
      </div>

<div class="container" style="padding: 10px 40px">

      <div class="row" style="padding:50px">
          <div class="col-xs-12 col-md-6">
              <h2>我要卖书</h2>
              <p>
              <small>卖书流程：
                      <br>
                      1，登录本网站，点击“注册书籍”。
                      <br>
                      2，输入书籍背面下方的ISBN码（条形码上的数字），获取书籍基本信息。
                      <br>
                      3，输入书籍其他信息，如出版时间、成色等，并定价。
                      <br>
                      4，输入您的联系方式，以方便我们通知。
                      <br>
                  5，提交成功之后，等待电话确认和通知，通知后请将书籍送到指定地点并获取您输入的收益(现金)。
              </small>
              </p>
              <p><a class="btn btn-primary" href="<?=base_url('index.php/go/bookrec')?>" role="button" target="_blank">注册书籍 »</a></p>
          </div>
          <div class="col-xs-12 col-md-6">
              <h2>我要买书</h2>
              <p>
              <small>购买书籍操作流程：
                      <br>
                      1，登录本网站，点击“查看书籍”。
                      <br>
                      2，选择您要购买的书籍，点击书籍名称或图片查看信息。
                      <br>
                      3，点击“购买”，输入您的联系方式。
                      <br>
                      4，您可以线上、线下两种支付方式，线上支付通过淘宝交易，充值到本网站账户内，并完成支付（类似paperpass）。
                      <br>
                      5，进入“提交订单”页面，提交成功后，等待电话确认和通知，通知后请到指定地点取书。
              </small>
              </p>
              <p><a class="btn btn-primary" href="<?=base_url('index.php/go/SBP/1/10/all/0')?>" role="button">查看书籍 »</a></p>
          </div>
      </div>

      <a class="btn btn-primary" href="<?=base_url('index.php/go/admin')?>" id="admin" style="display:none">admin</a>

</div>

<?php $this->load->view('footer'); ?>
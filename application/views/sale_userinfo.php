<?php $this->load->view('header');?>

<?php $this->load->view('sale_sidebar');?>

<div class="container">
    <div class="row" style="margin: 0 50px; padding: 40px 0">
<?php var_dump($jsoninfo);?>
<form class="form-horizontal" action="<?=base_url('index.php/go/bookstorage')?>" method="post">

    <div class="form-group">
        <label for="contact" class="col-lg-3 control-label">联系方式</label>
        <div class="col-lg-8">
            <div class="input-group">
                <div class="input-group-btn">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <span id="contactbtn">手机号</span>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="contactclass">手机号</a>
                        </li>
                        <li><a class="contactclass">QQ号</a>
                        </li>
                        <li class="divider"></li>
                        <li><a class="contactclass">其他联系方式,请注明</a>
                        </li>
                    </ul>
                </div>
                <!-- /btn-group -->
                <input type="text" class="form-control" name="contact" id="contact">
            </div>
            <!-- /input-group -->
        </div>
        <!-- /.col-lg-5 
            <div class="col-sm-8">
                <input type="text" placeholder="手机号/QQ/邮件等" class="form-control" name="contact" id="contact">
            </div>-->
    </div>


    <div class="form-group">
        <label for="type" class="col-lg-3 control-label">交易地点</label>
        <div class="col-lg-8">
            <select class="form-control FormInputItem User" name="place" id="place">
                <option value="none">请选择</option>
                <option value="52">52斋</option>
                <!-- <option value="dh">大活</option> -->
            </select>
        </div>
    </div>
</form>
</div></div>
<?php $this->load->view('footer_empty'); ?>
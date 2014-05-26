<form class="form-horizontal" action="<?=base_url('index.php/go/bookstorage')?>" method="post">
    <div class="form-group">
        <label for="school" class="col-lg-3 control-label">学院</label>
        <div class="col-lg-8">
            <input type="text" placeholder="学院" class="form-control" name="school" id="school">
        </div>
    </div>
    <div class="form-group">
        <label for="owner" class="col-lg-3 control-label">卖主</label>
        <div class="col-lg-8">
            <input type="text" placeholder="可不填写真名" class="form-control" name="owner" id="owner">
        </div>
    </div>
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
        <label for="place" class="col-lg-3 control-label">交易地点</label>
        <div class="col-lg-8">
            <input type="text" placeholder="可填写最方便的地方" class="form-control" name="place" id="place">
        </div>
    </div>
</form>

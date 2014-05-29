<?php $this->load->view('header'); ?>

<div class="container" style="padding: 0">
<div class="row" style="padding: 40px 0"><!---->
  <form class="form-horizontal col-lg-8 col-xs-6" action="<?=base_url('index.php/go/bookstorage')?>" method="post">
    <div class="form-group">
        <label for="isbn" class="col-lg-3 control-label">ISBN</label>
            <div class="col-lg-8">
                <input type="text" placeholder="ISBN" class="form-control" name="isbn" id="isbn">
                <button type="button" class="btn btn-success" style="text-align:center" id="fetchisbn">获取书籍信息</button>&nbsp;&nbsp;
            </div>
    </div>

    <div class="form-group">
        <label for="name" class="col-lg-3 control-label">书名</label>
            <div class="col-lg-8">
                <input type="text" placeholder="书名" class="form-control" name="name" id="name">
            </div>
    </div>
    <div class="form-group">
        <label for="type" class="col-lg-3 control-label">类型</label>
            <div class="col-lg-8">
                <select class="form-control" name="type" id="type">
                    <option value="textbook">教材</option>
                    <option value="magazine">杂志</option>
                    <option value="journal">期刊</option>
                </select>
                <!--<input type="text" placeholder="教材/杂志等" class="form-control" name="type" id="type">-->
            </div>
    </div>
    <div class="form-group">
        <label for="authors" class="col-lg-3 control-label">作者</label>
            <div class="col-lg-8">
                <input type="text" placeholder="作者" class="form-control" name="authors" id="authors">
            </div>
    </div>
    <div class="form-group">
        <label for="press" class="col-lg-3 control-label">出版社</label>
            <div class="col-lg-8">
                <input type="text" placeholder="出版社" class="form-control" name="press" id="press">
            </div>
    </div>
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
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span id="contactbtn">手机号</span> <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a class="contactclass">手机号</a></li>
                            <li><a class="contactclass">QQ号</a></li>
                            <li class="divider"></li>
                            <li><a class="contactclass">其他联系方式,请注明</a></li>
                        </ul>
                    </div><!-- /btn-group -->
                    <input type="text" class="form-control"  name="contact" id="contact">
                </div><!-- /input-group -->
            </div><!-- /.col-lg-5 
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
    <div class="form-group">
        <label for="price" class="col-lg-3 control-label">价格</label>     
            <div class="col-lg-8">
                <div class="input-group">
                    <span class="input-group-addon">￥</span>
                    <input type="text" placeholder="价格" class="form-control" name="price" id="price">
                </div>
            </div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-lg-offset-6">
        <button type="button" class="btn btn-success btn-lg" style="text-align:center" id="addtoshelf">添加到右侧</button>&nbsp;&nbsp;
        <!--<a href="<?=base_url('index.php')?>" class="btn btn-default btn-lg" style="text-align:center">返回主页</a>-->
        </div>
    </div>
  </form>

        <div id="bookshelf" class="col-lg-3 col-xs-6">
            <div id="panel_empty">书架还没有书，请在左侧添加书籍</div>
        </div>
</div><!--  -->
</div>
<script type='text/javascript'>
$(document).ready(function() {
  $('#fetchisbn').click(function() {
    if ($('#isbn').val().length == 10 || $('#isbn').val().length == 13) {
      $.get('<?=base_url('index.php/ajax/isbn')?>'+'/'+$('#isbn').val(),function(data) {
        console.log('<?=base_url('index.php/ajax/isbn')?>'+'/'+$('#isbn').val());
        data = JSON.parse(data);
        if (data['msg'] == 'book_not_found') {
          alert('book not found');
        } else {
          bookname = data['title'];
          author = data['author'];
          press = data['publisher'];
          $('#name').val(bookname);
          $('#authors').val(author);
          $('#press').val(press);

        }
      });
    }
  });
});
</script>

<?php $this->load->view('footer'); ?>

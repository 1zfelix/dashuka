<?php $this->load->view('header'); ?>

<div class="container">
    <div class="row" style="padding: 40px 0">
        <form class="bkinfo form-horizontal col-lg-12 col-xs-12" action="<?=base_url('index.php/go/bookstorage')?>" method="post">
            <div class="form-group">
                <label for="isbn" class="col-lg-2 control-label">ISBN</label>
                <div class="col-lg-8">
                    <input type="text" placeholder="ISBN" class="form-control" name="isbn" id="isbn">
                </div>
            </div>
            <div class="form-group">
                <p style="text-align:center" class="fetchisbn">
                    <button type="button" class="btn btn-success" style="text-align:center" id="fetchisbn">获取书籍信息</button>&nbsp;&nbsp;
                </p>
                <div class="alert alert-warning" id="errorisbn" style="display:none">
                    获取失败,您可以:&nbsp;
                    <button type="button" class="searchagain btn btn-success" style="text-align:center">重新搜索</button>&nbsp;&nbsp;
                    <button type="button" class="btn btn-success" style="text-align:center" id="addmanually">手动添加</button>
                </div>
                <div class="alert alert-success" id="succisbn" style="display:none">
                    获取成功,请完善一下信息，或者您可以:&nbsp;
                    <button type="button" class="searchagain btn btn-success btn-sm" style="text-align:center">重新搜索</button>&nbsp;&nbsp;  
                </div>
                <div class="alert alert-default" id="runisbn" style="display:none">
                    正在查找
                </div>
            </div>
        </form>
    </div>
    <div class="row" style="padding-bottom: 40px">
        <div id="info" style="display:none" class="ui two column middle aligned relaxed grid basic segment">
            <div class="column">
            <!-- <div class="col-lg-6 col-xs-12"></div> -->
                <?php $this->load->view('sale_bookinfo');?>
            </div>
            <div class="ui vertical divider"></div>
            <div class="aligned column">
            <!-- <div class="col-lg-6 col-xs-12"></div> -->
                <?php $this->load->view('sale_userinfo');?>
            </div>
        </div>
    </div>
</div>

<script type='text/javascript'>
$(document).ready(function() {
    $('#fetchisbn').click(function() {
        if ($('#isbn').val().length == 10 || $('#isbn').val().length == 13) {
            $('.fetchisbn').hide();
            $('#runisbn').show();
            $.get('<?=base_url('index.php/ajax/isbn')?>' + '/' + $('#isbn').val(), function(data) {
                console.log(data);
                data = JSON.parse(data);
                $('#runisbn').hide();
                if (data['msg'] == 'book_not_found') {
                    $('#errorisbn').show();
                } else {
                    $('#succisbn').show();
                    bookname = data['title'];
                    author = data['author'];
                    press = data['publisher'];
                    pubdate = data['pubdate'];
                    $('#name').val(bookname);
                    $('#authors').val(author);
                    $('#press').val(press);
                    $('#edition').val(pubdate);
                    $('#info').show();
                }
            });
        }
        else {
            alert('isbn格式错误');
        }
    });

    $('.searchagain').click(function() {
        $('#errorisbn').hide();
        $('#succisbn').hide();
        $('form.bkinfo')[0].reset();
        $('form#bk')[0].reset();
        $('.fetchisbn').show();
        $('#info').hide();
    });

    $('#addmanually').click(function() {
        $('#errorisbn').hide();
        $('.fetchisbn').show();
        $('form.bkinfo')[0].reset();
        $('form#bk')[0].reset();
        $('#info').show();
    });
});
</script>
<!-- 
 <script type="text/javascript" src="<?=base_url('js/t.js')?>"></script>
 -->
<?php $this->load->view('footer'); ?>

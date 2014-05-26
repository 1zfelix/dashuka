<?php $this->load->view('header'); ?>

<div class="container">
    <div class="quickisbn row" style="padding: 40px 0">
        <form class="form-horizontal col-lg-12 col-xs-12" action="">
            <div class="isbn form-group">
                <label for="isbn" class="col-lg-2 control-label">ISBN</label>
                <div class="col-lg-8">
                    <input type="text" placeholder="ISBN" class="form-control" name="isbn" id="isbn">
                </div>
            </div>
            <div class="form-group">
                <p style="text-align:center" class="fetchisbn">
                    <button type="button" class="btn btn-success" style="text-align:center" id="fetchisbn">快速添加书籍信息</button>&nbsp;&nbsp;
                    <button type="button" class="addmanually btn btn-default" style="text-align:center">手动添加</button>
                </p>
                <div class="alert alert-warning" id="errorisbn" style="display:none">
                    获取失败,您可以:&nbsp;
                    <button type="button" class="searchagain btn btn-success" style="text-align:center">重新搜索</button>&nbsp;&nbsp;
                    <button type="button" class="addmanually btn btn-success" style="text-align:center">手动添加</button>
                </div>
                <div class="alert alert-success" id="succisbn" style="display:none">
                    获取成功,请完善以下信息,或者您可以:&nbsp;
                    <button type="button" class="searchagain btn btn-success btn-sm" style="text-align:center">重新搜索</button>&nbsp;&nbsp;  
                </div>
                <div class="alert alert-info" id="runisbn" style="display:none">
                    正在查找,请稍等,或者您可以:&nbsp;
                    <button type="button" class="searchagain btn btn-success btn-sm" style="text-align:center">重新搜索</button>&nbsp;&nbsp; 
                </div>
                <div class="alert alert-success" id="manuisbn" style="display:none">
                    手动添加模式,请完善以下信息,或者您可以:&nbsp;
                    <button type="button" class="searchagain btn btn-success btn-sm" style="text-align:center">快速搜索</button>&nbsp;&nbsp;  
                </div>
            </div>
        </form>
    </div>
    <div class="info quick row" style="padding-bottom: 40px; display: none">
        <div class="ui two column middle aligned relaxed grid basic segment">
            <div class="column">
            <!-- <div class="col-lg-6 col-xs-12"></div> -->
                <?php $this->load->view('sale_bookinfo_show');?>
            </div>
            <div class="ui vertical divider"></div>
            <div class="aligned column">
            <!-- <div class="col-lg-6 col-xs-12"></div> -->
                <?php $this->load->view('sale_bookinfo_quick');?>
            </div>
        </div>
    </div>
    <div class="info manually row" style="padding-bottom: 40px; display: none">
        <?php $this->load->view('sale_bookinfo_quick');?>
    </div>
    <div id="qfbtn" class="info quick row" style="padding-bottom: 40px; display: none">
        <p style="text-align:center">
            <button type="button" class="quick btn btn-success" style="text-align:center" id="quickform">提交</button>&nbsp;&nbsp;
            <button type="button" class="editmanually btn btn-default" style="text-align:center" id="editbtn">修改</button>
        </p>
    </div>
</div>

<script type='text/javascript'>
$(document).ready(function() {
    
    var ajv;
    
    $('#fetchisbn').click(function() {
        if ($('#isbn').val().length == 10 || $('#isbn').val().length == 13) {
            $('.fetchisbn').hide();
            $('#runisbn').show();
            ajv=$.get('<?=base_url('index.php/ajax/isbn')?>' + '/' + $('#isbn').val(), function(data) {
                console.log(data);
                data = JSON.parse(data);
                $('#runisbn').hide();
                if (data['msg'] == 'book_not_found') {
                    $('#errorisbn').show();
                } else {
                    $('.isbn').hide();
                    $('#succisbn').show();
                    
                    bookname = data['title'];
                    author = data['author'];
                    press = data['publisher'];
                    pubdate = data['pubdate'];
                    
                    $('.qf_isbn').val(data['isbn13']);
                    $('.qf_name').val(bookname);
                    $('.qf_author').val(author);
                    $('.qf_press').val(press);
                    $('.qf_pub').val(pubdate);
                    
                    $('#qs_bkname').text(bookname);
                    $('#qs_bkauthor').text(author);
                    $('#qs_bkpress').text(press);
                    $('#qs_bkpub').text(pubdate);
                    $('#qs_bkimg').attr('src',data['images']['large']);
                    $('#qs_bkisbn').text(data['isbn10']+', '+data['isbn13']);
                    
                    $('#quickform').removeClass('manually');
                    $('#quickform').addClass('quick');
                    $('#qfbtn').removeClass('manually');
                    $('#qfbtn').addClass('quick');
                    $('#editbtn').show();
                    $('.hi').hide();
                    $('.info.quick').show();
                }
            });
        }
        else {
            alert('isbn格式错误');
        }
    });

    $('.searchagain').click(function() {
        if ( ajv != null ) {
            ajv.abort();
        }
        $('#errorisbn').hide();
        $('#succisbn').hide();
        $('#runisbn').hide();
        $('#manuisbn').hide();
        $('#bk')[0].reset();
        $('.isbn').show();
        $('.fetchisbn').show();
        $('.info').hide();
    });

    $('.addmanually').click(function() {
        $('#bk')[0].reset();
        $('.fetchisbn').hide();
        $('.isbn').hide();
        $('#manuisbn').show();
        $('#errorisbn').hide();
        
        $('#bk').addClass('manually');
        $('#qfbtn').removeClass('quick');
        $('#qfbtn').addClass('manually');
        $('#quickform').removeClass('quick');
        $('#quickform').addClass('manually');
        $('#editbtn').hide();
        
        $('.quick').hide();
        $('.hi').show();
        $('.info.manually').show();
    });

    $('.editmanually').click(function() {
        $('#bk').addClass('manually');
        $('#qfbtn').removeClass('quick');
        $('#qfbtn').addClass('manually');
        $('#quickform').removeClass('quick');
        $('#quickform').addClass('manually');
        $('#editbtn').hide();
        $('#errorisbn').hide();
        $('.quick').hide();
        $('.hi').show();
        $('.info.manually').show();
    });

    $('.quick#quickform').click(function() {
        
    });
    $('.manually#quickform').click(function() {
        
    });
});
</script>
<!-- 
 <script type="text/javascript" src="<?=base_url('js/t.js')?>"></script>
 -->
<?php $this->load->view('footer'); ?>

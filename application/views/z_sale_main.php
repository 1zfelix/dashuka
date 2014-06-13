<?php $this->load->view('header'); ?>
   
<?php $this->load->view('sale_sidebar');?>

<div class="container">

    <div class="row" style="margin: 0 50px; padding: 40px 0">
        <form id="quickIsbnForm" class="form-horizontal col-lg-12 col-xs-12">
            
            <div class="form-group QuickIsbn">
                <label for="isbn" class="col-lg-2 control-label">ISBN</label>
                <div class="col-lg-8">
                    <input type="text" placeholder="ISBN" class="form-control FormInputItem" name="isbn" id="isbn">
                </div>
            </div>
            
            <div class="form-group QuickIsbn">
                <p style="text-align:center">
                    <button type="button" class="btn btn-success" style="text-align:center" id="fetchisbn">快速添加书籍信息</button>&nbsp;&nbsp;
                    <button type="button" class="addmanually btn btn-default" style="text-align:center">手动添加</button>
                </p>
            </div>

            <div class="form-group QuickStatus">
                <div id="errorisbn" class="alert alert-warning" style="display:none">
                    获取失败,您可以:&nbsp;
                    <button type="button" class="searchagain btn btn-success btn-sm" style="text-align:center">重新搜索</button>&nbsp;&nbsp;
                    <button type="button" class="addmanually btn btn-info btn-sm" style="text-align:center">手动添加</button>
                </div>
                <div id="succisbn" class="alert alert-success" style="display:none">
                    获取成功,请完善以下信息,或者您可以:&nbsp;
                    <button type="button" class="searchagain btn btn-success btn-sm" style="text-align:center">重新搜索</button>&nbsp;&nbsp;  
                </div>
                <div id="runisbn" class="alert alert-info" style="display:none">
                    正在查找,请稍等,或者您可以:&nbsp;
                    <button type="button" class="searchagain btn btn-success btn-sm" style="text-align:center">重新搜索</button>&nbsp;&nbsp; 
                </div>
                <div id="manuisbn" class="alert alert-success" style="display:none">
                    手动添加模式,请完善以下信息,或者您可以:&nbsp;
                    <button type="button" class="searchagain btn btn-success btn-sm" style="text-align:center">快速搜索</button>&nbsp;&nbsp;  
                </div>
                <div id="succSidebar" class="alert alert-success" style="display:none">
                    添加成功,请在"已添加的书"中查看
                </div>
            </div>

        </form>
    </div>
    
    <div class="BookInfo QuickFront QuickForm row" style="margin: 0 50px; padding-bottom: 40px; display: none">
        <div class="ui two column middle aligned relaxed grid basic segment">
            <div class="column">
                <?php $this->load->view('sale_bookinfo_show_table');?>
            </div>
            <div class="ui vertical divider"></div>
            <div class="aligned column">
                <?php $this->load->view('sale_bookinfo_quick_front');?>
            </div>
        </div>
    </div>
    
    <div class="BookInfo QuickBack row" style="margin: 0 50px; padding-bottom: 40px; display: none">
        <?php $this->load->view('sale_bookinfo_quick_back');?>
    </div>
    <div class="BookInfo manually row" style="margin: 0 50px; padding-bottom: 40px; display: none">
        <?php $this->load->view('sale_bookinfo_manu');?>
    </div>
    
    <div class="BookInfo QuickFront row" style="margin: 0 50px; padding-bottom: 40px; display: none" id="formBtnSet">
        <p style="text-align:center">
            <button type="button" class="QuickFront btn btn-success" id="quickFormSubmitBtn">提交到书架</button>
            <button type="button" class="manually btn btn-success" id="manuFormSubmitBtn" style="display:none">提交到书架</button>
            &nbsp;&nbsp;
            <button type="button" class="btn btn-default" id="editManuBtn">修改</button>
            <button type="button" class="btn btn-default" id="cancelEditBtn" style="display:none">取消</button>
        </p>
    </div>

</div>

<script type='text/javascript'>

$(document).ready(function() {
    
    var ajaxProc2Halt;

    $('.searchagain').click(function() {
        if ( ajaxProc2Halt != null ) {
            ajaxProc2Halt.abort();
        }
        $('#quickIsbnForm')[0].reset();
        $('#quickFrontForm')[0].reset();
        $('#quickBackForm')[0].reset();
        $('#manuForm')[0].reset();
        $('.QuickStatus .alert').hide();
        $('.QuickIsbn').show();
        $('.BookInfo').hide();
    });

    $('.addmanually').click(function() {
        $('#quickIsbnForm')[0].reset();
        $('#quickFrontForm')[0].reset();
        $('#quickBackForm')[0].reset();
        $('#manuForm')[0].reset();
        
        $('.QuickIsbn').hide();
        $('.QuickStatus .alert').hide();
        $('.QuickStatus #manuisbn').show();
        
        $('#formBtnSet').removeClass('QuickFront');
        $('#formBtnSet').addClass('manually');
        $('#editManuBtn').hide();
        $('#quickFormSubmitBtn').hide();
        $('#manuFormSubmitBtn').show();
        
        $('.QuickFront').hide();
        $('.manually').show();
    });
    
    $('#fetchisbn').click(function() {
        if ( !($('#isbn').val().length == 10 || $('#isbn').val().length == 13) ) {
            alert('isbn格式错误');
            return false;
        }

        $('.QuickIsbn').hide();
        $('.QuickStatus .alert').hide();
        $('#runisbn').show();
        
        ajaxProc2Halt = $.get('<?=base_url('index.php/ajax/isbn')?>' + '/' + $('#isbn').val(), function(data) {
            console.log(data);
            data = JSON.parse(data);
            
            $('#runisbn').hide();
            
            if (data['msg'] == 'book_not_found') {   
                $('#errorisbn').show();
                return false;
            }

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
            $('.qf_imgurl').val(data['images']['large']);
            
            $('#qs_bkname').text(bookname);
            $('#qs_bkauthor').text(author);
            $('#qs_bkpress').text(press);
            $('#qs_bkpub').text(pubdate);
            $('#qs_bkimg').attr('src',data['images']['medium']);
            $('#qs_bkisbn').text(data['isbn10']+', '+data['isbn13']);
            
            $('#formBtnSet').removeClass('manually');
            $('#formBtnSet').addClass('QuickFront');
            $('#manuFormSubmitBtn').hide();
            $('#quickFormSubmitBtn').show();
            $('#editManuBtn').show();
            $('.QuickFront').show();

        });
    });

    $('#editManuBtn').click(function() {
        $(this).hide();
        $('#cancelEditBtn').show();
        $('.QuickFront.QuickForm').hide();
        $('.QuickBack').show();
        $('.QuickBack .FormInputItem').addClass('User');
    });

    $('#quickFormSubmitBtn').click(function() {
        var flag=true;
        $('.FormInputItem.User').each(function() {
            if ($(this).val()=="" || $(this).val()=="none") {
                $(this).parent().parent('.form-group').addClass('has-error');
                flag=false;
            }
        });
        if (!flag) {
            return false;
        }
        var singleBookInfo = formInput2Json('QuickBack');
        bookInfo2Sidebar(singleBookInfo,'QuickBack');
        submit2Sidebar();
    });

    $('.FormInputItem.User').focus(function() {
        $(this).parent().parent('.form-group').removeClass('has-error');
    });

    $('.FormInputItem.User').blur(function() {
        if ($(this).val()=="" || $(this).val()=="none") {
            $(this).parent().parent('.form-group').addClass('has-error');
            flag=false;
        }
    });


    $('#manuFormSubmitBtn').click(function() {
        var flag=true;
        $('#manuForm .FormInputItem').each(function() {
            if ($(this).val()=="" || $(this).val()=="none") {
                $(this).parent().parent('.form-group').addClass('has-error');
                flag=false;
            }
        });
        if (!flag) {
            return false;
        }
        var singleBookInfo = formInput2Json('manually');
        bookInfo2Sidebar(singleBookInfo,'manually');
        submit2Sidebar();
    });

});

function formInput2Json(type) {
    var singleBookAttrCnt = $('.' + type + ' .FormInputItem').size();
    var singleBookInfo = '{' + $('#isbn').attr('name') + ':"' + $('#isbn').val() + '"';
    var i = 1;
    
    $('.' + type + ' .FormInputItem').each(function(){
        singleBookInfo += ',' + $(this).attr('name') + ':"' + $(this).val() + '"';
        if (i == singleBookAttrCnt) {
            singleBookInfo += '}';
        }
        i++;
    })

    return singleBookInfo;
}

function bookInfo2Sidebar(singleBookInfo, type) {
    var tempBookInfo = $('form input.SidebarBookInfo').val();
    if (tempBookInfo == "") {
        $('form input.SidebarBookInfo').val(singleBookInfo);
    }
    else {
        $('form input.SidebarBookInfo').val(tempBookInfo + ',' + singleBookInfo);
    }

    console.log($('form input.SidebarBookInfo').val());
    
    $('.demo.sidebar .SidebarEmptyInfo').hide();

    var menuitem = '<div class="item"></div>';

    $('.demo.sidebar .header.item').after(
        $('<div class="item"></div>').append(
            $('<b></b>').append(
                $('.' + type + ' .qf_name').val()
            ),
            $('<div class="menu"></div>').append(
                $(menuitem).append(
                    $('.' + type + ' .qf_author').val()
                ),
                $(menuitem).append(
                    $('.' + type + ' .qf_press').val()
                ),
                $(menuitem).append(
                    $('.' + type + ' .qf_pub').val()
                ),
                $(menuitem).append(
                    $('.' + type + ' .qf_isbn').val()
                )
            )                
        )
    );
}

function submit2Sidebar() {
    $('.demo.sidebar')
      .sidebar({
        overlay: false
      })
      .sidebar('show')
    ;
    $('#quickFrontForm')[0].reset();
    $('#quickBackForm')[0].reset();
    $('#manuForm')[0].reset();
    $('.QuickStatus .alert').hide();
    $('.QuickStatus #succSidebar').show();
    $('.QuickIsbn').show();
    $('.BookInfo').hide();
}

// function checkVal() {
//     if ($(.FormInputItem.User).val()=="" || $(.FormInputItem.User).val()=="none") {

//     }
// }
</script>

<?php $this->load->view('footer_empty'); ?>

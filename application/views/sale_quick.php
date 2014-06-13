<?php $this->load->view('header'); ?>
   
<?php $this->load->view('sale_sidebar');?>

<div class="container">

    <div class="row" style="margin: 0 50px; padding: 40px 0">
        <div class="QuickStatus">
            <div id="succisbn" class="alert alert-success">
                获取成功,请完善以下信息,或者您可以:&nbsp;
                <button type="button" class="searchagain btn btn-success btn-sm" style="text-align:center">重新搜索</button>&nbsp;&nbsp;  
            </div>
        </div>
    </div>
    
    <div class="BookInfo QuickFront QuickForm row" style="margin: 0 50px; padding-bottom: 40px">
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
    
    <div class="BookInfo QuickFront row" style="margin: 0 50px; padding-bottom: 40px;" id="formBtnSet">
        <p style="text-align:center">
            <button type="button" class="QuickFront btn btn-success" id="quickFormSubmitBtn">提交到书架</button>
        </p>
    </div>

</div>
<?php $this->load->view('sale_js');?>
<script type='text/javascript'>

$(document).ready(function() {

    initSidebar();
    showBookInfo(<?=$jsonInfo?>);

    $('.searchagain').click(function() {
        location.href="<?=base_url('index.php/go/bookrec')?>";
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
        var singleBookInfo = formInput2Json('QuickFront',<?=$jsonInfo?>);
        submit2Sidebar(singleBookInfo);

        $('input.SidebarBookInfo').val('['+$('input.SidebarBookInfo').val()+']');
        $('form#singleSubmit').submit();
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
});

</script>

<?php $this->load->view('footer_empty'); ?>

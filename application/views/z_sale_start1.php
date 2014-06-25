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
                    <!-- <a href="<?=base_url('index.php/go/manu')?>" class="addmanually btn btn-default" style="text-align:center">手动添加</a> -->
                </p>
            </div>

            <div class="form-group QuickStatus">
                <div id="errorisbn" class="alert alert-warning" style="display:none">
                    获取失败,您可以:&nbsp;
                    <button type="button" class="searchagain btn btn-success btn-sm" style="text-align:center">重新搜索</button>&nbsp;&nbsp;
                    <!-- <a href="<?=base_url('index.php/go/manu')?>" class="addmanually btn btn-info btn-sm" style="text-align:center">手动添加</a> -->
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
                    已添加书籍,请在"已添加的书"中查看
                </div>
            </div>

        </form>
    </div>
    
    <form id="quickForm" action="<?=base_url('index.php/go/quick')?>" method="post" style="display:none">
        <input type="text" name="jsonInfo" id="jsonInfo">
    </form>

</div>
<script src="<?=base_url('js/my.js')?>"></script>
<script type='text/javascript'>

function initSidebar() {
    $.get('<?=base_url('index.php/go/getsess')?>',function(obj){
        console.log("GET: "+obj);
        if (obj == '') { 
            return false;
        }

        $('#succSidebar').show();

        obj = JSON.parse(obj);

        $('.demo.sidebar .SidebarEmptyInfo').hide();

        var menuitem = '<div class="item"></div>';
        var menuitemid = '<div class="item" style="display:none" id="sbbid"></div>';
        
        for (var i=0;i<obj.length;i++) {
            data = obj[i];
            if (i>0) {
                $('input.SidebarBookInfo').val($('input.SidebarBookInfo').val()+','); 
            }
            $('input.SidebarBookInfo').val($('input.SidebarBookInfo').val()+JSON.stringify(data));

            $('.demo.sidebar .header.item').after(
                $('<div class="item"></div>').append(
                    '<span class="close" style="float:right">&times;</span>',
                    $('<b></b>').append(
                        data['org']['title']+" "+data['usr']['price']+"元"
                    ),
                    $('<div class="menu"></div>').append(
                        $(menuitem).append(
                            data['org']['author']
                        ),
                        $(menuitem).append(
                            data['org']['publisher']
                        ),
                        $(menuitem).append(
                            data['usr']['pubdate']
                        ),
                        $(menuitemid).append(
                            data['usr']['bid']
                        )
                    )                
                )
            );
        }
        showSidebar();
    });
}

function showSidebar() {
    $('.demo.sidebar')
      .sidebar({
        overlay: false
      })
      .sidebar('show')
    ;
}

$(document).ready(function() {
    
    var ajaxProc2Halt;

    initSidebar();

    $('.searchagain').click(function() {
        if ( ajaxProc2Halt != null ) {
            ajaxProc2Halt.abort();
        }
        $('#quickIsbnForm')[0].reset();
        $('.QuickStatus .alert').hide();
        $('.QuickIsbn').show();
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
            arr = JSON.parse(data);
            $('#runisbn').hide();
            if (arr['msg'] == 'book_not_found') {   
                $('#errorisbn').show();
                return false;
            }
            $('#jsonInfo').val(data);
            $('#quickForm').submit();
        });
    });

    $('.close').click(function(){
        // $(this).parent().hide();
        alert('ddddd');
        console.log($(this).siblings('.menu').children('#sbbid').text());
        this.parentNode.style.display='none';
        $.get('<?=base_url('index.php/go/getsess')?>',function(data){
            alert('c');    
            console.log('AA: '+data);
            var obj = JSON.parse(data);
            // console.log(obj.length);
            if (obj.length==1) {
                $('.SidebarEmptyInfo').show();
            }
            $('input.SidebarBookInfo').val('');
            for (var i=0;i<obj.length;i++) {
                data = obj[i];
                if (data['usr']['bid']==$(this).siblings('.menu').children('#sbbid').text()) {
                    alert('a');
                    continue;
                }
                if ($('input.SidebarBookInfo').val()!='') {
                    $('input.SidebarBookInfo').val($('input.SidebarBookInfo').val()+','); 
                }
                $('input.SidebarBookInfo').val($('input.SidebarBookInfo').val()+JSON.stringify(data));
            }
            var ajaxdata='['+$('input.SidebarBookInfo').val()+']';
            if ($('input.SidebarBookInfo').val()=='') {
                ajaxdata='';
                alert('b');
            }
            $.post('<?=base_url('index.php/go/ajaxsess')?>',{'newsess':ajaxdata},function(data){
                console.log(data);
            });
        });
    });
});

</script>

<?php $this->load->view('footer_empty'); ?>

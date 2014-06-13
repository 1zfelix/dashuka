<script type='text/javascript'>

function showBookInfo(data)
{
    data = JSON.parse(data);
    $('#qs_bkname').text(data['title']);
    $('#qs_bkauthor').text(data['author']);
    $('#qs_bkpress').text(data['publisher']);
    $('#pubdate').val(data['pubdate']);
    $('#staticPubDate p a').before($('#pubdate').val());
    $('#qs_bkimg').attr('src',data['images']['medium']);
    $('#qs_bkisbn').text(data['isbn10']+', '+data['isbn13']);
}

function sidebarBtnStatus(status)
{
    if (status=='disabled') {
        $('#allBookSubmitBtn').addClass('disabled');
        $('#allBookSubmitBtn').attr('disabled','disabled');
    }
    else if (status=='enabled') {
        $('#allBookSubmitBtn').removeClass('disabled');
        $('#allBookSubmitBtn').removeAttr('disabled');
    }
}

function initSidebar()
{
    $.get('<?=base_url('index.php/go/getsess')?>',function(obj){
        console.log("GET: "+obj);
        if (obj == '') {
            sidebarBtnStatus('disabled');
            return false;
        }  
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
                    // '<button class="close closeSidebarItem" style="float:right">&times;</button>',
                    '<button class="close closeSidebarItem" style="float:right"  onclick="javascript:this.parentNode.style.display=\'none\';closeSideBarItem($(this).siblings(\'.menu\').children(\'#sbbid\').text());">&times;</button>',
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

function formInput2Json(type,data)
{
    var arr = JSON.parse(data);
    console.log(arr);
    var singleBookAttrCnt = $('.' + type + ' .FormInputItem').size();
    var singleBookInfo = '{"isbn":' + '"' + arr['isbn13'] + '"';
    var i = 1;
    
    $('.' + type + ' .FormInputItem').each(function(){
        singleBookInfo += ',"' + $(this).attr('name') + '":"' + $(this).val() + '"';
        if (i == singleBookAttrCnt) {
            singleBookInfo += '}';
        }
        i++;
    })
    var myEscapedJSONString = data.replace(/\\n/g, "");

    singleBookInfo = '{"org":'+myEscapedJSONString+','+'"usr":'+singleBookInfo+'}';
    return singleBookInfo;
}

function submit2Sidebar(singleBookInfo)
{
    var tempBookInfo = $('form input.SidebarBookInfo').val();
    if (tempBookInfo == "") {
        $('form input.SidebarBookInfo').val(singleBookInfo);
    }
    else {
        $('form input.SidebarBookInfo').val(tempBookInfo + ',' + singleBookInfo);
    }
    sidebarBtnStatus('enabled');
}

function showSidebar()
{
    $('.demo.sidebar')
      .sidebar({
        overlay: false
      })
      .sidebar('show')
    ;
}

function closeSideBarItem(bid)
{
    $.get('<?=base_url('index.php/go/getsess')?>',function(data){
        // alert('c');    
        var obj = JSON.parse(data);
        // console.log(obj.length);
        if (obj.length==1) {
            $('.SidebarEmptyInfo').show();
            sidebarBtnStatus('disabled');
        }
        $('input.SidebarBookInfo').val('');
        for (var i=0;i<obj.length;i++) {
            data = obj[i];
            if (data['usr']['bid']==bid) {
                // alert('a');
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
            // alert('b');
        }
        $.post('<?=base_url('index.php/go/ajaxsess')?>',{'newsess':ajaxdata},function(data){
            console.log('NS: '+data);
        });
    });
}

// $(function(){
//     $('button.closeSidebarItem').click(function(){
//         // $(this).parent().hide();
//         alert('ddddd');
//         this.parentNode.style.display='none';
//         console.log($(this).siblings('.menu').children('#sbbid').text());
//         $.get('<?=base_url('index.php/go/getsess')?>',function(data){
//             alert('c');    
//             console.log('AA: '+data);
//             var obj = JSON.parse(data);
//             // console.log(obj.length);
//             if (obj.length==1) {
//                 $('.SidebarEmptyInfo').show();
//             }
//             $('input.SidebarBookInfo').val('');
//             for (var i=0;i<obj.length;i++) {
//                 data = obj[i];
//                 if (data['usr']['bid']==$(this).siblings('.menu').children('#sbbid').text()) {
//                     alert('a');
//                     continue;
//                 }
//                 if ($('input.SidebarBookInfo').val()!='') {
//                     $('input.SidebarBookInfo').val($('input.SidebarBookInfo').val()+','); 
//                 }
//                 $('input.SidebarBookInfo').val($('input.SidebarBookInfo').val()+JSON.stringify(data));
//             }
//             var ajaxdata='['+$('input.SidebarBookInfo').val()+']';
//             if ($('input.SidebarBookInfo').val()=='') {
//                 ajaxdata='';
//                 alert('b');
//             }
//             $.post('<?=base_url('index.php/go/ajaxsess')?>',{'newsess':ajaxdata},function(data){
//                 console.log(data);
//             });
//         });
//     });
// });

</script>
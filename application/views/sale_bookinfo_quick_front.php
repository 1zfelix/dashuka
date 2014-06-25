
<form id="quickFrontForm" class="form-horizontal">
    
    <input type="text" class="FormInputItem" style="display:none" name="bid" id="bid">
    
    <div class="form-group">
        <label for="pubdate" class="col-lg-3 control-label">版次</label>
        <div class="col-lg-8" id="staticPubDate">
            <p class="form-control-static"><a href="javascript:editPubDateFunc()" style="float:right">修改</a></p>   
        </div>
        <div class="col-lg-8" style="display:none" id="activePubDate"> 
            <div class="input-group">
            <input type="text" class="form-control FormInputItem User" name="pubdate" id="pubdate">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button" id="confirmPubDate">确定</button>
            </span>
        </div>
        </div>
    </div>
  

    <div class="form-group">
        <label for="type" class="col-lg-3 control-label">类型</label>
        <div class="col-lg-8">
            <select class="form-control FormInputItem User" name="type" id="type">
                <option value="none">请选择</option>
                <option value="textbook">教材</option>
                <option value="magazine">杂志</option>
                <option value="journal">英语</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="old" class="col-lg-3 control-label">成色</label>
        <div class="col-lg-8">
            <select class="form-control FormInputItem User" name="old" id="old">
                <option value="none">请选择</option>
                <option value="100">全新</option>
                <option value="99">有笔记基本全新</option>
                <option value="90">封面破损</option>
                <option value="50">缺页或其他</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="price" class="col-lg-3 control-label">价格</label>
        <div class="col-lg-8">
            <input type="text" placeholder="价格" class="form-control FormInputItem User" name="price" id="price">
        </div>
    </div>

</form>

<script type="text/javascript">
$(function(){
    $('#bid').val((new Date()).valueOf()+'<?=$this->session->userdata('session_id')?>');
    $('#confirmPubDate').click(function(){
        $('#staticPubDate p').html($('#pubdate').val()+'<a href="javascript:editPubDateFunc()" style="float:right">修改</a>');
        $('#activePubDate').hide();
        $('#staticPubDate').show();
    });
});
function editPubDateFunc()
{
    $('#staticPubDate').hide();
    $('#activePubDate').show();
}
</script>

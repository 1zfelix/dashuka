
<form id="quickFrontForm" class="form-horizontal">
    
    <div style="display:none">
        <input type="text" class="qf_name FormInputItem" name="name">

        <input type="text" class="qf_author FormInputItem" name="authors">

        <input type="text" class="qf_pub FormInputItem" name="pubdate">

        <input type="text" class="qf_press FormInputItem" name="press">

        <input type="text" class="qf_imgurl FormInputItem" name="imgurl">
    </div>

    <div class="form-group">
        <label for="type" class="col-lg-3 control-label">类型</label>
        <div class="col-lg-8">
            <select class="form-control FormInputItem User" name="type" id="type">
                <option value="none">请选择</option>
                <option value="textbook">教材</option>
                <option value="magazine">杂志</option>
                <option value="journal">期刊</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="old" class="col-lg-3 control-label">成色</label>
        <div class="col-lg-8">
            <select class="form-control FormInputItem User" name="old" id="old">
                <option value="none">请选择</option>
                <option value="100">全新</option>
                <option value="99">99成新</option>
                <option value="90">9成新</option>
                <option value="50">其他</option>
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

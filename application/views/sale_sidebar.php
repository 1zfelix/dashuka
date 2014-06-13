 
    <div class="ui red demo sidebar vertical menu" style="padding-top:50px">
        <div class="header item">已添加的书</div>
        <div class="item SidebarEmptyInfo">请添加一本书...</div>
        <form id="totalSubmit" action="<?=base_url('index.php\go\user')?>" method="post">
            <input type="text" class="TotalBookInfo" style="display:none" name="jsoninfo"></input>
            <hr>
            <div style="padding: 0 20px">
                <button class="ui black fluid button huge" id="allBookSubmitBtn" type="button">出售这些书</button>
                <button class="ui black fluid button huge" id="returnSubmitBtn" style="display:none" type="button">返回上一步</button>
            </div>
        </form>
        <form id="singleSubmit" action="<?=base_url('index.php\go\bookrec')?>" method="post">
            <input type="text" class="SidebarBookInfo" style="display:none" name="added"></input>
        </form>
    </div>

    <div class="ui black launch right attached button massive" style="width: 50px; position: fixed;">
        <i class="icon list layout"></i>
        <span class="text" style="display: none;">已添加的书</span>
    </div>

    <script type="text/javascript">
        $('.ui.launch.button').mouseover(function(){
            $(this).removeAttr("style");
            $(this).attr("style","position: fixed;");
            $('.text').attr("style","display: inline-block;");
        })
        $('.ui.launch.button').mouseout(function(){
            $(this).attr("style","width: 50px; position: fixed;");
            $('.text').hide();
        })
        $('.ui.launch.button').click(function(){
            $('.demo.sidebar')
              .sidebar({
                overlay: false
              })
              .sidebar('toggle')
            ;
        })
        $('#allBookSubmitBtn').click(function(){
            $('input.TotalBookInfo').val('['+$('input.SidebarBookInfo').val()+']');
            $('form#totalSubmit').submit();
        })
    </script>
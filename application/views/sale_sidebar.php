 
    <div class="ui red demo sidebar vertical menu" style="padding-top:50px">
        <div class="header item">已添加的书</div>
        <div class="item SidebarEmptyInfo">请添加一本书...</div>
        <form class="TotalBookInfo" action="<?=base_url('index.php\go\user')?>" method="post">
            <input type="text" class="SidebarBookInfo" style="display:none" name="jsoninfo"></input>
            <hr>
            <div style="padding: 0 20px">
                <button class="ui black fluid button huge" id="allBookSubmitBtn" type="submit">Submit</button>
                <button class="ui black fluid button huge" id="returnSubmitBtn" style="display:none" type="button">返回上一步</button>
            </div>
        </form>
    </div>

    <div class="ui black huge launch right attached button" style="width: 50px; position: fixed;">
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
        $('.ui.launch.button').click(function() {
            $('.demo.sidebar')
              .sidebar({
                overlay: false
              })
              .sidebar('toggle')
            ;
        })
    </script>
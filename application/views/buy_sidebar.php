    <?php
        $TypeMap = array(
            'textbook' => '教材',
            'magazine' => '杂志',
            'journal' => '英语',
            'other' => '其他'
        );
        $OldMap = array(
            '100' => '全新',
            '99' => '99成新',
            '90' => '9成新',
            '50' => '其他'
        );
    ?>
<div class="ui vertical secondary menu mysidebar" style="position:fixed;">
    
<!--     <a class="item" href="">返回顶部</a>
    <a class="item" href="<?=base_url('index.php')?>">返回主页</a> -->
    <div class="item">
        <center>
            <div class="ui buttons">
                <a class="ui purple button" href="">返回顶部</a>
                <div class="or"></div>
                <a class="ui button" href="<?=base_url('index.php')?>">主页</a>
            </div>
        </center>
    </div>
    <!-- <hr> -->
    <a class="item active SelectType" href="<?=base_url('index.php/go/SBP/1/10/all/0')?>" id="all">全部</a>
    <?php
        foreach ($TypeMap as $key => $value) {
            $href = base_url('index.php/go/SBP/1/10/type/').$key;
            echo '<a class="item SelectType" href="'.$href.'" id="'.$key.'">'.$value.'</a>';
        }
    ?>
</div>

<script type="text/javascript">
function selectTypeStatus()
{
    // console.log('<?=$this->uri->segment(6, 0)?>');
    $('a.ui.button').css('font-size','13px');
    $('a.SelectType').css('font-size','16px');
    $('a').css('font-family','"microsoft yahei",simhei');
    $('a.SelectType').removeClass('active');
    if ('<?=$this->uri->segment(6, 0)?>' != '0'){
        $('a.SelectType#'+'<?=$this->uri->segment(6, 0)?>').addClass('active');
    }
    else {
        $('a.SelectType#all').addClass('active');
    }
}

$(document).ready(function(){

    $(document).scroll(function(){
        if ( $('.mysidebar').height() + $('body').scrollTop() - 50 > $('.mymain').height() ) {
            $('.mysidebar').attr("style","position:relative");
            var tt = $('.mymain').offset().top + $('.mymain').height() - $('.mysidebar').height();
            if (tt<60) tt=60;
            $('.mysidebar').offset({
                top : 50 + tt
            });
        }
        else{
            $('.mysidebar').attr("style","position:fixed");
        }
    });
    
    selectTypeStatus();

});
</script>
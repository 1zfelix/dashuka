<?php $this->load->view('header');?>

<div class="container" style="padding: 40px">

    <div class="row" style="padding: 10px">
    </div>

    <div class="row" style="padding: 10px">
        <div class="col-lg-3 col-xs-3">
            <div class="ui vertical secondary menu mysidebar" style="position:fixed">
                <a class="item" href="">返回顶部</a>
                <a class="item" href="<?=base_url('index.php')?>">返回主页</a>
                <hr>
                <a class="item active">Types</a>
                <a class="item">Variations</a>
                <a class="item">Variations</a>
                <a class="item">Variations</a>
                <a class="item">Variations</a>
                <a class="item">Variations</a>
                <a class="item">Variations</a>
                <a class="item">Variations</a>
                <a class="item">Variations</a>
                <a class="item">Variations</a>
                <a class="item">Variations</a>
                <a class="item">Variations</a>
                <a class="item">Variations</a>

            </div>
        </div>

        <div class="col-lg-9 col-xs-9">
            <ul class="list-group mymain" id="bklist">
                <!-- <div class="ui list"> -->
                <!-- <ul class="media-list"> -->
                <?php foreach ($result as $row) { $par[ 'row']=$row; $this->load->view('buy_listallbooks',$par); } ?>
                <!-- </ul> -->
                <!-- </div>  -->
            </ul>

            <ul class="pagination">
                <?php $backPage=$currPage>1?$currPage-1:1; $forwPage=$currPage
                <$pageNum?$currPage+1:$pageNum; ?>
                    <?php if ($currPage==1) echo "<li class='disabled'><a>&laquo;</a></li>"; else { echo "<li>"; ?>
                    <a href="<?=base_url('index.php/go/booklist').'/'.$backPage.'/'.$perSize?>">&laquo;</a>
                    </li>
                    <?php } for ($i=1;$i<=$pageNum;$i++){ if ($i==$currPage) echo "<li class='active'>"; else echo "<li>"; ?>
                    <a href="<?=base_url('index.php/go/booklist').'/'.$i.'/'.$perSize?>">
                        <?=$i?>
                    </a>
                    </li>
                    <?php } ?>
                    <?php if ($currPage==$pageNum) echo "<li class='disabled'><a>&raquo;</a></li>"; else { echo "<li>"; ?>
                    <a href="<?=base_url('index.php/go/booklist').'/'.$forwPage.'/'.$perSize?>">&raquo;</a>
                    </li>
                    <?php } ?>
            </ul>

<!--             <a href="" class="btn btn-primary btn-md" style="float: right; margin-left: 5px; margin-right: 5px; margin-top: 20px; margin-bottom: 20px;">返回顶部</a>
            <a href="<?=base_url('index.php')?>" class="btn btn-default btn-md" style="float: right; margin-left: 5px; margin-right: 5px; margin-top: 20px; margin-bottom: 20px;">返回主页</a> -->
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
    $(document).scroll(function(){
        if ( $('.mysidebar').height() + $('body').scrollTop() - 50 > $('.mymain').height() ) {
            $('.mysidebar').attr("style","position:relative");
            $('.mysidebar').offset({
                top : 50 + $('.mymain').offset().top + $('.mymain').height() - $('.mysidebar').height()
            });
        }
        else{
            $('.mysidebar').attr("style","position:fixed");
        }
    });
})
</script>
<?php $this->load->view('footer');?>

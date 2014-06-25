<?php $this->load->view('header_buy');?>
    <?php
        $TypeMap = array(
            'textbook' => '教材',
            'magazine' => '杂志',
            'journal' => '英语',
            'other' => '其他'
        );
        $OldMap = array(
            '100' => '全新',
            '99' => '有笔记基本全新',
            '90' => '封面破损',
            '50' => '缺页或其他'
        );
    ?>
<div class="container" style="padding: 40px">

    <div class="row" style="padding: 10px">
    </div>

    <div class="row" style="padding: 10px">
        <div class="col-lg-3 col-xs-3">
            <?php $this->load->view('buy_sidebar');?>
        </div>

        <div class="col-lg-9 col-xs-9">
            <ul class="list-group mymain" id="bklist">
                <?php 
                    // foreach ($result as $row) 
                    for ($i=count($result)-1;$i>=0;$i--)
                    { 
                        $par['row']=$result[$i]; 
                        $this->load->view('buy_listallbooks',$par); 
                    } 
                ?>
            </ul>

            <ul class="pagination">
                <?php 
                    $backPage=$currPage>1?$currPage-1:1; 
                    $forwPage=$currPage<$pageNum?$currPage+1:$pageNum; 
                ?>
                <?php 
                    if ($currPage==1) {
                        echo "<li class='disabled'><a>&laquo;</a></li>";
                    } 
                    else { 
                        echo "<li>";
                ?>
                        <a href="<?=base_url('index.php/go/SBP').'/'.$backPage.'/'.$perSize.'/'.$prop.'/'.$val?>">&laquo;</a>
                        </li>
                <?php 
                    } 
                    for ($i=1;$i<=$pageNum;$i++){ 
                        if ($i==$currPage) {
                            echo "<li class='active'>"; 
                        }
                        else {
                            echo "<li>"; 
                        }
                ?>
                        <a href="<?=base_url('index.php/go/SBP').'/'.$i.'/'.$perSize.'/'.$prop.'/'.$val?>">
                            <?=$i?>
                        </a>
                        </li>
                <?php 
                    } 
                ?>
                <?php 
                    if ($currPage==$pageNum) 
                        echo "<li class='disabled'><a>&raquo;</a></li>"; 
                    else { 
                        echo "<li>"; 
                ?>
                        <a href="<?=base_url('index.php/go/SBP').'/'.$forwPage.'/'.$perSize.'/'.$prop.'/'.$val?>">&raquo;</a>
                        </li>
                <?php 
                    } 
                ?>
            </ul>
        </div>
    </div>
</div>


<?php $this->load->view('footer');?>

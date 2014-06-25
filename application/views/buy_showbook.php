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
<?php 
    $row=$row[0];
    $authorArr = json_decode($row->authors);
    $authorStr = '';
    foreach ($authorArr as $key => $value) {
        $authorStr = $authorStr. $value . '&nbsp;';
    }

    $type = $TypeMap[$row->type];
    $old = $OldMap[$row->old];
    $detail = false;
    if (!isset($row->desc)){
        $desc='描述加载中...';
        $detail = true;
    }
?>
<div class="container" style="padding: 40px">

    <div class="row" style="padding: 10px">

    </div>
    
    
    <div class="row" style="padding: 10px; margin:0">
        <div class="col-lg-6">
            <?php 
                $par['row']=$row;
                $this->load->view('buy_showbook_img',$par);
            ?>
        </div>

        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div>
                        <h3><b>书籍名称:&nbsp;&nbsp;<small><?=$row->name?></small></b></h3>
                    </div>
                    <div>
                        <table class="table" style="margin:0">
                            <tr class="row">
                                <td class="col-lg-8" style="padding-top: 20px">
                                    <h2>基本信息</h2>
                                    <h4>[<?=$type?>]&nbsp;&nbsp;
                                            <?=$row->price?>元</h4>
                                    <div class="list-group" style="margin:0">
                                        <p class="list-group-item-text">
                                            <?=$authorStr?>&nbsp;&nbsp;<br>
                                                <?=$row->press?>&nbsp;&nbsp;<br>版次:&nbsp;
                                                    <?=$row->pubdate?></p><br>
                                        <p class="list-group-item-text">成色:&nbsp;
                                            <?=$old?></p>
                                    </div>
                                </td>
                                <?php $buyurl=base_url('index.php/go/buy/'.$row->bid)?>
                                <td class="col-lg-4" style="vertical-align: middle; padding-top: 20px">
                                    <a class="ui labeled icon button huge black" id="buyNow" href="<?=$buyurl?>">
                                        <i class="cart icon"></i>
                                        购买
                                    </a>
                                    <!-- <div class="ui vertical animated button huge">
                                      <div class="hidden content">购买</div>
                                      <div class="visible content">
                                        <i class="cart icon"></i>
                                      </div>
                                    </div> -->
                                </td>
                            </tr>
                        </table>
                    </div>
                    <hr>
                    <!-- <div>
                        <h2>标签</h2>
                    </div>
                    <hr> -->
                    <div>
                        <h2>详细信息</h2>
                        <p class="col-xs-12" id="detail"><?=$desc?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    if (<?=$detail?>) {
        $.get('<?=base_url('index.php/ajax/isbn')?>' + '/' + <?=$row->isbn?>, function(data) {
            data = JSON.parse(data);
            $('#detail').text(data['summary']);
        });
    }
})
</script>
<?php $this->load->view('footer');?>

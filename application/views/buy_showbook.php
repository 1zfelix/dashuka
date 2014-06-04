<?php $this->load->view('header_buy');?>
<?php $row=$row[0];?>
<div class="container" style="padding: 40px">

    <div class="row" style="padding: 10px">

    </div>

    <div class="row" style="padding: 10px">
        <div class="col-lg-6">
            <?php $this->load->view('buy_showbook_img');?>
        </div>

        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div>
                      <h3><b>书籍名称:&nbsp;&nbsp;<small><?=$row->name?></small></b></h3>
                    </div>
                    <div>
                        <table class="table" style="margin:0">
                            <tr>
                                <td style="padding-top: 20px">
                                    <h2>基本信息</h2>
                                    <h4>[<?=$row->type?>]&nbsp;&nbsp;
                                            <?=$row->price?>元</h4>
                                    <div class="list-group" style="margin:0">
                                        <p class="list-group-item-text">
                                            <?=$row->authors?>&nbsp;著&nbsp;&nbsp;
                                                <?=$row->press?>&nbsp;&nbsp;版次:&nbsp;
                                                    <?=$row->pubdate?></p>
                                        <p class="list-group-item-text">成色:&nbsp;
                                            <?=$row->old?></p>
                                    </div>
                                </td>
                                <td style="vertical-align: middle; padding-top: 20px">
                                    <div class="ui labeled icon button huge black" id="buyNow">
                                        <i class="cart icon"></i>
                                        购买
                                    </div>
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
                    <div>
                        <h2>标签</h2>
                    </div>
                    <hr>
                    <div>
                        <h2>详细信息</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    
})
</script>
<?php $this->load->view('footer');?>

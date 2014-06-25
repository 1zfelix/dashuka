<?php $this->load->view('header');?>

<!-- <div class="container" style="padding: 40px">

    <div class="row" style="padding: 10px">
    </div>

    <div class="row" style="padding: 10px">
        

        <ul class="list-group mymain" id="bklist">
            <?php
                for ($i=count($result)-1;$i>=0;$i--)
                { 
                    $par['row']=$result[$i]; 
                    $this->load->view('adminitem',$par); 
                } 
            ?>
        </ul>

    </div>
</div> -->
<div class="container" style="padding: 40px">

    <div class="row" style="padding: 10px">
        <div class="panel panel-default">
            <div class="panel-body">
                订单信息<br />
                <table class="table table-striped table-hover">
                    <tr>
                        <?php
                            foreach ($result[0] as $key => $value) {
                                echo "<th>$key</th>";
                            }
                            // echo "<th>卖家phone</th>";
                        ?>
                    </tr>
                    <?php
                        for ($i=count($result)-1;$i>=0;$i--)
                        { 
                            $par['row']=$result[$i];
                            $par['saler']=$saler[$result[$i]->bid];
                            $this->load->view('adminitem',$par); 
                        } 
                    ?>
                </table>
            </div>
        </div>  
    </div>

</div>


<?php $this->load->view('footer');?>

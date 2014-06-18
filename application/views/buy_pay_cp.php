	<table class="row">
		<tr>
			<td>
				<a href="" target="_blank">
					<img src="<?=base_url('images/taobao.gif')?>">
				</a>
			</td>
			<td>
				<tr>	
					<font color="#9BB831" size="3"><strong>官方淘宝店充值</strong></font>
					<br>
					<font color="#666666">只要您在官方淘宝店拍了商品，在此输入淘宝订单编号即可充值。</font>
			        <br>
			        <font color="#666666">例如，您需要充值36元，只要拍36件商品即可（单价1元）</font>
			    </tr>
			    <tr>
					<div id="UpdatePanel1">
						<br>
						<td><a href="http://item.taobao.com/item.htm?id=36276252806" target="_blank"><img src="<?=base_url('images/paperpasscom.gif')?>"></a>
							<br>
						</td>
						<td><span class="style2">官方淘宝充值地址：</span><a href="http://item.taobao.com/item.htm?id=36276252806" target="_blank">http://item.taobao.com/item.htm?id=36276252806</a>
						<br>
						亲：拍完宝贝后，千万不要忘记在下面输入“淘宝购买商品的订单编号”，并且点击“淘宝订单编号支付”按钮！
						
						<br><br>
						</td>
					</div>
				</tr>
				<tr>	
					<span id="Label_TaoBao" style="color:Red;"></span>
					<hr>
					淘宝购买商品的订单编号（一次提交一个，提交次数不限）：
					<br>
					<input name="TextBox_TaoBao" type="text" id="TextBox_TaoBao" autocomplete="off" style="width:300px;">
					<br><br>
					<input type="submit" name="Button_TaoBao" value="淘宝订单编号支付" onclick="this.disabled = true;document.getElementById(&quot;waitingtaobao&quot;).innerHTML=&quot;&lt;img src='images/wait.gif'/&gt;&lt;label&gt;&lt;b&gt;正在充值，请耐心等待...&lt;/b&gt;&lt;/label&gt;&quot;;__doPostBack('Button_TaoBao','');" id="Button_TaoBao" style="width:150px;">
					<div id="waitingtaobao"></div>
					
		  			<br>
			        <small>检测论文操作流程：
			            <br>
			            1，登录本网站（www.paperpass.com）。 
			            <br>
			            2，进入“充值中心”页面，计算充值金额，得到所需要拍的相应的商品数量。
			            <br>
			            3，在PaperPass官方店铺拍下您需要购买的商品数量（单价1元），并且付款。
			            <br>
			            4，进入充值中心，输入“淘宝购买商品的订单编号”，点击“淘宝订单支付”按钮。
			            <br>
			  			5，进入“提交论文”页面，提交成功之后，在“查看报告”页面等待检测结果。
					</small>
				</tr>
			</td>
		</tr>
	</table>
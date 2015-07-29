<?php $this->load->view('home/common/header');?>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('static/css/base.css');?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('static/css/orders.css');?>" />
    <script> javascript:window.history.forward(1); </script>
</head>
<body>
    <?php $this->load->view('home/common/menu');?>
<!--以上为动态载入区-->
<!--login-->
<div id="bg"></div>
<div id="show_login_div">
	<div class="login_header">
        <button class="login_close" type="button" onclick="hideLogin()">×</button>
        <h3>提示</h3>
    </div>
    <div class="login_body">
         <form name="loginform" id="loginform">
			<div class="zhifu_div">
				<div style="margin-top:0 auto;" class="desc">
					<strong>请您在新打开的页面上完成付款。</strong>
				</div>
				<div class="field"><p><font color="red">支付成功后订单才会被提交，</font>付款完成前请不要关闭此窗口</p></div>
				<div class="f_login_item">
					<span class="f_login_span l">&nbsp;&nbsp;&nbsp;&nbsp;</span>
					<div>
						<button type="button" id="lgbt" onclick="do_float_alipay();">已完成付款</button>
					</div>
				</div>
			</div>
        </form>
    </div>
    <div style="" class="f_login_reg">
        <a href="<{:U('User/register')}>">付款遇到问题? 联系客服0532-86941917</a>
    </div>
</div>
<div class="content">
	<div class="w_cnt">
	<div class="member_cnt w950">
		<h2 class="member_title ordersTitle">
            订单信息<div class="order_step"><img src="<?php echo base_url('static/images/order_step.gif');?>" width="446" height="25" /></div>
		</h2>
		<div class="orders_content">
			<div class="top_cnt">
				<span class="l"><?php echo $shopname_tmp; ?>▼</span>
				<span class="r" style="color:#666">配送方式：宅当家配送</span>
			</div>
			<table width="100%" cellpadding="0" cellspacing="0" border="0">
				<tr>
					<th class="first">餐品</th>
					<th width="20%">价格</th>
					<th width="20%">数量</th>
					<th width="20%">小计</th>
				</tr>
                <?php foreach($list_tmp as $k=>$mo):?>
				<volist name="list_tmp" id="mo">
					<tr>
						<td class="first"><?php echo $mo['name'];?></td>
						<td>￥<?php echo $mo['price'];?></td>
						<td><?php echo $mo['num'];?>份</td>
						<td class="order_price_count">￥<?php echo $mo['price']*$mo['num'];?></td>
					</tr>
				<?php endforeach;?>
			</table>
			<ul class="orders_fee_lst">
				<li>配送费用：<span><b>￥<?php echo $sendprc_tmp;?></b></span></li>
				<li>订单总价：<span><b>￥<?php echo $sum;?></b></span></li>
				<li>送达时间：立即配送</li>
			</ul>
		</div>
		<div class="member_cnt w950">
			<div class="orders_content">
				<div class="top_cnt  border_top">
					<span class="l">配送信息▼</span>
					<span class="r" style="color:#666">配送信息可在<i>“用户中心”</b></i>保存</span>
				</div>
				<ul class="orders_info">
					<input id="f_uid" type="hidden" name="o_uid" value="<{$uid_tmp}>" />
					<li><b>*</b>您的称谓：<input class="send_info" type="text" id="info_name" value="<?php echo $name_tmp;?>" id="info_tel" name="o_tel" placeholder="怎么称呼您"/></li>
					<li><b>*</b>手机号码：<input class="send_info" type="text" id="info_tel" value="<?php echo $tel_tmp;?>" placeholder="请输入手机号"></li>
					<li><b>*</b>配送地址：<input class="send_info" type="text" id="info_address" value="<?php echo $address_tmp;?>" placeholder="请输入详细的收餐地址"></li>
					<li><b>&nbsp;</b>备注信息：<span><b><input class="send_info" id="info_mark" type="text" value="" placeholder="备注信息(选填)"></b></span></li>


					<li><b>&nbsp;</b>支付方式：
							<input type="radio" value="1" name="pay_type"/>&nbsp;餐到付款
							<input type="radio" value="2" name="pay_type" checked="ckecked"/>&nbsp;在线支付
					</li>
				</ul>
				</ul>
			</div>
			<div class="orders_tips">
				<p>1.请保持电话畅通；若号码无效，我们将会把您的订单设为无效</p>
				<p>2.配送时间将在45分钟内完成。</p>
			</div>
			<div class="orders_btn">
				<input id="return_id" type="button" class="od_btn l" value="重新订购"/>
				<input id="submit_id" type="button" class="od_btn r" value="确认提交"/>
			</div>
            <form name="alipayform" id="alipay_submit" action="<?php echo base_url('home/order/dosubmit');?>" method="post" target="_blank">
				<input type="hidden" id="" name="WIDout_trade_no" value="<?php echo $alipay_trade_code; ?>" />
				<input type="hidden" id="" name="WIDsubject" value="(<?php echo $shopname_tmp; ?>)订单" />
				<input type="hidden" id="" name="WIDtotal_fee" value="<?php echo $sum; ?>" />
				<input type="hidden" id="" name="WIDbody" value="用户(<?php echo $name_tmp; ?>)" />
				<input type="hidden" id="" name="WIDshow_url" value="http://www.163.com/myorder.html" />
				<input type="hidden" id="WID_name" name="WID_name" value="" />
				<input type="hidden" id="WID_tel" name="WID_tel" value="" />
				<input type="hidden" id="WID_address" name="WID_address" value="" />
				<input type="hidden" id="WID_mark" name="WID_mark" value="" />
				<input type="hidden" id="WID_shopid" name="WID_shopid" value="<?php echo $shopid_tmp; ?>" />
				<input type="hidden" id="WID_uid" name="WID_uid" value="<?php echo $uid_tmp; ?>" />
				<input type="hidden" id="" name="from_type" value="alipay" />
			</form>
		</div>
	</div>
</div>
<script>
//防止表单重复提交
$(document).ajaxStart(function(){
	$("#submit_id").val("提交中...");
	$("#submit_id").addClass("clicked").attr("disabled", true);
})
$(document).ajaxStop(function(){
	$("#submit_id").val("确认提交");
	$("#submit_id").removeClass("clicked").attr("disabled", false);
});
//重新订购
$("#return_id").click(function()
{
	window.location.href="<?php echo base_url('home/order/resetCart/shopid/'.$shopid_tmp) ;?>";
})
//提交订单
$("#submit_id").click(function() 
{
	var id = $("#f_uid").val();
	var _name = $("#info_name").val();
	var _tel = $("#info_tel").val();
	var _address = $("#info_address").val();
	//未登录
	if(!id)  
	{
		alert('请先登录!');
		window.location.href = '<?php echo base_url('home/user/login?req_url='.$_SERVER["REQUEST_URI"]); ?>';
		return false;
	}//配送信息不全
	else if(_name==""||_tel==""||_address=="")
	{
		alert('请填写完整配送信息！');
		return false;
	}
	var pay_type=$('input:radio[name="pay_type"]:checked').val();
	var _name = $("#info_name").val();
	var _tel = $("#info_tel").val();
	var _address = $("#info_address").val();
	var _mark = $("#info_mark").val();
	if(pay_type==1)//货到付款
	{
		$.post('<?php echo base_url('home/order/dosubmit');?>',{name:_name,tel:_tel,address:_address,from_type:'pc_order',remark:_mark,shopid:"<?php echo $shopid_tmp; ?>"},function(data)
		{
			if(data.flag=='true')
			{
				$("#submit_id").val("确认提交");
				$("#submit_id").removeClass("clicked").attr("disabled", false);
				alert(data.msg);
				window.location.href='<?php echo base_url('home/user/myorder');?>';
			}else{
				alert(data.msg);
				window.location.href='<?php echo base_url('home/order/ordersubmit');?>';
			}
		},'json')
	}else if(pay_type==2){//在线支付
		showPayDiv();
		$("#WID_name").val(_name);
		$("#WID_tel").val(_tel);
		$("#WID_address").val(_address);
		$("#WID_mark").val(_mark);
		$("#alipay_submit").submit();
	}
})
//支付界面
function showPayDiv() {
	$("#bg").css("display","block");
	$("#show_login_div").css("display","block");
}
//完成付款跳转
function do_float_alipay()
{
	window.location.href='<?php echo base_url('home/user/myorder');?>';
}
</script>
<?php $this->load->view('home/common/footer');?>
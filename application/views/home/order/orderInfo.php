<?php $this->load->view('home/common/header');?>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('static/css/base.css');?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('static/css/orders.css');?>" />
    <script> javascript:window.history.forward(1); </script>
</head>
<body>
    <?php $this->load->view('home/common/menu');?>
<!--以上为动态载入区-->
<div class="content">
	<div class="w_cnt">
	<div class="member_cnt w950">
		<h2 class="member_title ordersTitle">订单信息</h2>
		<div class="orders_content">
		<div class="top_cnt">
			<span class="l"><?php echo $info_tmp['oshop_name'];?></span>
			<span class="r">配送方式：宅当家配送</span>
		</div>
		<table width="100%" cellpadding="0" cellspacing="0" border="0">
			<tr>
				<th class="first">餐品</th>
				<th width="20%">价格</th>
				<th width="20%">数量</th>
				<th width="20%">小计</th>
			</tr>
            <?php foreach($info_tmp['orderlist'] as $k=>$mo) :?>
				<tr>
					<td class="first"><?php echo $mo['fname'];?></td>
					<td>￥<?php echo $mo['fprice'];?></td>
                    <?php if($mo['fnum']>1) :?>
						<td><span><b><?php echo $mo['fnum'];?>份</span></b></td>
					<?php else :?>
						<td><?php echo $mo['fnum'];?>份</td>
					<?php endif;?>
					<td class="order_price_count">￥<?php echo $mo['fprice']*$mo['fnum'];?></td>
				</tr>
			<?php endforeach;?>
		</table>
		<ul class="orders_fee_lst">
			<li>配送费用：<span><b>￥<?php echo $send_price; ?></b></span></li>
			<li>订单总价：<span><b>￥<?php echo $sum; ?></b></span></li>
			<li>支付方式：货到付款</li>
		</ul>
		<ul class="orders_info">
			<li>客户姓名：<?php echo $info_tmp['oname'];?></li>
			<li>手机号：<?php echo $info_tmp['otel'];?></li>
			<li>配送地址：<?php echo $info_tmp['oaddress'];?></li>
			<li>备注：<span><b><?php echo $info_tmp['remark'];?></b></span></li>
		</ul>
        <?php if(!empty($userinfo_tmp)) :?>
			<ul class="orders_info_mark">
                <?php var_dump($userinfo_tmp['address_info']);exit;?>
				<li>标记地址：<span><?php echo $userinfo_tmp['address_info'][0]['mark_address'];?></span></li>
				<li>标记备注：<span><?php echo $userinfo_tmp['base_info']['mark_info'];?></span></li>
			</ul>
			<ul class="orders_info_mark_list">
                <?php foreach($userorder_tmp as $k=>$od) :?>
					<li><?php echo $k; ?>：商家：<?php echo $od['oshop_name']; ?></li>
					<li>地址：<?php echo $od['oaddress']; ?></li>
					<li>电话：<?php echo $od['otel']; ?></li>
				<?php endforeach;?>
			</ul>
		<?php endif;?>
		</div>
		<div class="orders_tips">
			<p>1.请保持电话畅通，若号码无效，我们可能会将您的订单设为无效</p>
			<p>2.配送时间将在45分钟内完成。</p>
		</div>
	</div>
	</div>
</div>
<?php $this->load->view('home/common/footer');?>
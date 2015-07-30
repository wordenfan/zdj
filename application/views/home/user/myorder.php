<?php $this->load->view('home/common/header');?>
<link type="text/css" rel="stylesheet" href="<?php echo base_url('static/css/base.css') ?>" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url('static/css/member.css') ?>" />
</head>
<body>
    <?php $this->load->view('home/common/menu');?>
<!--以上为动态载入区-->
<div class="content">
 <div class="w_cnt">
  <div class="member_cnt w980">
   <h2 class="member_title">
    个人中心
   </h2>
   <div class="member_btm">
    <!--会员中心左侧导航-->
	<?php $this->load->view('home/common/pcenter_menu');?>
    <!--会员中心右侧内容-->
    <div class="member_right r">
     <h3 class="memberR_title">我的订单</h3>
     <div class="memberR_cnt">
      <div class="mem_info_btm">
       <table class="mem_order_lists" cellpadding="0" border="0" cellspacing="0">
        <thead>
         <tr>
          <th width="15%">订单号</th>
          <th width="15%">下单时间</th>
          <th>订单商家</th>
          <th width="13%">订单总额</th>
          <th width="17%">支付</th>
          <th width="12%">状态</th>
          <th width="8%">操作</th>
         </tr>
        </thead>
        <tbody>
        <?php foreach($list as $k=>$vo): ?>
		<tr>
			<td class="order_number"><a target="_blank" href="<?php echo base_url('home/order/orderinfo/oid/'.$vo['oid']);?>"><?php echo $vo['oid'];?></a></td>
			<td><?php echo date('Y-m-d',$vo['opublish']);?></td>
			<td><a href="<?php echo base_url('home/shop/shopinfo/shopid/'.$vo['oshop_id']);?>"><?php echo $vo['oshop_name'];?></a><input type="hidden" value="<?php echo $vo['oshop_id'];?>"/></td>
			<td>￥<?php echo $vo['osum'];?></td>		   
			<td>
                <?php if($vo['pay_status'] == 1) :?>
					<font color="green">支付完成</font>
				<?php elseif($vo['pay_status'] == 0) :?>
					<font color="grey">餐到付款</font>
				<?php elseif($vo['pay_status'] == 2) :?>
					<font color="grey">等待支付</font>
				<?php endif; ?>
			</td>		   
			<td>
            <?php switch($vo['order_status']){
                case 1:
                    echo '<font color="green">已接单</font>';
                    break;
                case 2:
                    echo '<font color="red">已取消</font>';
                    break;
                default:
                    echo '<font color="grey">处理中</font>';
                    break;
            } ?>
			</td>
            <td class="order_view"><a target="_blank" href="<?php echo base_url('home/order/orderinfo/oid/'.$vo['oid']);?>">查看</a></td>
		</tr>
		<?php endforeach;?>
        </tbody>
       </table>
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>
</div>
<?php $this->load->view('home/common/footer');?>
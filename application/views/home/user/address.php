<?php $this->load->view('home/common/header');?>
<link type="text/css" rel="stylesheet" href="<?php echo base_url('static/css/base.css') ?>" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url('static/css/member.css') ?>" />
</head>
<body>
    <?php $this->load->view('home/common/menu');?>
<!--address_start-->
<div id="bg"></div>
<?php $this->load->view('home/common/public_address');?>
<!--address_end-->
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
	<script type="text/javascript">
		function dosave(obj)
		{
			obj.disabled =true;
			var _tel = $('#tel').val();
			var _address = $('#address').val();
			var _add_uname = $('#add_uname').val();
			var _uid = $('#uid').val();
			var _address_id = $('#address_id').val();
			if(isNaN(_tel)){
				alert('电话只能是数字');
				obj.disabled =false;
				return;
			}
			$.post(baseurl+'home/user/address',{address_id:_address_id,tel:_tel,address:_address,add_uname:_add_uname},function(data)
			{
				var json = eval(data);
				var uadd_uname = json.data.ajax_add_uname;
				var utel = json.data.ajax_tel;
				var uloc = json.data.ajax_address;
				if(json.status != 1)
				{
					obj.disabled =false;
					$('#add_name').val('');
					$('#tel').val('');
					$('#address').val('');
					$("#show_msg").html("<font color='red'>数据保存失败！</font>");
				}else{
					obj.disabled =false;
					$('#add_name').val(uadd_uname);
					$('#tel').val(utel);
					$('#address').val(uloc);
					$("#show_msg").html("<font color='green'>数据保存成功！</font>");
				}
			},'json')
		}
	</script>
	<div class="member_right r">
	<h3 class="memberR_title">配送信息</h3>
	<div class="memberR_cnt">
		<div class="mem_info_btm">
			<table class="mem_order_lists" cellpadding="0" border="0" cellspacing="0">
				<thead>
				 <tr>
				  <th width="5%">#</th>
				  <th width="10%">昵称</th>
				  <th width="15%">电话</th>
				  <th width="30%">地址</th>
				  <th width="10%">默认</th>
				  <th width="20%" align="center">操作</th>
				 </tr>
				</thead>
				<tbody>
				<?php foreach($address_arr as $ko=>$vo):?>
				<tr>
					<input type="hidden" value="<?php echo $vo['id'];?>"/>
					<td><?php echo $ko;?></td>
					<td><?php echo $vo['add_uname'];?></td>
					<td><?php echo $vo['tel'];?></td>
					<td><?php echo $vo['address'];?></td>
					<td><?php echo strval($vo['is_default'])=="1"?'<font color="green">默认</font>':'';?></td>
					<td>
						<span onclick="addr_update(<?php echo $vo['id'];?>,'<?php echo $vo['add_uname'];?>','<?php echo $vo['tel'];?>','<?php echo $vo['address'];?>')">修改</span>
						<span onclick="addr_remove(<?php echo $vo['id'];?>)">删除</span>
						<span onclick="addr_set_default(<?php echo $vo['id'];?>)">设为默认</span>
					</td>
				</tr>
				<?php endforeach;?>
				</tbody>
		    </table>
		</div>
		<div class="r"><div id='add_new_id'>添加新地址</div></div>
	</div>
	</div>
   </div>
  </div>
 </div>
</div>
<script>
</script>
<?php $this->load->view('home/common/footer');?>
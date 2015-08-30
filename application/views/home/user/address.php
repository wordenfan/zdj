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
	<script type="text/javascript">
		function dosave(obj)
		{
			obj.disabled =true;
			var _tel = $('#tel').val();
			var _location = $('#location').val();
			var _uid = $('#uid').val();
			if(isNaN(_tel)){
				alert('电话只能是数字');
				obj.disabled =false;
				return;
			}
			$.post(baseurl+'/home/User/address',{uid_js:_uid,tel_js:_tel,location_js:_location},function(data)
			{
				var json = eval(data);
				var uname = json.ajax_uname;
				var utel = json.ajax_tel;
				var uloc = json.ajax_location;
				var uid = json.ajax_uid;
				if(uid == -1)
				{
					obj.disabled =false;
					$('#tel').val('');
					$('#location').val('');
					$("#show_msg").html("<font color='red'>数据保存失败！</font>");
				}else{
					obj.disabled =false;
					$('#tel').val(utel);
					$('#location').val(uloc);
					$('#uid').val(uid);
					$("#show_msg").html("<font color='green'>数据保存成功！</font>");
				}
			},'json')
		}
	</script>
	<div class="member_right r">
	<h3 class="memberR_title">配送信息</h3>
	<div class="memberR_cnt">
		<div class="mem_info_btm">
			<div class="mem_info_item" style="margin-bottom:0px;margin-top:-8px;">
				<span class="account_name l" id="show_msg" style="width:153px"></span>
			</div>
			<form action="" method="post" onsubmit="return false;">
				<div class="mem_info_item">
					<span class="send_name l">手机号码：</span>
					<div class="sendInfo_input l">
						<input type="text" value="<?php echo $tel;?>" id="tel" name="tel" />
					</div>
				</div>
				<div class="mem_info_item">
					<span class="send_name l">配送地址：</span>
					<div class="sendPlace_input l">
						<input type="text" value="<?php echo $address;?>" id="location" name="location" />
					</div>
				</div>
				<input type="hidden" value="<?php echo $uid;?>" id="uid" name="uid" />
				<div class="mem_info_item">
					<span class="send_name l">&nbsp;&nbsp;</span>
					<div class="sendInfo_input l">
					<button class="member_btn" onclick="dosave(this);">保存</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	</div>
   </div>
  </div>
 </div>
</div>
<?php $this->load->view('home/common/footer');?>
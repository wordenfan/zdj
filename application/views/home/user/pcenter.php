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
			var js_sex = $('input[name="sex"]:checked').val();
			var js_age = $('#age').val();
			var js_uid = $('#uid').val();
			$.post(baseurl+'home/user/pcenter',{usex:js_sex,uage:js_age,uid:js_uid},function(data)
			{
				obj.disabled =false;
				var json = eval(data);
				var uage = json.data.ajax_age;
				var usex = json.data.ajax_sex;
				if(json.status != 1)
				{
					$("input[name='sex'][value=1]").attr("checked",true);
					$('#age').val();
					$("#show_msg").html("<font color='red'>"+uname+"</font>");
				}else{
					$("input[name='sex'][value="+usex+"]").attr("checked",true);
					$("#age").val(uage);
					$("#show_msg").html("<font color='green'>数据保存成功！</font>");
				}
			},'json')
		}
	</script>
    <div class="member_right r">
	<h3 class="memberR_title">账户信息</h3>
	<div class="memberR_cnt">
	<div class="mem_info_btm">
		<div class="mem_info_item" style="margin-bottom:0px;margin-top:-8px;">
			<span class="account_name l" id="show_msg" style="width:153px"></span>
		</div>
		<form action="" method="post" onsubmit="return false;">
			<div class="mem_info_item">
				<span class="account_name l">昵称：</span>
				<div class="account_input l">
					<input type="text" disabled value="<?php echo $uname;?>" id="nname" name="name" />
				</div>
			</div>
			<div class="mem_info_item">
				<span class="account_name l">性别：</span>
				<div class="send_sex">
						<input type="radio" value="1" <?php echo ($sex==1?'checked=checked':'1=1');?> name="sex" />先生
						<input type="radio" value="2" <?php echo ($sex==2?'checked=checked':'1=1');?> name="sex"/>女士
				</div>
			</div>
			<div class="mem_info_item">
				<span class="account_name l">年龄：</span>
				<div class="account_input l">
						<input type="text" value="<?php echo $age;?>" id="age" name="age" />
				</div>
			</div>
			<input type="hidden" value="<?php echo $uid;?>" id="uid" name="uid" />
			<div class="mem_info_item">
				<span class="account_name l">&nbsp;&nbsp;</span>
				<div class="account_input l">
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
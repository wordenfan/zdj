<?php $this->load->view('home/common/header');?>
<link type="text/css" rel="stylesheet" href="<?php echo base_url('static/css/reg_login.css') ?>" />
</head>
<body>
    <?php $this->load->view('home/common/menu');?>
<!--以上为动态载入区-->
<div class="content">
	<div class="w_cnt">
	<div class="member_cnt w980">
	<h2 class="member_title">注册</h2>
	<div class="reg_btm">
		<div class="reg_shuoming">
			<p>1. 耽误您<span>几秒钟</span>完成用户注册流程</p>
			<p>2. 宅当家配送范围限<span>配送区域</span>所示范围，其他区域订单将被取消。</p>
		</div>
		<form id="myform" name="myform" method="post" action="" onsubmit="return false;">
		<div class="reg_cnt">
			<div class="reg_item" id="user_prompt">&nbsp;&nbsp;</div>
			<div class="reg_item" id="nichName">
				<span class="reg_name l">手机号：</span>
				<div class="reg_input l">
					<input type="text" name="reg_tel" id="reg_tel" maxlength="16" placeholder="输入手机号" />
				</div>
			</div>
			<div class="reg_item" id="set_password">
				<span class="reg_name l">密&nbsp;&nbsp;&nbsp;&nbsp;码：</span>
				<div class="reg_input l">
					<input type="password" name="password" id="pwd_id" autocomplete="off" maxlength="16" placeholder="设置密码" />
				</div>
			</div>
			<div class="reg_item" id="reset_password">
				<span class="reg_name l">确认密码：</span>
				<div class="reg_input l">
					<input type="password" name="repassword" id="repwd_id" autocomplete="off" maxlength="16" placeholder="确认密码" />
				</div>
			</div>
			<div class="reg_item" id="yanzhCode">
				<span class="reg_name l">手机验证码：</span>
				<div class="indenty_code l">
					<input type="text" name="tel_code" id="tel_code_id" autocomplete="off" maxlength="4" placeholder="输入手机验证码" />
				</div>
				<button id="mgs_btn" class="verify_code l">获取手机验证码</button>
				<div class="reg_tips l"><p id="checkcode_prompt"><span></span></p></div>
			</div>
			<div class="reg_item">
				<span class="reg_name l">&nbsp;&nbsp;</span>
				<div class="reg_input l">
					<button  type="submit" id="login_submit">同意以下协议并注册</button>
				</div>
			</div>
			<div class="reg_item">
				<span class="reg_name l">&nbsp;&nbsp;</span>
				<div class="reg_input l">
					<a class="reg_xieyi" href="#">宅当家服务协议</a>
				</div>
			</div>
		</div>
		</form>
	</div>
	</div>
	</div>
</div>
<script>
$(function() {
	//初始化
	var app_url='/home/user'; 
	//发送手机验证码
	$('.verify_code').click(function()
	{
		$tel = $('#reg_tel').val();
		if(isNaN($tel)){
			alert('手机号只能为数字');
			return;
		}
		if($tel.length!=11){
			alert('手机号必须为11位');
			return;
		}
		var code_btn = document.getElementById("mgs_btn");
		test.init(code_btn);
		return;
		$.post('/common/sms/send_reg_code',{reg_tel:$tel},function(data){
			if(data.status == 1){
				alert(data.msg);
			}else{
				alert(data.msg);
			}
		},'json');
	})
	//ajax表单提交注册
	$('#login_submit').click(function()
	{
		//初步判断
		var _tel = $('#reg_tel').val();
		var _pwd = $('#pwd_id').val();
		var _rpwd = $('#repwd_id').val();
		var _code = $('#tel_code_id').val();
		
		if(_pwd.length<6)
		{
			$("#user_prompt").html("<font color='red'>密码长度错误</font>");
			return;
		}
		//====确认密码====
		else if(_pwd != _rpwd)
		{
			$("#user_prompt").html("<font color='red'>两次密码输入不一致</font>");
			return;
		}
		//后台验证
		else{
			$(this).css("disabled","disabled");//防止重复提交
			$.post(app_url+'/register',{reg_tel:_tel,password:_pwd,tel_code:_code},function(data)
			{
				var json = eval(data);
				if(json.status == 1)
				{
					$("#user_prompt").html("<font color='green'>"+json.msg+"</font>");
					location.href = json.data;
				}else{
					$("#user_prompt").html("<font color='red'>"+json.msg+"</font>");
				}
			},'json')
		}
	})
	//发送验证码
	var test = {
		node:null,
		count:60,
		start:function(){
			//console.log(this.count);
			if(this.count > 0){
				this.node.innerHTML = '重新发送(' + this.count-- +')';
				var _this = this;
				setTimeout(function(){
					_this.start();
				},1000);
			}else{
				this.node.removeAttribute("disabled");
				this.node.innerHTML = "再次发送";
				this.count = 60;
			}
		},
		//初始化
		init:function(node){
			this.node = node;
			this.node.setAttribute("disabled",true);
			this.start();
		}
    };
});
</script>
<?php $this->load->view('home/common/footer');?>
<?php $this->load->view('home/common/header');?>
<link type="text/css" rel="stylesheet" href="<?php echo base_url('static/css/reg_login.css') ?>" />
<script type="text/javascript" src="<?php echo base_url('static/js/validate_form_object.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('static/js/register.js') ?>"></script>
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
			<div class="reg_item" id="nichName">
				<span class="reg_name l">昵&nbsp;&nbsp;&nbsp;&nbsp;称：</span>
				<div class="reg_input l">
					<input type="text" name="uname" id="username" autocomplete="off" maxlength="16" placeholder="填写昵称" />
				</div>
				<div class="reg_tips l"><p id="user_prompt"><span></span></p></div>
			</div>
			<div class="reg_item" id="set_password">
				<span class="reg_name l">密&nbsp;&nbsp;&nbsp;&nbsp;码：</span>
				<div class="reg_input l">
					<input type="password" name="pwd" id="password1" autocomplete="off" maxlength="16" placeholder="设置密码" />
				</div>
				<div class="reg_tips l"><p id="pwd1_prompt"><span></span></p></div>
			</div>
			<div class="reg_item" id="reset_password">
				<span class="reg_name l">确认密码：</span>
				<div class="reg_input l">
					<input type="password" name="pwd2" id="password2" autocomplete="off" maxlength="16" placeholder="确认密码" />
				</div>
				<div class="reg_tips l"><p id="pwd2_prompt"><span></span></p></div>
			</div>
			<div class="reg_item" id="yanzhCode">
				<span class="reg_name l">验证码：</span>
				<div class="indenty_code l">
					<input type="text" name="verify" id="checkcode" autocomplete="off" maxlength="4" placeholder="输入验证码" />
				</div>
				<div class="verify_code l"><img style='cursor:pointer' alt="点击切换" title='刷新验证码' src="<?php echo base_url('captcha_code');?>" id='verifyImg' onclick="this.src=this.src+'?r='+Math.random();" /></div>
				<div class="reg_tips l"><p id="checkcode_prompt"><span></span></p></div>
			</div>
			<div class="reg_item">
				<span class="reg_name l">&nbsp;&nbsp;</span>
				<div class="reg_input l">
					<button  type="submit" onclick="finalCheck()">同意以下协议并注册</button>
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
<?php $this->load->view('home/common/footer');?>
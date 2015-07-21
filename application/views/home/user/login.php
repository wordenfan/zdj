<?php $this->load->view('home/common/header');?>
<link type="text/css" rel="stylesheet" href="<?php echo base_url('static/css/base.css') ?>" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url('static/css/reg_login.css') ?>" />
</head>
<body>
    <?php $this->load->view('home/common/menu');?>
<!--以上为动态载入区-->
<div class="content">
	<div class="w_cnt">
	<div class="member_cnt w980">
	<h2 class="member_title">登录</h2>
	<div class="reg_btm">
		<div class="reg_shuoming">
			<p>1. 宅当家只<span>限配送范围</span>为：<?php echo $send_area;?></p>
			<p>2. 为了方便您的下次点餐，建议您在<span>个人中心</span>完善配送信息，避免每次填写的麻烦。</p>
		</div>
		<form id="myform" name="myform" method="post" action="">
		<div class="reg_cnt">
			<div class="reg_item" id="nichName">
				<span class="reg_name l">昵&nbsp;&nbsp;&nbsp;&nbsp;称：</span>
				<div class="reg_input l">
					<input type="text" name="uname" id="username" maxlength="16" placeholder="填写昵称" />
				</div>
				<div class="reg_tips l"><p id="user_prompt"><span></span></p></div>
			</div>
			<div class="reg_item" id="set_password" style = "margin-bottom:35px;">
				<span class="reg_name l">密&nbsp;&nbsp;&nbsp;&nbsp;码：</span>
				<div class="reg_input l">
					<input type="password" name="pwd" id="password1" autocomplete="off" maxlength="16" placeholder="设置密码" />
				</div>
				<div class="reg_tips l"><p id="pwd1_prompt"><span></span></p></div>
			</div>
			<div class="reg_item">
				<span class="reg_name l">&nbsp;&nbsp;</span>
				<div class="reg_input l">
					<button type="submit">登 录</button>
				</div>
			</div>
			<div class="reg_item">
				<span class="reg_name l">&nbsp;&nbsp;</span>
				<div class="reg_input l">
					尚未注册？<a style="text-decoration:underline" href="<?php echo base_url('home/User/register')?>">点击注册</a>
				</div>
			</div>
		</div>
		</form>
	</div>
	</div>
	</div>
</div>
<?php $this->load->view('home/common/footer');?>
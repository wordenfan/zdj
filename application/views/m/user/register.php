<!doctype html>
<html class="no-js">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>宅当家-Beta3.0</title>
	<meta name="description" content="宅当家是青岛开发区(黄岛)一家专业的外卖网站,集合了开发区本地众多知名的餐厅,覆盖青岛开发区内包括长江中路、香江路等主要服务区，让用户足不出户享受外卖美食。">
	<meta name="keywords" content="宅当家,青岛开发区外卖,黄岛外卖,黄岛订餐">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="renderer" content="webkit">
	<meta http-equiv="Cache-Control" content="no-siteapp" />
	<link rel="stylesheet" href="<?php echo base_url('static/mobile_assets/css/amazeui.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('static/mobile_assets/css/mobile.css');?>">
	<script src="<?php echo base_url('static/mobile_assets/js/zepto.min.js?ver=1.1.3');?>"></script>
	<script src="<?php echo base_url('static/mobile_assets/js/amazeui.js');?>"></script>
	<script src="<?php echo base_url('static/mobile_assets/js/handlebars.min.js');?>"></script>
	<script src="<?php echo base_url('static/mobile_assets/js/amazeui.widgets.helper.js');?>"></script>
	<script src="<?php echo base_url('static/js/validate_form_object.js');?>"></script>
</head>

<body style="background:#f4f4f4">
<script type="text/x-handlebars-template" id="amz-tpl">
	{{>header header}}
</script>

<div class="detail_wrap">
	<div class="login_tab">
		<p id="user_prompt">注册信息:</p>
		<p><input type="text" id="reg_tel" name="uname" placeholder="输入手机号"/></p>
		<p><input type="password" id="pwd_id" name="pwd" placeholder="输入密码"/></p>
		<p><input type="password" id="repwd_id" name="pwd2" placeholder="确认密码"/></p>
		<p>
			<div class="am-g">
				<div class="col-sm-7 mreg1">
					<input type="text" id="tel_code_id" name="verify" placeholder="手机验证码"/>
				</div>
				<div class="col-sm-4 mreg3">
					<span><a>获取手机验证码</a></span>
				</div>
			</div>
		</p>
		<p><input type="button" id="login_submit" value="注册"/></p>
		<p><a href="login" >已有账号？点击登录</a></p>
	</div>
</div>
<script>
	$(function() {
		//初始化
		var app_url='/user'; 
		var screen_height = $(window).height();
		$('.detail_wrap').css('height',screen_height-30);
		var validate = new validate_form(); 
		//amaze
		var $tpl = $('#amz-tpl'),
		source = $tpl.text(),
		template = Handlebars.compile(source),
		data = {
			header: {
				"theme": "",
				"content": {
					"left": [{
						"link": "http://m.26632.com",         // url : http://xxx.xxx.xxx
						"title": "",        // 链接标题
						"icon": "chevron-left",         // 字体图标名称: 使用 Amaze UI 字体图标 http://www.amazeui.org/css/icon
						"customIcon": ""    // 自定义图标 URL，设置此项后当前链接不再显示 icon
					}],
					"title": "宅当家-注册"
				}
			}
		},
		html = template(data);
		$tpl.before(html);
		//发送手机验证码
		$('.mreg3').click(function()
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
			/*
			var url = '';
			var arr = String(location.host).split('.');
			if(arr[0] == 'm'){
				arr[0] = 'www';
			}
			url = 'http://'+arr.join('.');
			*/
			$.post('/sms/send_reg_code',{reg_tel:$tel},function(data){
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
	});
</script>
</body>
</html>
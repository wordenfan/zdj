<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>实惠  |  办公平台 OA </title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/css/ad_base.css');?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/css/bootstrap.min.css');?>" />
	
    <script Language="JavaScript" src="<?php echo base_url('static/js/jquery-1.11.0.min.js');?>"></script>
</head>
<style type="text/css">
body{font-family: "微软雅黑", "Microsoft YaHei", "Helvetica", "Arial";background: #fff url("<?php echo base_url('static/images/admin/bg.png');?>") 0 0 repeat;overflow: hidden;}
header {
    display: block;
    width: 100%;
    height: 80px;
}
header .logo {
    display: inline-block;
    margin-left: 30px;
    font-size: 24px;
}
header .vertical-line {
    position: relative;
    font-size: 24px;
    margin: 0 10px;
    top: 17px;
}
header .title {
    position: relative;
    top: 18px;
}
.gray {
    color: #969696;
}
.lightgray {
    color: #e1e1e1;
}
input {
    border: 1px solid #cccccc;
    border-radius: 5px;
    margin: 8px 0;
    padding-left: 10px;
    -webkit-box-shadow: none;
    box-shadow: none;
    -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
}
input:focus {
    border: 1px solid #f73c3c;
    outline: 0;
    -webkit-box-shadow: inset 0 1px 1px rgba(247, 60, 60, .6);
    box-shadow: inset 0 1px 1px rgba(247, 60, 60, .6);
}
</style>
<body>
    <header>
        <div class="logo">
			<img class="logo-img" src="<?php echo base_url('static/images/admin/shlogo.gif');?>" />
            <span class="vertical-line lightgray"> | </span>
            <span class="title gray">宅当家管理系统</span>
        </div>
    </header>
    <div class="login-control bg-darkgray">
        <div class="login">
            <div class="login-title">
                <span class="login-title-main gray">登录</span>
                <span class="login-title-tips middlered"></span>
            </div>
            <div class="login-form">
				<input type="text" class="login-input" id="username" maxlength="30" placeholder="请输入账号" />
				<br/>
				<input type="password" class="login-input" id="password" maxlength="30" placeholder="请输入密码" />
				<br/>
				<input type="text" class="login-input login-google" maxlength="4" id="validcode" placeholder="验证码" />
				<span class="login-google-tips"><img src='<?php echo base_url('captcha_code');?>' id='verifyImg' onclick="this.src='<?php echo base_url('captcha_code');?>?'+Math.random();" style="cursor:pointer;margin-top:-2px"></span>
				<br/>
				<input type="button" id="login_submit" onclick="goServer(this)" class="btn btn-danger login-btn" value="登录" />
            </div>
        </div>
    </div>
    <footer>
		<center>
		<br>
        <div class="copyright gray">青岛风河网络传媒有限公司<br>
          咨询电话：0532-86941514<br>
        </div>
		</center>
    </footer>
<script>
//ajax表单提交注册
$('#login_submit').click(function()
{
	//初步判断
	var uname = $('#username').val();
	var pwd   = $('#password').val();
	var code  = $('#validcode').val();
	
	$(this).css("disabled","disabled");//防止重复提交
	$.post('/admin/login/do_login',{uname:uname,pwd:pwd,code:code},function(data)
	{
		var json = eval(data);
		if(json.status == 1)
		{
			location.href = json.data;
		}else{
			alert(json.msg);
		}
	},'json')
})
</script>
</body>
</html>
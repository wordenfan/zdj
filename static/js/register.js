//================================验证================================================
var validate;
var user_flag = 0;
var pwd_flag = 0;
var pwd2_flag = 0;
var ckcode_flag = 0;
var click_flag='';

$(document).ready(function(){
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
})
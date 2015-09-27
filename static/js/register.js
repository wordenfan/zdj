//================================验证================================================
var validate;
var user_flag = 0;
var pwd_flag = 0;
var pwd2_flag = 0;
var ckcode_flag = 0;
var click_flag='';

$(document).ready(function(){
	validate = new validate_form(); 
	addEvent();
})
function addEvent()
{
	//昵称
	$('#username').focus(function()
	{
		click_flag == '';
		user_flag = 0;//未判断
		$('#user_prompt').removeClass();
		$('#user_prompt').addClass('suggest');
		$('#user_prompt').html('<span></span> 中英文均可，4-16个字符');
	})
	$('#username').blur(function()
	{
		user_flag = 2;//错误
		var ud = $('#username').val();
		if(ud.length<4||ud.length>16)
		{
			$('#user_prompt').removeClass();
			$('#user_prompt').addClass('error');
			$('#user_prompt').html('<span></span> 昵称长度错误');
		}
		else if(!validate.username(ud))
		{
			$('#user_prompt').removeClass();
			$('#user_prompt').addClass('error');
			$('#user_prompt').html('<span></span> 昵称不合规范');
		}else
		{
			$.post(baseurl+'home/user/check_uname',{uname:ud},function(data)
			{
				if(data=='false')
				{
					user_flag = 1;//正确
					$('#user_prompt').removeClass();
					$('#user_prompt').addClass('success');
					$('#user_prompt').html('<span></span> 恭喜您，可以注册');
				}else{
					$('#user_prompt').removeClass();
					$('#user_prompt').addClass('error');
					$('#user_prompt').html('<span></span> 抱歉，该账号已被注册');
				}
			})
		}
	})
	//密码
	$('#password1').focus(function()
	{
		click_flag == '';
		pwd_flag = 0;
		$('#pwd1_prompt').removeClass();
		$('#pwd1_prompt').addClass('suggest');
		$('#pwd1_prompt').html('<span></span> 6-16个字符，字母、数字或符号均可，字母区分大小写');
	})
	$('#password1').blur(function()
	{
		pwd_flag = 2;
		if($('#password1').val().length<6)
		{
			$('#pwd1_prompt').removeClass();
			$('#pwd1_prompt').addClass('error');
			$('#pwd1_prompt').html('<span></span> 密码长度错误');
		}else
		{
			pwd_flag = 1;
			$('#pwd1_prompt').removeClass();
			$('#pwd1_prompt').addClass('success');
			$('#pwd1_prompt').html('<span></span> 正确');
			finishFun();
		}
	})
	//确认密码
	$('#password2').focus(function()
	{
		click_flag == '';
		pwd2_flag = 0;
		$('#pwd2_prompt').removeClass();
		$('#pwd2_prompt').addClass('suggest');
		$('#pwd2_prompt').html('<span></span> 请再次输入密码');
	})
	$('#password2').blur(function()
	{
		pwd2_flag = 2;
		if($('#password2').val()!=$('#password1').val())
		{
			$('#pwd2_prompt').removeClass();
			$('#pwd2_prompt').addClass('error');
			$('#pwd2_prompt').html('<span></span> 两次密码输入不一致');
		}else
		{
			pwd2_flag = 1;
			$('#pwd2_prompt').removeClass();
			$('#pwd2_prompt').addClass('success');
			$('#pwd2_prompt').html('<span></span> 正确');
			finishFun();
		}
	})
	//验证码
	$('#checkcode').focus(function()
	{
		click_flag == '';
		ckcode_flag = 0;
		$('#checkcode_prompt').removeClass();
		$('#checkcode_prompt').addClass('suggest');
		$('#checkcode_prompt').html('<span></span> 请输入验证码');
	})
	$('#checkcode').blur(function()
	{
		ckcode_flag = 2;
		if($('#checkcode').val().length!=4)
		{
			$('#checkcode_prompt').removeClass();
			$('#checkcode_prompt').addClass('error');
			$('#checkcode_prompt').html('<span></span> 验证码填写错误');
			$('#verifyImg').attr("src",$('#verifyImg').attr("src")+'?r='+Math.random());
		}else
		{
			$.post(baseurl+'home/user/check_captcha',{ucode:$('#checkcode').val()},function(data)
			{
			    if(data=='true')
			    {
			    	ckcode_flag = 1;
			    	$('#checkcode_prompt').removeClass();
					$('#checkcode_prompt').addClass('success');
					$('#checkcode_prompt').html('<span></span> 恭喜您，可以注册');
					finishFun();
			    }else{
			    	$('#checkcode_prompt').removeClass();
					$('#checkcode_prompt').addClass('error');
					$('#checkcode_prompt').html('<span></span> 验证码填写错误');
					$('#verifyImg').attr("src",$('#verifyImg').attr("src")+'?r='+Math.random());
			    }
			})
		}
	})
}
function finishFun()
{
	if(click_flag == 'ck')
	{
		if(user_flag==1&&pwd_flag==1&&pwd2_flag==1&&ckcode_flag==1)
		{
			document.getElementById('myform').submit();
		}
	}
}
//最后检查
function finalCheck()
{
	click_flag = 'ck';
		
	if(user_flag==0){$('#username').blur();}
	else if(pwd_flag==0){$('#pwd1_prompt').blur();}
	else if(pwd2_flag==0){$('#pwd2_prompt').blur();}
	else if(ckcode_flag==0){$('#checkcode').blur();}
	else{
		finishFun();
	}
	
	return false;	
}
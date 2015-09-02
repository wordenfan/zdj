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
</head>




<body style="background:#f4f4f4">
<script type="text/x-handlebars-template" id="amz-tpl">
	{{>header header}}
</script>

<div class="detail_wrap">
	<div class="login_tab">
        <form class="am-form">
            <p><input type="text" id="rname_id" name="uname" placeholder="您的称谓"/></p>
            <p><input type="password" id="rpwd_id" name="pwd" placeholder="联系电话"/></p>
            <p><input type="password" id="rrpwd_id" name="pwd2" placeholder="详细送餐地址"/></p>
            <p><input type="button" id="login_submit" value="保存地址"/></p>
        </form>
	</div>
</div>
<script>
	$(function() {
		//初始化
		var app_url='__CONTROLLER__'; 
		var screen_height = $(window).height();
		$('.detail_wrap').css('height',screen_height-30);
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
					"title": "新增地址"
				}
			}
		},
		html = template(data);
		$tpl.before(html);
		//验证码刷新
		$('.mreg3>span').click(function()
		{
			$('.mreg2>img').attr('src',"__URL__/verify?"+Math.random());
		})
		//ajax表单提交注册
		$('#login_submit').click(function()
		{
            $(this).css("disabled","disabled");//防止重复提交
            $.post(app_url+'/reg_check',{rname:_name,rpwd:_pwd,rrpwd:_rpwd,rcode:_code},function(data)
            {
                
            },'json')
		})
	});
</script>
</body>
</html>
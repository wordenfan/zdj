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
		<?php foreach($address_array as $k=>$v):?>
			<div <?php if($v['is_default'] != 1) echo 'onclick="set_default_address('.$v['id'].')"';?> >
			<table class="am-table am-table-centered" style="margin:25px 0px 0px 0px;border:1px solid #aaa;border-left:0px;">
				<tr class="<?php if($v['is_default'] == 1) echo 'm_default_address';?>">
					<td rowspan="2" width="15%" class="am-text-middle m_set_default"><?php if($v['is_default'] != 1) echo '设为默认';?></td>
					<td rowspan="2" width="30%" class="am-text-middle"><?php echo isset($v)?$v['add_uname']:'';?></td>
					<td><?php echo isset($v)?$v['tel']:''?></td>
				</tr>
				<tr class="<?php if($v['is_default'] == 1) echo 'm_default_address';?>">
					<td><?php echo isset($v)?$v['address']:''?></td>
				</tr>
			</table>
			</div>
		<?php endforeach;?>
		<?php if(count($address_array)<2):?>
			<div id="add_address">+新增地址</div>
		<?php endif;?>
	</div>
</div>
<script>
	$(function() {
		//初始化
		var app_url='/user';  
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
					"title": "管理地址"
				}
			}
		},
		html = template(data);
		$tpl.before(html);
		//添加地址
		$('#add_address').click(function()
		{
			window.location.href=app_url+'/add_address';
		})
	});
</script>
</body>
</html>
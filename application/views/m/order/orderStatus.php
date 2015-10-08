<!doctype html>
<html class="no-js">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>订单状态</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="renderer" content="webkit">
	<meta http-equiv="Cache-Control" content="no-siteapp" />
	<link rel="stylesheet" href="<?php echo base_url('static/mobile_assets/css/amazeui.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('static/mobile_assets/css/app.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('static/mobile_assets/css/mobile.css');?>">
    <script src="<?php echo base_url('static/mobile_assets/js/zepto.min.js?ver=1.1.3');?>"></script>
	<script src="<?php echo base_url('static/mobile_assets/js/amazeui.js');?>"></script>
	<script src="<?php echo base_url('static/mobile_assets/js/handlebars.min.js');?>"></script>
	<script src="<?php echo base_url('static/mobile_assets/js/amazeui.widgets.helper.js');?>"></script>
</head>
<body>
<script type="text/x-handlebars-template" id="amz-tpl">
	{{>header header}}
</script>

<section class="menu_shop">
  <div class="am-g">
    <div class="col-sm-12">首次下单用户，客服将与您电话确认配送地址等信息</div>
  </div>
</section>
<div class="detail_wrap">
	<div class="success_a">
		<?php if($status == 1):?>
			<img width="80" height="80" src="<?php echo base_url('static/mobile_assets/images/success.png');?>">
			<p>下单成功</p>
			<p class="success_tips">请保持电话畅通，配送员即刻为您配送</p>
		<?php elseif($status == 0):?>
			<img width="80" height="80" src="<?php echo base_url('static/mobile_assets/images/fail.png');?>">
			<p>下单失败</p>
			<p class="success_tips"><?php echo $msg;?></p>
		<?php endif;?>
	</div>
	<button class="success_b" >返回首页</button>
</div>
<script>
	var screen_height = $(window).height();
	//alert(screen_height);
	$('.detail_wrap').css('height',screen_height-30);
	$(function() {
		var $tpl = $('#amz-tpl'),
		source = $tpl.text(),
		template = Handlebars.compile(source),
		data = {
			header: {
				"theme": "",
				"content": {
					"left": [{
						"link": "",         // url : http://xxx.xxx.xxx
						"title": "",        // 链接标题
						"icon": "chevron-left",         // 字体图标名称: 使用 Amaze UI 字体图标 http://www.amazeui.org/css/icon
						"customIcon": ""    // 自定义图标 URL，设置此项后当前链接不再显示 icon
					}],
					"title": "订单状态",
				}
			}
		},
		html = template(data);
		$tpl.before(html);
	});
	//返回首页
	$(".success_b").click(function() 
	{
		window.location.href='http://m.26632.com';
	})
</script>
</body>
</html>
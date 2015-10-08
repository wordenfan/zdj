<!doctype html>
<html class="no-js">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>订单信息</title>
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
<div class="detail_wrap">
		<ul>
			<li>				
				<div class="am-g detail_til">
					<div class="col-sm-3">时间</div>
					<div class="col-sm-4">商家</div>
					<div class="col-sm-2">总计</div>
					<div class="col-sm-3">状态</div>
				</div>
			</li>			
			<?php foreach($data as $k=>$mo):?>
				<li>				
					<div class="am-g detail_a">
						<div class="col-sm-3"><?php echo date('y-m-d H:i',$mo['opublish']);?></div>
						<div class="col-sm-4"><?php echo $mo['oshop_name'];?></div>
						<div class="col-sm-2"><?php echo $mo['osum'];?></div>
						<div class="col-sm-3">
							<?php if($mo['order_status'] == 1):?>
								<font color="green">已接单</font>
							<?php elseif($mo['order_status'] == 2):?>
								<font color="red">已取消</font>
							<?php else:?>
								处理中
							<?php endif;?>
						</div>
					</div>
				</li>
			<?php endforeach;?>
		</ul>
</div>
<footer class="footer">
</footer>
<script>
	var screen_height = $(window).height();
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
						"link": "http://m.26632.com",         // url : http://xxx.xxx.xxx
						"title": "首页",        // 链接标题
						"icon": "chevron-left",         // 字体图标名称: 使用 Amaze UI 字体图标 http://www.amazeui.org/css/icon
						"customIcon": ""    // 自定义图标 URL，设置此项后当前链接不再显示 icon
					}],
					"title": "我的订单",
				}
			}
		},
		html = template(data);
		$tpl.before(html);
	});
</script>
</body>
</html>
<!doctype html>
<html class="no-js">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>订单列表</title>
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
	{{>navbar navbar}}
</script>
<section class="menu_shop">
  <div class="am-g">
    <div class="col-sm-12">现在时间：<?php echo $shijian?></div>
  </div>
</section>
<div class="detail_wrap">
	<section data-am-widget="accordion" class="am-accordion am-accordion-default" data-am-accordion='{ "multiple": true }'>
		<?php foreach($list['data'] as $k=>$mo):?>
			<dl class="am-accordion-item">
				<dt class="am-accordion-title">
					<?php echo date('H:i',$mo['opublish']);?>_<?php echo $mo['oshop_name']?>
					<span style="float:right;color:#ff0000;"><?php echo $mo['oname']?></span>
				</dt>
				<dd class="am-accordion-content am-collapse ">
					订单状态：
					<?php if($mo['order_status'] == 1):?>
						<font color="green">成功</font>
					<?php elseif($mo['order_status'] == 2):?>
						<font color="red">取消</font>
					<?php else:?>
						<font color="gray">未受理</font>
					<?php endif;?>
					&nbsp&nbsp&nbsp&nbsp				
					用户状态：
					<?php if($mo['user_status'] == 1):?>
						<font color="red">新用户</font>
					<?php else:?>
						<font color="green">老用户</font>
					<?php endif;?><br>
					用户电话：<font color="red"><a href="tel:<?php echo $mo['otel'];?>"><?php echo $mo['otel'];?></a></font>&nbsp&nbsp&nbsp&nbsp收取：<font color="green"><?php echo $mo['osum'];?></font><br>
					用户地址：<font color="red"><?php echo $mo['oaddress'];?></font><br>
					商家电话：<font color="gray">
					<?php foreach($mo['oshop_tel'] as $k=>$to):?>
						<a href="tel:<?php echo $to;?>"><?php echo $to;?></a>&nbsp&nbsp
					<?php endforeach;?>
						</font><br>
					食品清单：<br>
					<?php echo $mo['food_list'];?>
					<font style="color:#ff0000">备注：<?php echo $mo['remark'];?></font>
					
				</dd>
			</dl>
		<?php endforeach;?>
	</section>
</div>
<script>
	var screen_height = $(window).height();
	//alert(screen_height);
	$('.detail_wrap').css('height',screen_height+150);
	$(function() {
		var $tpl = $('#amz-tpl'),
		source = $tpl.text(),
		template = Handlebars.compile(source),
		data = {
			header: {
				"theme": "",
				"content": {
					"title": "<?php echo $riqi?>-订单"
				}
			},
			navbar: {
				"options": {
				  "cols": "2",
				  "iconpos": "top"
				},
				"content": [
				  {
					"title": "呼叫总部",
					"link": "tel:18561527901",
					"icon": "phone",
					"dataApi": ""
				  },
				  {
					"title": "查看后台",
					"link": "http://www.26632.com/zAdmin/",
					"icon": "share-square-o",
					"dataApi": ""
				  }
				]
			  }
			}
		html = template(data);
		$tpl.before(html);
	});
</script>
</body>
</html>
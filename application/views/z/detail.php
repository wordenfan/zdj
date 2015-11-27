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
	<section data-am-widget="accordion" class="am-accordion am-accordion-default">
		
			<dl class="am-accordion-item">
				<dt class="am-accordion-title">
					<?php echo date('H:i',$data[0]['opublish']);?>_<?php echo $data[0]['oshop_name']?>
					<span style="float:right;color:#ff0000;"><?php echo $data[0]['oname']?></span>
				</dt>
				<dd class="am-accordion-content am-collapse ">
					订单状态：
					<?php if($data[0]['order_status'] == 1):?>
						<font color="green">成功</font>
					<?php elseif($data[0]['order_status'] == 2):?>
						<font color="red">取消</font>
					<?php else:?>
						<font color="gray">未受理</font>
					<?php endif;?>
					&nbsp&nbsp&nbsp&nbsp				
					用户状态：
					<?php if($data[0]['user_status'] == 1):?>
						<font color="red">新用户</font>
					<?php else:?>
						<font color="green">老用户</font>
					<?php endif;?><br>
					用户电话：<font color="red"><a href="tel:<?php echo $data[0]['otel'];?>"><?php echo $data[0]['otel'];?></a></font>&nbsp&nbsp&nbsp&nbsp收取：<font color="green"><?php echo $data[0]['osum'];?></font><br>
					用户地址：<font color="red"><?php echo $data[0]['oaddress'];?></font><br>
					商家电话：<font color="gray">
					<?php foreach($data[0]['oshop_tel'] as $k=>$to):?>
						<a href="tel:<?php echo $to;?>"><?php echo $to;?></a>&nbsp&nbsp
					<?php endforeach;?>
						</font><br>
					食品清单：<br>
					<?php echo $data[0]['food_list'];?>
					<font style="color:#ff0000">备注：<?php echo $data[0]['remark'];?></font>
					
				</dd>
			</dl>
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
					"title": "<?php echo $data[0]['oshop_name']; ?>-订单"
				}
			},
			navbar: {
				"options": {
				  "cols": "2",
				  "iconpos": "top"
				},
				"content": [
				  {
					"title": "呼叫用户",
					"link": "tel:<?php echo $data[0]['otel']; ?>",
					"icon": "phone",
					"dataApi": ""
				  },
				  {
					"title": "订单列表",
					"link": "http://z.26632.com/",
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
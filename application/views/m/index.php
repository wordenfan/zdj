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
<body>
<script type="text/x-handlebars-template" id="amz-tpl">
	{{>header header}}
	{{>navbar navbar}}
</script>

<section class="menu">
  <div class="nav_lst" id="nav_lst">
	<span id="0">
		<a><img src="<?php echo base_url('static/mobile_assets/images/1.png');?>" width="40" height="40"><p>全部</p></a>
	</span>
	<?php foreach($type_list as $k=>$li):?>
		<span id="<?php echo $li['id'];?>">
			<a><img src="<?php echo base_url($li['type_icon']);?>" width="40" height="40"><p><?php echo $li['type_name'];?></p></a>
		</span>
	<?php endforeach;?>
  </div>
</section>
<section class="product_wrap">
  <ul id="product_lst">
	<?php foreach($shop_list as $k=>$vo):?>
	<li>
	<a href="<?php echo base_url('/shop/shopinfo/shopid/'.$vo['id']);?>">
		<div class="shop_logo">
			<img width="56" height="56" src="<?php echo base_url($vo['logo']);?>" class="lst_logo">
		</div>
		<div class="home_text">
			<h2><?php echo $vo['name'];?></h2>
			<p>配送费：<?php echo $vo['send_price'];?>元</p>
			<p>
				<{:hook('ShopIcon',array('shopid'=>$vo['id'],'page'=>'mobile_index'))}>
			</p>
		</div>
		<div class="shop_statu">		
			<?php if($vo['open_close'] == 1):?>
				<span class="open">营业</span>
			<?php else:?>
				<span class="close">休息</span>
			<?php endif;?>
		</div>
	</a>
	</li>
	<?php endforeach;?>
  </ul>
</section>
<script>
	$(document).ready(function(){
		$("#nav_lst>span").click(function(){
			var cateid = $(this).attr("id");
			window.location.href=app_url+"/index?cateid="+cateid;
		})
	})
	$(function() {
		var $tpl = $('#amz-tpl'),
		source = $tpl.text(),
		template = Handlebars.compile(source),
		data = {
			header: {
				"content": {
					"title": "宅当家-Beta3.0"
				}
			},
			navbar: {
				"options": {
				  "cols": "3",
				},
				"content": [
				  {
					"title": "客服",
					"link": "tel:86941514",
					"icon": "phone",
					"dataApi": ""
				  },
				  {
					"title": "订单",
					"link": "__APP__/Order/orderInfo",
					"icon": "user-md",
					"dataApi": ""
				  },
				  {
					"title": "我的",
					"link": "__APP__/User/ucenter",
					"icon": "user-md",
					"dataApi": ""
				  }
				]
			}
		},
		html = template(data);
		$tpl.before(html);
	});
</script>
</body>
</html>
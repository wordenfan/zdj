<!doctype html>
<html class="no-js">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $name;?></title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="renderer" content="webkit">
	<meta http-equiv="Cache-Control" content="no-siteapp" />
	<link rel="stylesheet" href="<?php echo base_url('static/mobile_assets/css/amazeui.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('static/mobile_assets/css/mobile.css');?>">
    <script src="<?php echo base_url('static/mobile_assets/js/zepto.min.js?ver=1.1.3');?>"></script>
	<script src="<?php echo base_url('static/mobile_assets/js/amazeui.js');?>"></script>
	<script src="<?php echo base_url('static/mobile_assets/js/handlebars.min.js');?>"></script>
	<script src="<?php echo base_url('static/mobile_assets/js/amazeui.widgets.helper.js');?>"></script>
	<script src="<?php echo base_url('static/js/jquery-1.11.0.min.js');?>"></script>
</head>
<body>
<script type="text/x-handlebars-template" id="amz-tpl">
	{{>header header}}
</script>

<section class="menu_shop">
  <div class="am-g" style="overflow:hidden;">
    <div class="col-sm-12" id="summary" style="white-space:nowrap;">
		<marquee id="scrollArea" height="27" width="100%" loop="-1" scrollamount="1" scrolldelay="1" direction="left" onMouseOver="this.stop()" onMouseOut="this.start()"><?php echo $summary;?></marquee>
	</div>
  </div>
</section>
<div class="shop_wrap">
	<div class="am-g">
		<div class="col-sm-3 shop_left" id="navlist">
			<ul>
				<?php foreach($foodlist_tmp as $k=>$vo):?>
					<li id="<?php echo $vo['type_id'];?>" style=""><?php echo $vo['type_name'];?><span class="foodlist_num">0</span></li>
				<?php endforeach;?>
			</ul>
		</div>
		<div class="col-sm-9 shop_right">
			<?php foreach($foodlist_tmp as $k=>$wo):?>
				<ul id="food_lst_<?php echo $wo['type_id'];?>" class="food_lst" style="display:none;margin-top:0;" >
					<?php foreach($wo['food_list'] as $k=>$mo):?>
						<li id="f_<?php echo $mo['food_id'];?>" class="f_list_li">
							<span><?php echo $mo['food_name'];?></span><span class="price">￥<?php echo $mo['sale_price'];?></span>
							<div class="operate">
								<a href="javascript:void(0)" class="jian" id="decrease_id" cid="<?php echo $mo['food_id'];?>">－</a>
								<input type="text" value="1" class="food_num" readonly />
								<a href="javascript:void(0)" class="jia" id="increase_id" ctype="<?php echo $wo['type_id'];?>" cid="<?php echo $mo['food_id'];?>" cname="<?php echo $mo['food_name'];?>" cprice="<?php echo $mo['sale_price'];?>">＋</a>
							</div>
						</li>
					<?php endforeach;?>
				</ul>
			<?php endforeach;?>
		</div>
	</div>
</div>
<footer class="footer">
	<div class="cart">
        <form  id="orderform" name="orderform" method="post" action="<?php echo base_url('order/index'); ?>" onsubmit="return submitOrder();">
			<?php if($free_send ==1):?>
			<input type="hidden" class="mian"/>
			<?php endif;?>
			<input id="f_shopid" type="hidden" name="o_shopid" value="<?php echo $id;?>" />
			<div id="cart_l">
				<span>总计:<font>0.0</font>元</span>
				<span>配送费:<font>6.0</font>元</span>
			</div>
			<div id="cart_r">
				<?php if($open_close == 1):?>
					<button id="sub_order" type="submit"><i class="am-icon-shopping-cart">&nbsp;</i>选好了</button>
				<?php else:?>
					<button id="sub_order_disable" disabled="disabled" type="submit">休息中</button>
				<?php endif;?>
			</div>
		</form>
	</div>
</footer>
<script>
	var food_sum = 0;//每次操作都会导致是否出现配送费的价格变动，所以此为变量
	var app_url='/shop'; 
	// var uname = '请登录';
	// var ulink = '__APP__/User/login';
	var send_prc = <?php echo $send_price;?>;
	var login_status = <?php echo $login_status;?>;
	if(login_status)
	{
		uname = '<?php echo isset($myinfo)?$myinfo['uname']:'';?>';
		ulink = 'javascript:void(0)';
	}
	var screen_height = $(window).height();
	$('.shop_left').css('height',screen_height-49);
	//加载完毕
	$(function() 
	{	
		window.onscroll = function()
		{
			//判断浏览器的内核类型
			if(navigator.userAgent.indexOf('Opera') >= 0||navigator.userAgent.indexOf('Chrome') >= 0||navigator.userAgent.indexOf('Safari') >= 0){
				scroll_top_num=$('body').scrollTop();
			}//判断是否为欧朋，谷歌，苹果；
			if(navigator.userAgent.indexOf('MSIE') >= 0||navigator.userAgent.indexOf('Firefox') >= 0){
				scroll_top_num=$('html').scrollTop();
			}//判断IE，火狐；
			if(scroll_top_num>=79){
				$('#navlist').addClass('navlist_fixed');
			}
			if(scroll_top_num<79){
				$('#navlist').removeClass('navlist_fixed')
			}
		}
		//插件
		var $tpl = $('#amz-tpl'),
		source = $tpl.text(),
		template = Handlebars.compile(source),
		data = {
			header: {
				"content": {
					"left": [{
						"link": "http://m.26632.com",         // url : http://xxx.xxx.xxx
						"title": "首页",        // 链接标题
						"icon": "chevron-left",         // 字体图标名称: 使用 Amaze UI 字体图标 http://www.amazeui.org/css/icon
						"customIcon": ""    // 自定义图标 URL，设置此项后当前链接不再显示 icon
					}],
					"title": "<?php echo $name;?>",
					"right": [{
						"link": "javascript:void(0)",
						"title": uname,
						"icon": "user",
						"customIcon": "",
						"className": ""
					}]
				}
			}
		},
		html = template(data);
		$tpl.before(html);
		//读取原购物列表
		//$cart = <{$shop_cart}>;
　　		//showHtml($cart);
		//类别点击
		$(".food_lst:eq(0)").show();
		$('#navlist>ul>li').on('click', function() 
		{
			$(".food_lst").hide();
			var id = $(this).attr('id');
			$("#food_lst_"+id).show();
		})
	});
	//====加号
	$('body').on('click','#increase_id', function() 
	{
		var _id = $(this).attr("cid");
		var _name = $(this).attr("cname");
		var _price = $(this).attr("cprice");
		var _sid = <?php echo $id;?>;
		var _type = $(this).attr("ctype");
		
		$.post(app_url+'/doShopping',{sid:_sid,fid:_id,ftype:_type,fname:_name,fprice:_price,fmod:1,send_price:send_prc},function(data)
		{
			showHtml(data);	
		},'json')
	});
	//====减号
	$('body').on('click','#decrease_id', function() 
	{
		var _sid = <?php echo $id;?>;
		var _id = $(this).attr("cid");
		
		$.post(app_url+'/doShopping',{sid:_sid,fid:_id,fmod:2,send_price:send_prc},function(data)
		{
			showHtml(data);	
		},'json')
	});
	function showHtml(json)
	{
		//默认全隐藏
		$('.jian').hide();
		$('.food_num').hide();
		var html_str="";//购物列表htnl
		var free_send_price = <?php echo config_item(AREA.'FREE_SEND');?>;
		var free_send_flag = false;
		//类别数量全部清空隐藏
		$(".shop_left>ul>li>span").html('0');
		$(".shop_left>ul>li>span").hide();
		for(var w in json )
		{
			//更改数量
			$('#f_'+w).find('input[type=text]').val(json[w].num);
			//合计总额
			if(w=="total")
			{
				send_prc = <?php echo $send_price;?>;
				food_sum = parseFloat(json[w]);//用于判断是否够起送价
				//是否够免配送资格，修改配送费
				if($('.mian').length>0&&json[w] >= parseFloat(free_send_price))
				{
					send_prc = 0;
				}
				break;
			}else{
				$('#f_'+w).find('input,a').show();
			}
			//更新类别数量
			var obj = $(".shop_left>ul>li#"+json[w].type+">span");
			obj.show();
			var type_num = parseInt(obj.html())+parseInt(json[w].num);
			obj.html(type_num);
		}
		html_str+='<div id="cart_l"><span>总计:<font>'+json["total"]+'</font>元</span><span>配送费:<font>'+send_prc+'</font>元</span></div>';
		$("#cart_l").remove();
		$("#cart_r").before(html_str);
	}
	//提交订单
	function submitOrder()
	{
		var id = $("#f_uid").val();
		var _start_price = "<?php echo $start_price;?>";
		if(id==0)
		{
			alert('请先登录!');
			window.location.href = 'user/login';
			return false;
		}else if(food_sum < parseFloat(_start_price))
		{
			alert('商家满'+_start_price+'元起送哦！');
			return false;
		}else{
			return true;
		}
	}
	//文字滚动
</script>
</body>
</html>
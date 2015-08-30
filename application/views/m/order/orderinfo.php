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
    <div class="col-sm-12">部分食品需要打包盒，已计入食品价格</div>
  </div>
</section>
<div class="detail_wrap">
		<ul>
			<li>				
				<div class="am-g detail_til">
					<div class="col-sm-6">餐品</div>
					<div class="col-sm-4">价格 * 数量</div>
					<div class="col-sm-2">小计</div>
				</div>
			</li>		
			<?php foreach($list_tmp as $k=>$mo):?>
				<li>				
					<div class="am-g detail_a">
						<div class="col-sm-6"><?php echo $mo['name'];?></div>
						<div class="col-sm-4"><?php echo $mo['price'];?><span>*</span><?php echo $mo['num'];?></div>
						<div class="col-sm-2"><?php echo $mo['price']*$mo['num'];?></div>
					</div>
				</li>
			<?php endforeach;?>	
			<li>				
				<div class="am-g detail_b">
					<div class="col-sm-10 col-sm-offset-2">配送费：<span><b>￥<?php echo $sendprc_tmp;?></b></span>&nbsp;元</div>
				</div>
			</li>
			<li>				
				<div class="am-g detail_b">
					<div class="col-sm-6 col-sm-offset-6">共计：<span><b>￥<?php echo $sum;?></b></span>&nbsp;元</div>
				</div>
			</li>
			<li>				
				<div class="am-g">
					<div class="col-sm-12 detail_til">收货信息</div>
				</div>
			</li>
		</ul>
		<form>
			<input id="f_shopid" type="hidden" name="shopid" value="<?php echo $shopid_tmp;?>" />
			<input type="hidden" name="name" id="form_name" value="(手机)<?php echo isset($myinfo)?$myinfo['uname']:'';?>" />
			<div class="form_info">		
				<div class="am-g form_info_input">
					<div class="col-sm-3"><label>地址：</label></div>
					<div class="col-sm-9">
						<input type="text" name="address" id="form_address" value="<?php echo isset($user_address)?$user_address:''?>" placeholder="输入送餐地址"/>
					</div>
				</div>
				<div class="am-g form_info_input">
					<div class="col-sm-3"><label>电话：</label></div>
					<div class="col-sm-9">
						<input type="text" name="tel" id="form_tel" value="<?php echo isset($user_tel)?$user_tel:''?>" placeholder="输入联系电话，并保持畅通"/>
					</div>
				</div>
				<div class="am-g form_info_input">
					<div class="col-sm-3"><label>备注：</label></div>
					<div class="col-sm-9">
						<input type="text" name="remark" id="form_remark" placeholder="输入备注信息"/>
					</div>
				</div>
			</div>
		</form>
</div>
<footer class="footer">
	<div class="cart">
		<span>共计<font><?php echo $sum;?></font>元</span>
		<button id="sub_order" >提交订单</button>
	</div>
</footer>
<script>
	var app_url='/m/order'; 
	var uname = '请登录';
	var login_status = <?php echo $login_status;?>;
	if(login_status)
	{
		uname = '<?php echo isset($myinfo)?$myinfo['uname']:'';?>';
	}
	var screen_height = $(window).height();
	//$('.detail_wrap').css('height',screen_height-30);
	$(function() {
		var $tpl = $('#amz-tpl'),
		source = $tpl.text(),
		template = Handlebars.compile(source),
		data = {
			header: {
				"theme": "",
				"content": {
					"left": [{
						"link": app_url+"/Shop/shopinfo/shopid/<?php echo $shopid_tmp;?>",         // url : http://xxx.xxx.xxx
						"title": "",        // 链接标题
						"icon": "chevron-left",         // 字体图标名称: 使用 Amaze UI 字体图标 http://www.amazeui.org/css/icon
						"customIcon": ""    // 自定义图标 URL，设置此项后当前链接不再显示 icon
					}],
					"title": "<?php echo $shopname_tmp;?>",					
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
	});
	//提交菜品
	$("#sub_order").click(function() 
	{
		var jname = $('#form_name').val();
		var jtel = $('#form_tel').val();
		var jaddress = $('#form_address').val();
		var jshopid = "<?php echo $shopid_tmp;?>";
		var jremark = $('#form_remark').val();
		//配送信息不全
		if(jname==""||jtel==""||jaddress=="")
		{
			alert('请填写完整配送信息！');
			return false;
		}
		//表单提交		
		$('#sub_order').attr('disabled',"true");
		$.post(app_url+'/sendOrder',{name:jname,tel:jtel,address:jaddress,shopid:jshopid,remark:jremark},function(data)
		{
			window.location.href=app_url+'/orderStatus/st/'+data.flag+'/msg/'+data.msg;
		},'json')
		
		
	})
</script>
</body>
</html>
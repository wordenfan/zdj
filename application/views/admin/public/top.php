<html>
<head>
<meta charset="utf-8">
<title>系统管理</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/css/bootstrap.min.css') ;?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/css/ad_base.css') ;?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/css/ad_module.css') ;?>" />
<script Language="JavaScript" src="<?php echo base_url('static/js/jquery-1.11.0.min.js');?>"></script>
<script Language="JavaScript" src="<?php echo base_url('static/js/swfobject.js');?>"></script>
</head>
<body>
<script type="text/javascript">
	var flashvars = {url:"<?php echo base_url('static/flash/');?>"};
	var params = {};
	params.allowscriptaccess = "sameDomain";
	var attributes = {};
	attributes.id = "order";
	attributes.name = "order";
	attributes.align = "middle";
	swfobject.embedSWF(
		"<?php echo base_url('static/flash/order.swf');?>", "flashContent", 
		"1px", "1px", 
		"9.0.0", "expressInstall.swf",
		flashvars, params, attributes);
</script>
<div id="flashContent"></div>
<div id="header" class="ng-scope">
	<div ng-controller="appheaderCtrl" class="header-top-logo ng-scope" role="navigation">
	    <div class="container">
		    <div class="header_logo fl" style="font-size:18px;">
		        <h1>管理系统</h1>
		    </div>
	        <ul ng-if="user.name" class="list-inline header-top ng-scope">
                <li><a style="text-decoration: underline" target="_blank" href="/home/home/index" class="text-danger">网站首页</a></li>
                <li>Hi ,<span class="red-txt-cl ng-binding" ><?php echo $myinfo['uname'];?></span></li>
                <li><a target="_top" href="/admin/login/do_logout" class="text-danger">退出</a></li>
	        </ul> 
	        <div class="clear"></div>
	    </div>
     </div>
</div>
<script>
	$(function(){
		/*
		function getElement(){
			$(".order_id").each(function(i){
				arr.push($(this).find('a').eq(0).html());
			})
		}*/
		function refresh_orderlist()
		{
			$.post('/admin/order/refreshOrder',{tt:123},function(data)
			{
				// alert(data);
				if(data=='new')
				{
					var flash=document.getElementById("order");
					flash.jsCall();
				}
			},'json')
		}
		setInterval(refresh_orderlist,20000);
	})
</script>
</body>
</html>

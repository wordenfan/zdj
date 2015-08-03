<html>
<head>
<meta charset="utf-8">
<title></title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width">
<style type="text/css">
@charset "UTF-8";[ng\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide{display:none !important;}ng\:form{display:block;}.ng-animate-block-transitions{transition:0s all!important;-webkit-transition:0s all!important;}.ng-hide-add-active,.ng-hide-remove{display:block!important;}</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/css/bootstrap.min.css') ;?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/css/ad_base.css') ;?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/css/ad_module.css') ;?>" />

<script type="text/javascript" src="<?php echo base_url('static/js/jquery-1.11.0.min.js') ;?>"/></script>
<script type="text/javascript">
$(function(){
    $('#menu-nav').find('.sub-menu').find('a').click(function(e){
        e.stopPropagation();
        $('#menu-nav').find('.sub-menu').removeClass('active');
        $(this).parent().addClass('active');
        $(this).parents('li').addClass('active');
    });
    $('#menu-nav').children('li').click(function(e){
        e.stopPropagation();
        if($(this).hasClass('active')){
            $(this).removeClass('active');
            $(this).find('ul').slideUp("fast");
        } else {
            $(this).addClass('active').siblings().removeClass('active');
            $(this).find('ul').slideDown("fast");
        }
    });
    
})
</script>
</head>
<body>
<div id="menu_nav"  class="ng-scope">
	<div ng-controller="navCtrl" class="ng-scope">
		<ul id="menu-nav" >
			<li class="ng-scope">
                <span class="glyphicon"></span>
                <a class="ng-binding ng-scope">订单管理</a>
                <ul>
					<li  class="sub-menu ng-scope">
                        <a target="main-frame" class="ng-binding ng-scope" href="list.htm">订单列表</a>
                    </li>
					<li  class="sub-menu ng-scope">
                        <a target="main-frame" class="ng-binding ng-scope" href="add.htm">添加订单</a>
                    </li>
				</ul>           
            </li>
			<li class="ng-scope">
                <span class="glyphicon"></span>
                <a class="ng-binding ng-scope">用户管理</a>
                <ul>
					<li  class="sub-menu ng-scope">
						<a target="main-frame" class="ng-binding ng-scope" href="/system/order">用户列表</a>
					</li>
				</ul>           
            </li>
			<li class="ng-scope">
                <span class="glyphicon"></span>
                <a class="ng-binding ng-scope">商户管理</a>
                <ul>
					<li  class="sub-menu ng-scope">
                        <a target="main-frame" class="ng-binding ng-scope" href="/system/article">用户列表</a>
                    </li>
					<li  class="sub-menu ng-scope">
                        <a target="main-frame" class="ng-binding ng-scope" href="/system/articlecat">添加商户</a>
                    </li>
                                    </ul>           
            </li>
			<li class="ng-scope">
                <span class="glyphicon"></span>
                <a class="ng-binding ng-scope">新闻管理</a>
                <ul>
					<li  class="sub-menu ng-scope">
                        <a target="main-frame" class="ng-binding ng-scope" href="/system/user">新闻列表</a>
                    </li>
					<li  class="sub-menu ng-scope">
                        <a target="main-frame" class="ng-binding ng-scope" href="/system/user/addUser">添加新闻</a>
                    </li>
				</ul>           
            </li>
                        <li class="ng-scope">
                <span class="glyphicon"></span>
                <a class="ng-binding ng-scope">系统设置</a>
                <ul>
                                        <li  class="sub-menu ng-scope">
                        <a target="main-frame" class="ng-binding ng-scope" href="/system/ads">运营设置</a>
                    </li>
                                        <li  class="sub-menu ng-scope">
                        <a target="main-frame" class="ng-binding ng-scope" href="/system/adPosition">系统设置</a>
                    </li>
                                    </ul>           
            </li>
			<li class="ng-scope">
                <span class="glyphicon"></span>
                <a class="ng-binding ng-scope">财务管理</a>
                <ul>
					<li  class="sub-menu ng-scope">
						<a target="main-frame" class="ng-binding ng-scope" href="meiri.htm">每日财报</a>
					</li>
					<li  class="sub-menu ng-scope">
						<a target="main-frame" class="ng-binding ng-scope" href="tongji.htm">统计列表</a>
					</li>
					<li  class="sub-menu ng-scope">
						<a target="main-frame" class="ng-binding ng-scope" href="yuangong.htm">员工结算</a>
					</li>
				</ul>           
            </li>
			<li class="ng-scope">
                <span class="glyphicon"></span>
                <a class="ng-binding ng-scope">其他管理</a>
                <ul>
					<li  class="sub-menu ng-scope">
						<a target="main-frame" class="ng-binding ng-scope" href="/system/manager/">管理员列表</a>
					</li>
					<li  class="sub-menu ng-scope">
						<a target="main-frame" class="ng-binding ng-scope" href="/system/role/">角色管理</a>
					</li>
				</ul>           
            </li>
			</ul>
    </div>
</div>
</body>
</html>
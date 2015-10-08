<html>
<head>
<meta charset="utf-8">
<title>系统管理</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width">
<style type="text/css">
@charset "UTF-8";[ng\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide{display:none !important;}ng\:form{display:block;}.ng-animate-block-transitions{transition:0s all!important;-webkit-transition:0s all!important;}.ng-hide-add-active,.ng-hide-remove{display:block!important;}
</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/css/bootstrap.min.css') ;?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/css/ad_base.css') ;?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/css/ad_module.css') ;?>" />
</head>
<body>
<div id="header" class="ng-scope">
	<div ng-controller="appheaderCtrl" class="header-top-logo ng-scope" role="navigation">
	    <div class="container">
		    <div class="header_logo fl" style="font-size:18px;">
		        <h1>管理系统</h1>
		    </div>
	        <ul ng-if="user.name" class="list-inline header-top ng-scope">
	          <li>Hi ,<span class="red-txt-cl ng-binding" >91批购</span></li>
	          <li><a target="_top" href="/admin/login/do_logout" class="text-danger">退出</a></li>
	        </ul> 
	        <div class="clear"></div>
	    </div>
     </div>
</div>
</body>
</html>

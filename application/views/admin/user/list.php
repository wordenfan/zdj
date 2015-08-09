<html>
<head>
<meta charset="utf-8">
<title>商品列表_商品管理_91批购系统管理</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width">
<style type="text/css">
</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/css/bootstrap.min.css');?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/css/ad_base.css');?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/css/ad_module.css');?>" />
<style class="ng-scope"></style>
</head>
<body>
<div id="main">
    <div id="crumbs" ng-component="common/crumb/crumb" class="ng-scope">
        <ol class="breadcrumb ng-scope" ng-controller="crumbCtrl">
            <li class="bcfirst"><i class="glyphicon glyphicon-map-marker"></i> 当前位置：</li>
            <li ng-repeat="crumb in crumbs" ng-class="{active: $last}" class="ng-scope"><span ng-if="$first" class="active ng-binding ng-scope">商家管理</span></li>
        </ol>
    </div>
    <div class="ng-scope">
        <div class="list">
            <div class="check well">
                <div class="clearfix"> 
                    <div class="container">
                    <div class="row">
                        <div class="col-md-1" style="text-align:right;height:32px;line-height:32px">
                        商户搜索
                        </div>
                        <div class="col-md-2" style="padding-left:0px">
                            <select class="form-control w150" id="search_type" name="search_type" >
                                <option value="0">商户名称</option>
                                <option value="1" >商户id</option>
                            </select>
                        </div>
                        <div class="col-md-3" style="padding-left:0px">
                            <input type="text" name="keyword" class="form-control w250" placeholder="号码/ID" id="searchInput">
                        </div>
                        <div class="col-md-5" style="">
                            <button type="button" class="btn btn-info ladda-button" id="searchBtn" >
                            <i class="glyphicon glyphicon-search mr5"></i>搜索
                            </button>
                        </div>
                        <div class="col-md-1" style="padding-left:0px">
                            <button type="button" class="btn btn-primary ladda-button pull-right" id="addOrderBtn" >添加商家</button>
                        </div>
                    </div>
                    </div>            
                </div> 
            </div> 
            <div class="table_wrap">
              <div class="panel panel-default">
                <div class="panel-body pt30">
                  <table class="table table-condensed table-hover table-bordered" style="font-size:12px;" >
					<thead>
					<tr bgcolor="#FBFCE2">
						<td width="4%" height="24" align="center">id</td>
						<td width="6%" align="center">昵称</td>
						<td width="6%" align="center">注册时间</td>
						<td width="6%" align="center">上次登录</td>
						<td width="6%" align="center">电话</td>
						<td width="20%" align="center">配送地址</td>
						<td width="15%" align="center">标记地址</td>
						<td width="15%" align="center">其他标记</td>
						<td width="4%" align="center">状态</td>
						<td width="18%" align="center">管理项</td>
					</tr>
                    </thead>
                    <tbody id="goodsList">
                    <?php foreach($info_tmp as $k=>$v):?>
                        <tr bgcolor="#FFFFFF" align="center" class="hover">
							<td width="4%">1624</td>
							<td width="6%">13176510991</td>
							<td width="6%" >2015-08-08 14:17</td>
							<td width="6%" >2015-08-08</td>
							<td width="6%" align="left">13176510991</td>
							<td width="20%"align="left">青岛市黄岛区北江支路小区387号2单元</td>
							<td width="15%"></td>
							<td width="15%"></td>
							<td width="4%" >正常</td>
							<td>
								<a href="/zadmin/User/userEdit/id/1624.html" class="btn btn-default btn-sm">修改</a>
								<a href="/zadmin/User/userOrder/id/1624.html"class="btn btn-default btn-sm">订单</a>
								<a href="/zadmin/User/edit/id/1624.html" class="btn btn-default btn-sm">禁用</a>
							</td>
						</tr>
                    <?php endforeach;?>
                    </tbody>
                  </table>
                  <?php echo $page_list;?>
                </div>  
              </div> 
            </div>
            <nav>
                <ul class="pagination pagination-sg" style="float: right;"></ul>
            </nav>
        </div>
    </div>
</div>
<script Language="JavaScript" src="<?php echo base_url('static/js/jquery-1.11.0.min.js');?>"></script>
<script type="text/javascript">
$(function(){
    $("#addOrderBtn").click(function(){
		
	})
    $("#searchBtn").click(function(){
		$type = $.trim($('#search_type').val());
		$type_str = String($type) == '0'?'otel':'oname';
		$keyword = String($.trim($('#searchInput').val()));
		if($keyword==''){
			alert('搜索内容不能为空！')
		}
        $url = "<?php echo base_url('admin/order/olist/type');?>";
        window.location.href = $url +'/'+$type_str+'/condition/'+$keyword+'';
    })
})
</script>
</body>
</html>
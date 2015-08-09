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
    <div class="panel panel-default pt30 pb50">
        <form id="category" class="form-horizontal ng-invalid ng-invalid-required ng-dirty ng-valid-pattern" role="form">
			<div class="form-group">
				<label for="" class="col-md-2 control-label">网站标题：</label>
				<div class="col-md-3">
					<input type="text" value="" class="form-control ng-pristine ng-invalid ng-invalid-required ng-valid-maxlength" placeholder="商品名称" name="goods_name"/>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-md-2 control-label">网站描述：</label>
				<div class="col-md-3">
					<textarea type="text" class="form-control ng-pristine ng-invalid ng-invalid-required ng-valid-maxlength" placeholder="标签" value="" name="goods_tags"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-md-2 control-label">网站关键字：</label>
				<div class="col-md-3">
					<input type="text" value="" class="form-control ng-pristine ng-invalid ng-invalid-required ng-valid-maxlength" placeholder="商品名称" name="goods_name"/>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-md-2 control-label">营业时间：</label>
				<div class="col-md-3">
					<input type="text" value="" class="form-control ng-pristine ng-invalid ng-invalid-required ng-valid-maxlength" placeholder="商品名称" name="goods_name"/>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-md-2 control-label">客服电话：</label>
				<div class="col-md-3">
					<input type="text" value="" class="form-control ng-pristine ng-invalid ng-invalid-required ng-valid-maxlength" placeholder="商品名称" name="goods_name"/>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-md-2 control-label">配送区域：</label>
				<div class="col-md-3">
					<input type="text" value="" class="form-control ng-pristine ng-invalid ng-invalid-required ng-valid-maxlength" placeholder="商品名称" name="goods_name"/>
				</div>
			</div>
			<div class="col-md-offset-2 col-md-6">
				<input type="hidden" name="goods_id" value="0"/>
				<button type="button" class="btn btn-primary ladda-button" id="addGoodsBtn">
					<span class="ladda-label">提交</span>
				</button>
				<button type="button" class="btn btn-success ladda-button" id="callBackGoodsBtn">
					<span class="ladda-label">返回</span>
				</button>
			</div>
		</form>
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
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
			<?php foreach ($info_tmp as $key => $value) :?>
                <?php if($value['name'] == AREA.'ANNOUNCEMENT_MODE'):?>
                <div class="form-group">
                    <label for="" class="col-md-2 control-label">爆单公告：</label>
                    <div class="col-md-3">
                        <label class="radio-inline">
                            <input type="radio" name="open_announce" <?php echo $value['value']==1?'checked=TRUE':'';?> id="inlineRadio1" value="1">开启
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="open_announce" <?php echo $value['value']==1?'':'checked=TRUE';?> id="inlineRadio2" value="0">关闭
                        </label>
                    </div>
                </div>
                <?php elseif ($value['name'] == AREA.'ANNOUNCEMENT'):?>
                <div class="form-group">
                    <label for="" class="col-md-2 control-label">公告内容：</label>
                    <div class="col-md-3">
                        <input type="text" value="<?php echo $value['value'];?>" class="form-control ng-pristine ng-invalid ng-invalid-required ng-valid-maxlength" placeholder="当前订单较多，配送大约需要70分钟" name="goods_name"/>
                    </div>
                    <div class="col-md-2">	
                        <div class="input-group">
                            <input type="text" class="form-control" id="exampleInputAmount" placeholder="配送时间"><div class="input-group-addon">分钟</div>
                        </div>
                    </div>
                </div>
                <?php elseif ($value['name'] == AREA.'SITE_CLOSE'):?>
                <div class="form-group">
                    <label for="" class="col-md-2 control-label">暂停接单(全部关闭)：</label>
                    <div class="col-md-3">
                        <label class="radio-inline">
                            <input type="radio" name="stop_receive" id="stop_receive_id1" <?php echo $value['value']==1?'checked=TRUE':'';?> value="1">开启
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="stop_receive" id="stop_receive_id2" <?php echo $value['value']==1?'':'checked=TRUE';?> value="0">关闭
                        </label>
                    </div>
                </div>
                <?php endif;?>
            <?php endforeach;?>
            
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
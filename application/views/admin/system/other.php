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
                <?php if($value['name'] == AREA.'SITE_TITLE'):?>
                    <div class="form-group">
                        <label for="" class="col-md-2 control-label">网站标题：</label>
                        <div class="col-md-3">
                            <input type="text" value="<?php echo $value['value'];?>" class="form-control ng-pristine ng-invalid ng-invalid-required ng-valid-maxlength" id="site_title"/>
                        </div>
                    </div>
                <?php elseif ($value['name'] == AREA.'SITE_DESCRIPTION'):?>
                    <div class="form-group">
                        <label for="" class="col-md-2 control-label">网站描述：</label>
                        <div class="col-md-3">
                            <textarea type="text" class="form-control ng-pristine ng-invalid ng-invalid-required ng-valid-maxlength" id="site_summary"><?php echo $value['value'];?></textarea>
                        </div>
                    </div>
                <?php elseif ($value['name'] == AREA.'SITE_KEYWORD'):?>
                    <div class="form-group">
                        <label for="" class="col-md-2 control-label">网站关键字：</label>
                        <div class="col-md-3">
                            <input type="text" value="<?php echo $value['value'];?>" class="form-control ng-pristine ng-invalid ng-invalid-required ng-valid-maxlength" id="site_keyword"/>
                        </div>
                    </div>
                <?php elseif ($value['name'] == AREA.'SERVICE_TIME'):?>
                    <div class="form-group">
                        <label for="" class="col-md-2 control-label">营业时间：</label>
                        <div class="col-md-3">
                            <input type="text" value="<?php echo $value['value'];?>" class="form-control ng-pristine ng-invalid ng-invalid-required ng-valid-maxlength" placeholder="按此格式(10:00-20:00)输入" id="site_bussiness_hour"/>
                        </div>
                    </div>
                <?php elseif ($value['name'] == AREA.'SERVICE_PHONE'):?>
                    <div class="form-group">
                        <label for="" class="col-md-2 control-label">客服电话：</label>
                        <div class="col-md-3">
                            <input type="text" value="<?php echo $value['value'];?>" class="form-control ng-pristine ng-invalid ng-invalid-required ng-valid-maxlength" id="site_tel"/>
                        </div>
                    </div>
                <?php elseif ($value['name'] == AREA.'SERVICE_AREA'):?>
                    <div class="form-group">
                        <label for="" class="col-md-2 control-label">配送区域：</label>
                        <div class="col-md-3">
                            <input type="text" value="<?php echo $value['value'];?>" class="form-control ng-pristine ng-invalid ng-invalid-required ng-valid-maxlength" id="site_area"/>
                        </div>
                    </div>
                <?php endif;?>
            <?php endforeach;?>
			
			<div class="col-md-offset-2 col-md-6">
				<input type="hidden" name="goods_id" value="0"/>
				<button type="button" class="btn btn-primary ladda-button" id="addConfigBtn">
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
    $("#addConfigBtn").click(function(){
        var title           = $('#site_title').val();
        var summary         = $('#site_summary').val();
        var keyword         = $('#site_keyword').val();
        var bussiness_hour  = $('#site_bussiness_hour').val();
        var tel             = $('#site_tel').val();
        var area            = $('#site_area').val();
		
		$.post('/admin/system/conf_other',{title:title,summary:summary,keyword:keyword,bussiness_hour:bussiness_hour,area:area,tel:tel},function(data){
            if(data.status == 1){
                window.location.Reload()
            }else{
                alert('数据提交错误！')
            }
        },'json')
	})
})
</script>
</body>
</html>
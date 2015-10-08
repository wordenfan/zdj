<html>
<head>
<meta charset="utf-8">
<title>添加商品_商品管理_91批购系统管理</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width">
<style type="text/css">
@charset "UTF-8";[ng\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide{display:none !important;}ng\:form{display:block;}.ng-animate-block-transitions{transition:0s all!important;-webkit-transition:0s all!important;}.ng-hide-add-active,.ng-hide-remove{display:block!important;}</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/css/bootstrap.min.css');?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/css/ad_base.css');?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/css/ad_module.css');?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/css/ad_default.css');?>" />


<script Language="JavaScript" src="<?php echo base_url('static/js/jquery-1.11.0.min.js');?>"></script>
<script Language="JavaScript" src="<?php echo base_url('static/js/bootstrap.min.js');?>"></script>
<script Language="JavaScript" src="<?php echo base_url('static/js/jquery.uploadify.min.js');?>"></script>
<style>
#result h3 {font-size: 18px;}
.error {float: left;color: #b94a48;font-weight: normal;}
.hidden-text {border-color: #ffffff;width: 0;height: 0;padding: 0;margin: 0;border-radius: 0;display: inline;}
.images_vcl .btn-danger{position: relative; overflow: hidden; margin-right: 10px;}
.images_vcl .btn-danger input[type="file"]{position: absolute; left:0; top:0; cursor:pointer; line-height: 999px; opacity: 0}
.images_vcl input:focus{outline: none}
.images_vcl .form-control:focus{border-color:#ccc; -webkit-box-shadow:none; box-shadow: none;}
.nav{background-color:#31b0d5;}
.nav li a{color:#ffffff;}
.nav li a:hover,.nav li a:focus{background-color:#ffffff;color:#555;border-bottom: -1px;}
#regionCell .close {display: block; position: absolute; top:-8px; left: 65px;}
.nete_p{padding:0 10px 10px 10px;float: left;}
.badge {position:relative;padding: 10px 10px;font-size: 12px;font-weight: 700;line-height: 1;color: #fff;text-align:center;white-space: nowrap;background-color: #d9534f;border-radius: 10px;}
.badge span{position:absolute; right:-8px; top:-8px; cursor:pointer; font-size:5px; display:block;padding: 5px 5px;font-weight: 700;line-height: 1;color: #fff;text-align: center;white-space: nowrap;background-color: #d9534f;border-radius: 10px;}

</style>
</head>
<body>
	<div id="main">
      <div id="crumbs" ng-component="common/crumb/crumb" class="ng-scope">
        <ol class="breadcrumb ng-scope" ng-controller="crumbCtrl">
        	<li class="bcfirst"><i class="glyphicon glyphicon-map-marker"></i> 当前位置：</li>
			  <li><a href="#">商品管理</a></li>
			  <li class="active">添加商家</li>
        </ol>
      </div>
      <div ui-view="" class="ng-scope">
            <div ng-component="modules/coupon/addCoupon" class="ng-scope">
                <div ng-controller="addCouponCtrl" class="ng-scope">
                    <div class="panel panel-default">
                        <div class="panel-body pt30">
							<form action="" method="post" id="category" class="form-horizontal ng-invalid ng-invalid-required ng-dirty ng-valid-pattern" role="form">
                                <div class="form-group">
                                    <label for="" class="col-md-2 control-label">商家名称：</label>
                                    <div class="col-md-3">
                                        <input name="shop_name" type="text" value="<?php echo isset($info['name']) ? $info['name'] : '' ; ?>" class="form-control ng-pristine ng-invalid ng-invalid-required ng-valid-maxlength" placeholder="商品名称"/>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label for="" class="col-md-2 control-label">特色简介：</label>
                                    <div class="col-md-3">
                                        <input name="shop_summary" type="text" value="<?php echo isset($info['summary']) ? $info['summary'] : '' ; ?>"  class="form-control ng-pristine ng-invalid ng-invalid-required ng-valid-maxlength"/>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label for="" class="col-md-2 control-label">订餐电话：</label>
                                    <div class="col-md-3">
                                        <input name="shop_tel" type="text" value="<?php echo isset($info['telephone']) ? $info['telephone'] : '' ; ?>" class="form-control ng-pristine ng-invalid ng-invalid-required ng-valid-maxlength"/>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label for="" class="col-md-2 control-label">商家地址：</label>
                                    <div class="col-md-3">
                                        <input name="shop_address" type="text" value="<?php echo isset($info['address']) ? $info['address'] : '' ; ?>" class="form-control ng-pristine ng-invalid ng-invalid-required ng-valid-maxlength"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">所属类型：</label>
                                    <div class="col-sm-2">
                                        <select name="shop_type" class="form-control">
                                            <option value="0">请选择分类</option>
                                            <?php foreach ($shop_type as $type_k => $type_v):?>
                                                <option value="<?php echo $type_k;?>"  <?php echo (isset($info['type'])&&$type_k==$info['type'])?'selected':'';?> ><?php echo $type_v;?></option>
                                            <?php endforeach;?>
										</select>
									</div>
                                </div>
								<div class="form-group">
                                    <label class="col-sm-2 control-label">所属片区：</label>
                                    <div class="col-sm-2">
                                        <select name="shop_area_id" class="form-control">
                                            <option value="0">请选择区域</option>
                                            <?php foreach ($shop_area as $area_k=>$area_v):?>
                                                <option value="<?php echo $area_v['id'];?>" <?php echo (isset($info['area_id'])&&$area_v['id']==$info['area_id'])?'selected':'';?>><?php echo $area_v['name'];?></option>
                                            <?php endforeach;?>
										</select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-2 control-label">营业时间：</label>
                                    <div class="col-md-3">
                                        <input name="shop_business_hour" type="text" value="<?php echo isset($info['business_hours']) ? $info['business_hours'] : '' ; ?>" class="form-control ng-pristine ng-invalid ng-invalid-required ng-valid-maxlength"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-2 control-label">起送价格：</label>
                                    <div class="col-md-3">
                                        <input name="shop_start_price" type="text" value="<?php echo isset($info['start_price']) ? $info['start_price'] : '' ; ?>" class="form-control ng-pristine ng-invalid ng-invalid-required ng-valid-maxlength"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-2 control-label">配送费用：</label>
                                    <div class="col-md-3">
                                        <input name="shop_send_price" type="text" value="<?php echo isset($info['send_price']) ? $info['send_price'] : '' ; ?>"  class="form-control ng-pristine ng-invalid ng-invalid-required ng-valid-maxlength"/>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label for="" class="col-md-2 control-label">显示顺序：</label>
                                    <div class="col-md-3">
                                        <input name="shop_sort" type="text" value="<?php echo isset($info['sort']) ? $info['sort'] : '' ; ?>"  class="form-control ng-pristine ng-invalid ng-invalid-required ng-valid-maxlength"/>
                                    </div>
                                </div>
								<div class="col-md-offset-2 col-md-6">
                                    <input type="hidden" name="shop_id" id="shop_id_id" value="0"/>
                                    <button type="submit" class="btn btn-primary ladda-button" id="addGoodsBtn">
                                        <span class="ladda-label">提交</span>
                                    </button>
                                    <button type="button" class="btn btn-success ladda-button" id="callBackGoodsBtn">
                                        <span class="ladda-label">返回</span>
                                    </button>
                                </div>
							</form>
                        </div>
                    </div>
                </div>
            </div>
      </div>
</div>
<script type="text/javascript">
$(function(){
	//添加菜品,ajax局部刷新
    // $('#add_food').click(function(){
		// $('#myModal_food').modal('hide');
	// })	
})
</script>
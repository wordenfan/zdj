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
        <div ui-view="" class="ng-scope">
            <div ng-component="modules/coupon/addCoupon" class="ng-scope">
                <div ng-controller="addCouponCtrl" class="ng-scope">
                    <div class="panel panel-default">
                         <ul class="nav nav-tabs" role="tablist" style="">
                          <li role="presentation" class="active"><a href="#">基本信息</a></li>
                          <li role="presentation"><a href="#">菜品种类</a></li>
                          <li role="presentation"><a href="#">菜单管理</a></li>
                          <li role="presentation"><a href="#">其他管理</a></li>
                        </ul>
                        
                        <div class="panel-body pt30">
							<form id="category" class="form-horizontal ng-invalid ng-invalid-required ng-dirty ng-valid-pattern" role="form">
                                <div class="form-group">
                                    <label for="" class="col-md-2 control-label">商家名称：</label>
                                    <div class="col-md-3">
                                        <input type="text" value="<?php echo isset($info['name']) ? $info['name'] : '' ; ?>" class="form-control ng-pristine ng-invalid ng-invalid-required ng-valid-maxlength" placeholder="商品名称" name="goods_name"/>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label for="" class="col-md-2 control-label">特色简介：</label>
                                    <div class="col-md-3">
                                        <input type="text" value="<?php echo isset($info['summary']) ? $info['summary'] : '' ; ?>"  class="form-control ng-pristine ng-invalid ng-invalid-required ng-valid-maxlength"  name="goods_tags"/>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label for="" class="col-md-2 control-label">订餐电话：</label>
                                    <div class="col-md-3">
                                        <input type="text" value="<?php echo isset($info['telephone']) ? $info['telephone'] : '' ; ?>"" class="form-control ng-pristine ng-invalid ng-invalid-required ng-valid-maxlength" name="goods_name"/>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label for="" class="col-md-2 control-label">商家地址：</label>
                                    <div class="col-md-3">
                                        <input type="text" value="<?php echo isset($info['address']) ? $info['address'] : '' ; ?>" class="form-control ng-pristine ng-invalid ng-invalid-required ng-valid-maxlength" name="goods_name"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">所属类型：</label>
                                    <div class="col-sm-2">
                                        <select name="cat_id" class="form-control">
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
                                        <select name="cat_id" class="form-control">
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
                                        <input type="text" value="<?php echo isset($info['business_hours']) ? $info['business_hours'] : '' ; ?>" class="form-control ng-pristine ng-invalid ng-invalid-required ng-valid-maxlength" placeholder="购买该商品时最多可以使用积分" name="integral"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-2 control-label">起送价格：</label>
                                    <div class="col-md-3">
                                        <input type="text" value="<?php echo isset($info['start_price']) ? $info['start_price'] : '' ; ?>" class="form-control ng-pristine ng-invalid ng-invalid-required ng-valid-maxlength" placeholder="购买该商品时赠送积分" name="give_integral"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-2 control-label">配送费用：</label>
                                    <div class="col-md-3">
                                        <input type="text" value="<?php echo isset($info['send_price']) ? $info['send_price'] : '' ; ?>"  class="form-control ng-pristine ng-invalid ng-invalid-required ng-valid-maxlength" name="goods_tags"/>
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
						<div class="panel-body" style="display:none;">
                            <div class="form-group">
                                <div class="col-md-6" style="width:100%">
									<!-- Modal_button -->
									<div class="col-md-12" style="padding-left:0px;padding-bottom:10px">
										<button type="button" class="btn btn-default ladda-button pull-right" data-toggle="modal" data-target="#myModal" >添加品类</button>
									</div>
									<!-- Modal -->
									<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									  <div class="modal-dialog" role="document">
										<div class="modal-content">
										  <div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalLabel"><?php echo isset($shop_name)?$shop_name:'添加商家';?></h4>
										  </div>
										  <div class="modal-body">
											<div class="form-group">
												<label for="exampleInputPassword1">类别名称</label>
												<input type="email" class="form-control" id="exampleInputEmail1" placeholder="请输入类别名称">
											</div>
										  </div>
										  <div class="modal-footer">
											<button type="button" class="btn btn-primary">保存</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
										  </div>
										</div>
									  </div>
									</div>
									<!-- endModal -->
									<table class="table table-condensed table-hover table-bordered" style="font-size:12px;" >
									<thead>
									<tr bgcolor="#FBFCE2">
										<td width="10%" height="24" align="center">类别id</td>
										<td width="20%" height="24" align="center">类别名称</td>
										<td width="30%" align="center">所属店家</td>
										<td width="40%" align="center">管理项</td> 
									</tr>
									</thead>
									<tbody id="goodsList">
									<?php foreach($food_type as $k=>$v):?>
										<tr bgcolor="#FFFFFF" align="center" class="hover">
											<td width="10%" height="24" align="center"><?php echo $v['id'];?></td>
											<td width="20%" height="24" align="center"><?php echo $v['type_name'];?></td>
											<td width="30%" align="center"><?php echo $shop_name;?></td>
											<td width="15%" align="center">
												<button id="type_edit" class="btn btn-default btn-sm" type="button">编辑</button>
											</td>
										</tr>
									<?php endforeach;?>
									<tr id="foot_page" ><input type='hidden' value="" name='shop_id'/></tr>
									</tbody>
									</table>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body" style="display:none;">
							<!-- Modal_button -->
							<div class="col-md-12" style="padding-left:0px;padding-bottom:10px">
								<button type="button" class="btn btn-default ladda-button pull-right" data-toggle="modal" data-target="#myModa2" >添加菜品</button>
							</div>
							<!-- Modal -->
							<div class="modal fade" id="myModa2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalLabel"><?php echo isset($shop_name)?$shop_name:'添加商家';?></h4>
										</div>
										<div class="modal-body">
											<form class="">
												<div class="form-group">
													<label class="sr-only" >菜品名称</label>
													<input type="email" class="form-control" id="" placeholder="名称">
												</div>
												<div class="form-group">
													<label class="sr-only" >排序</label>
													<input type="email" class="form-control" id="" placeholder="菜单中的显示排序">
												</div>
												<div class="form-group">
													<select name="cat_id" class="form-control">
														<option value="0">请选择分类</option>
														<option value="1" >蔬菜水果</option>
													</select>
												</div>
												<div class="form-group">
													<label class="sr-only" >原价</label>
													<input type="email" class="form-control" id="" placeholder="原价">
												</div>
												<div class="form-group">
													<label class="sr-only" >拿货价</label>
													<input type="email" class="form-control" id="" placeholder="拿货价">
												</div>
											</form>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-primary">保存</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
										</div>
									</div>
								</div>
							</div>
							<!-- endModal -->
                            <table class="table table-condensed table-hover table-bordered" style="font-size:12px;" >
								<thead>
									<tr bgcolor="#FBFCE2">
										<td width="15%" height="24" align="center">名称</td>
										<td width="15%" height="24" align="center">原价</td>
										<td width="15%" height="24" align="center">拿货价</td>
										<td width="10%" height="24" align="center">分类</td>
										<td width="10%" align="center">商家</td>
										<td width="5%" align="center">排序</td>
										<td width="10%" align="center">管理项</td> 
									</tr>
								</thead>
								<tbody id="goodsList">
									<?php foreach($food_list as $k=>$v):?>
										<tr bgcolor="#FFFFFF" align="center" class="hover">
											<td width="15%" height="24" align="center"><?php echo $v['name'];?></td>
											<td width="15%" height="24" align="center"><?php echo $v['get_price'];?></td>
											<td width="15%" height="24" align="center"><?php echo $v['price'];?></td>
											<td width="10%" height="24" align="center"><?php echo $type_name[$v['food_type']];?></td>
											<td width="10%" align="center"><?php echo $shop_name;?></td>
											<td width="5%" align="center"><?php echo $v['sort'];?></td>
											<td width="10%" align="center">
												<button id="type_edit" class="btn btn-default btn-sm" type="button">编辑</button>
											</td>
										</tr>
									<?php endforeach;?>
									<tr id="foot_page" ><input type='hidden' value="" name='shop_id'/></tr>
								</tbody>
							</table>
                        </div>
                        <div class="panel-body pt30" style="display:none;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
</div>
<script type="text/javascript">
$(function(){
    $('#addTypeBtn').click(function(){
		alert('123');
		var html_str = '<tr bgcolor="#FFFFFF" align="center" class="hover"><td width="10%" height="24" align="center">156</td><td width="20%" height="24" align="center">主食</td><td width="30%" align="center">海福康海参</td><td width="15%" align="center"><button id="type_edit" class="btn btn-default btn-sm" type="button">编辑</button></td></tr>';
		//var html_str = '<tr bgcolor="#FFFFFF" align="center" class="hover"><td width="15%" height="24" align="center"><input type="text" id="title" name="fname[]" size="16" /></td><td width="15%" height="24" align="center"><input type="text" id="title" name="yuanjia[]" size="16"  /></td><td width="15%" height="24" align="center"><input type="text" id="title" name="nahuojia[]" size="16" /></td><td width="10%" align="center"><select name="type[]" style="width:310px" onchange="selectInput(this)"><option value="156">主食</option><option value="157">招牌主菜</option><option value="158">凉菜</option><option value="159">特色菜</option></select></td><td width="5%" align="center"><input name="sort[]" type="text" id="title" size="16" /></td><td width="20%" align="center"><a href="#"><u>编辑</u></a></td></tr>';
		$("#foot_page").before(html_str);
	});
	
    $('.nav-tabs').find('li').click(function(){
        var index = $(this).index();
        $(this).addClass('active').siblings().removeClass('active');
        $('.panel-body').siblings('.panel-body').hide().eq(index).show();
    });
    $("#changeGoodsUnit,#changeShopUnit").next().find('a').click(function(){
        $(this).parents('ul').prev().html($(this).html()+'<span class="caret"></span>').attr('');
        if( $(this).parents('ul').prev().attr('id') == 'changeGoodsUnit') {
            if($("input[name=is_associate]:checked").val() == 1){
               $("input[name=is_associate]:checked").click();
            } 
        }
    });
    $("input[name=goods_number]").blur(function(){
       var goods_number = parseInt($(this).val());
       if( !isNaN(goods_number) ){
         var goods_price  = $("input[name=goods_price]").val();
         var shop_price  = goods_number*goods_price;
    
         $('input[name=shop_price]').val( shop_price.toFixed(2) );
       }
    });
    $("input[name=is_associate]").click(function(){
       var attr_id = parseInt($(this).val());
       switch(attr_id){
           case 0:
             $(this).parents('.form-group').next().hide();
             break;
           case 1:
             $(this).parents('.form-group').next().show();
             break;
       }
       $(this).parents('.form-group').next().find('.input-group-addon').html($("#changeGoodsUnit").text().split('/')[1]);
    });
   $("#callBackGoodsBtn").click(function(){
      window.location = '/system/goods/goodsList';
   });
})
</script>
<div id="confirmModal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">91批购系统温馨提示</h4>
      </div>
      <div class="modal-body"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-danger btn-sm" id="confirmBtn">确认</button>
      </div>
    </div>
  </div>
</div>
<div id="alertModal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">91批购系统温馨提示</h4>
      </div>
      <div class="modal-body"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">确认</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
function successMsg(msg)
{
    $('.alert-warning').find('p').html(msg);
    $('.alert-warning').removeClass('ng-hide');
    var timer = null;
    var now = 2;

    timer = setInterval(function(){
       if(now==0) {
          $('.alert-warning').addClass('ng-hide'); 
          clearInterval(timer);
       } 
       
       now--;
    },1000);
}
function errorMsg(obj,msg)
{
    obj.parents('.form-group').addClass('has-error').addClass('has-feedback');
    if(obj.parent().find('span').length == 0 ) {
       obj.after('<span class="glyphicon glyphicon-remove form-control-feedback"></span>');
    } else {
       obj.parent().find('span').eq(0).removeClass('glyphicon-ok').addClass('glyphicon-remove');
    }

    if(obj.parent().next().length == 0) {
       obj.parent().after('<div class="help-block has-error error-msg">'+msg+'</div>');
    } else {
       obj.parent().next().html(msg); 
    }
}
function rightMsg(obj) {
    obj.parents('.form-group').removeClass('has-error').removeClass('has-feedback').addClass('has-success').addClass('has-feedback');
    
    if(obj.parent().find('span').length == 0 ) {
       obj.after('<span class="glyphicon glyphicon-ok form-control-feedback"></span>');
    } else {
       obj.parent().find('span').eq(0).removeClass('glyphicon-remove').addClass('glyphicon-ok');
    }
    obj.parent().next().remove();
}
function alertModel(msg){
    $('#alertModal').modal({keyboard: false});
    $('#alertModal').find('.modal-body').html(msg);
}
</script>
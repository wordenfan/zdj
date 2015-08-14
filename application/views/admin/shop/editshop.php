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
                                        <select name="shop_tyep" class="form-control">
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
						<div class="panel-body" style="display:none;">
                            <div class="form-group">
                                <div class="col-md-6" style="width:100%">
									<!-- Modal_button -->
									<div class="col-md-12" style="padding-left:0px;padding-bottom:10px">
										<button type="button" class="btn btn-default ladda-button pull-right" data-toggle="modal" data-target="#myModal_type" >添加品类</button>
									</div>
									<!-- Modal -->
									<div class="modal fade" id="myModal_type" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									  <div class="modal-dialog" role="document">
										<div class="modal-content">
										  <div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalLabel"><?php echo isset($shop_name)?$shop_name:'添加商家';?></h4>
										  </div>
										  <div class="modal-body">
											<div class="form-group">
												<label for="exampleInputPassword1">商店名称</label>
												<input type="text" class="form-control" id="shop_name_id" value="<?php echo isset($shop_name)?$shop_name:'当前无商家';?>" disabled/>
											</div>
											<div class="form-group">
												<label for="exampleInputPassword1">类别名称</label>
												<input type="text" class="form-control" id="type_name_id" placeholder="请输入类别名称"/>
											</div>
										  </div>
										  <div class="modal-footer">
											<button type="button" id="add_type" class="btn btn-primary">保存</button>
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
										<tr bgcolor="#FFFFFF" align="center" class="hover type_del_flag">
											<td width="10%" height="24" align="center"><?php echo $v['id'];?></td>
											<td width="20%" height="24" align="center"><?php echo $v['type_name'];?></td>
											<td width="30%" align="center"><?php echo $shop_name;?></td>
											<td width="15%" align="center">
												<button id="type_edit" class="btn btn-default btn-sm" type="button">编辑</button>
											</td>
										</tr>
									<?php endforeach;?>
									<tr id="type_foot_page" ></tr>
									</tbody>
									</table>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body" style="display:none;">
							<!-- Modal_button -->
							<div class="col-md-12" style="padding-left:0px;padding-bottom:10px">
								<button type="button" class="btn btn-default ladda-button pull-right" data-toggle="modal" data-target="#myModal_food" >添加菜品</button>
							</div>
							<!-- Modal -->
							<div class="modal fade" id="myModal_food" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalLabel"><?php echo isset($shop_name)?$shop_name:'添加商家';?></h4>
										</div>
										<div class="modal-body">
											<div class="form-group">
												<label for="exampleInputPassword1">商店名称</label>
												<input type="text" class="form-control" id="shop_name_id" value="<?php echo isset($shop_name)?$shop_name:'当前无商家';?>" disabled/>
											</div>
											<div class="form-group">
												<label class="sr-only" >菜品名称</label>
												<input type="email" class="form-control" id="food_name" placeholder="名称">
											</div>
											<div class="form-group">
												<label class="sr-only" >排序</label>
												<input type="email" class="form-control" id="food_sort" placeholder="菜单中的显示排序">
											</div>
											<div class="form-group" id="food_list_food_type">
												<select name="food_cat_id" class="form-control" id="food_type">
													<option value="0">请选择类别</option>
													<?php foreach($food_type as $k=>$v):?>
													<option value="<?php echo $v['id'];?>" ><?php echo $v['type_name'];?></option>
													<?php endforeach;?>
												</select>
											</div>
											<div class="form-group">
												<label class="sr-only" >原价</label>
												<input type="email" class="form-control" id="food_price" placeholder="原价">
											</div>
											<div class="form-group">
												<label class="sr-only" >拿货价</label>
												<input type="email" class="form-control" id="food_getprice" placeholder="拿货价">
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" id="add_food" class="btn btn-primary">保存</button>
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
										<tr bgcolor="#FFFFFF" align="center" class="hover food_del_flag">
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
									<tr id="food_foot_page" ></tr>
								</tbody>
							</table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
</div>
<script type="text/javascript">
$(function(){
	//添加菜品,ajax局部刷新
    $('#add_food').click(function(){
		$('#myModal_food').modal('hide');
		var food_shop_id = "<?php echo $shop_id;?>";
		var shop_name = $('#shop_name_id').val();
		var food_name = $('#food_name').val();
		var food_sort = $('#food_sort').val();
		var food_cat_id = $('#food_cat_id').val();
		var food_price = $('#food_price').val();
		var food_getprice = $('#food_getprice').val();
		if(!food_shop_id){
			alert('当前商家无效');
			return;
		}else if(!food_cat_id){
			alert('请选择类别');
			return;
		}
		$.post('/admin/shop/add_food',{shop_id:food_shop_id,food_name:food_name,food_sort:food_sort,type_id:food_cat_id,food_price:food_price,food_getprice:food_getprice},function(tjson){
			var food_type_html = '';
			for(var w in tjson)
			{
				food_type_html+='<tr bgcolor="#FFFFFF" align="center" class="hover food_del_flag"><td width="15%" height="24" align="center">'+tjson[w].name+'</td><td width="15%" height="24" align="center">'+tjson[w].get_price+'</td><td width="15%" height="24" align="center">'+tjson[w].price+'</td><td width="10%" height="24" align="center">'+tjson[w].food_type+'</td><td width="10%" align="center">'+shop_name+'</td><td width="5%" align="center">'+tjson[w].sort+'</td><td width="10%" align="center"><button id="type_edit" class="btn btn-default btn-sm" type="button">编辑</button></td></tr>';
			}
			//更新(菜单tab)的菜单列表
			$('.food_del_flag').remove();
			$('#food_foot_page').before(food_type_html);
		},'json');
	})	
	//添加分类,ajax局部刷新
    $('#add_type').click(function(){
		$('#myModal_type').modal('hide');
		var type_name = $('#type_name_id').val();
		var shop_name = $('#shop_name_id').val();
		var shop_id = "<?php echo $shop_id;?>";
		if(shop_name == '当前无商家'){
			alert('当前没有选中的商家!');
			return;
		}
		$.post('/admin/shop/add_food_type',{shop_id:shop_id,type_name:type_name},function(json){
			var food_type_html = '';
			var food_list_type_html = '<select name="food_cat_id" class="form-control" id="food_type"><option value="0">请选择分类</option>';
			for(var w in json)
			{
				food_type_html+='<tr bgcolor="#FFFFFF" align="center" class="hover type_del_flag"><td width="10%" height="24" align="center">'+json[w].id+'</td><td width="20%" height="24" align="center">'+json[w].type_name+'</td><td width="30%" align="center">'+shop_name+'</td><td width="15%" align="center"><button id="type_edit" class="btn btn-default btn-sm" type="button">编辑</button></td></tr>';
				food_list_type_html+='<option value="'+json[w].id+'">'+json[w].type_name+'</option>';
			}
			food_list_type_html+='</select>';
			//更新(类型tab)的类型列表
			$('.type_del_flag').remove();
			$('#type_foot_page').before(food_type_html);
			//更新(菜单tab)的类型选择
			$('#food_type').remove();
			$('#food_list_food_type').html(food_list_type_html);
			
		},'json');
	});
	//tab切换
    $('.nav-tabs').find('li').click(function(){
        var index = $(this).index();
        $(this).addClass('active').siblings().removeClass('active');
        $('.panel-body').siblings('.panel-body').hide().eq(index).show();
    });
})
</script>
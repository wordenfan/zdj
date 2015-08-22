<html>
<head>
<meta charset="utf-8">
<title>商品列表_商品管理_91批购系统管理</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width">
<style type="text/css">
@charset "UTF-8";[ng\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide{display:none !important;}ng\:form{display:block;}.ng-animate-block-transitions{transition:0s all!important;-webkit-transition:0s all!important;}.ng-hide-add-active,.ng-hide-remove{display:block!important;}</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/css/bootstrap.min.css')?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/css/ad_base.css')?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/css/ad_module.css')?>" />
<script type="text/javascript" src="<?php echo base_url('static/js/jquery-1.11.0.min.js')?>"/></script>
<style>
#fan_ul li input,#fan_ul li select{display:inline-block}
</style>
<div id="main">
      <div id="crumbs" ng-component="common/crumb/crumb" class="ng-scope">
        <ol class="breadcrumb ng-scope" ng-controller="crumbCtrl">
            <li class="bcfirst"><i class="glyphicon glyphicon-map-marker"></i> 当前位置：</li>
            <li ng-repeat="crumb in crumbs" ng-class="{active: $last}" class="ng-scope"><span ng-if="$first" class="active ng-binding ng-scope">订单管理</span>
            </li><li ng-repeat="crumb in crumbs" ng-class="{active: $last}" class="ng-scope active"><span ng-if="$last" class="ng-binding ng-scope">订单列表</span>
            </li>
        </ol>
      </div>
      <div class="ng-scope">
            <div class="list">
                <div class="check well">
                    <div class="clearfix"> 
						<div class="container">
								<div class="row">
									<div class="col-md-1" style="text-align:right;height:32px;line-height:32px">
									财报搜索
									</div>
									<div class="col-md-2" style="padding-left:0px">
										<select class="form-control w150" name="cat_id" >
                                            <option value="0">按日查询</option>
                                            <option value="1" >按月查询</option>
										</select>
									</div>
									<div class="col-md-3" style="padding-left:0px">
										<input type="text" name="keyword" class="form-control w250" placeholder="日期/月份">
									</div>
									<div class="col-md-4" style="">
										<button type="button" class="btn btn-info ladda-button" id="searchBtn" >
										<i class="glyphicon glyphicon-search mr5"></i>搜索
										</button>
									</div>
									<div class="col-md-1" style="padding-left:0px">
										<button type="button" class="btn btn-success ladda-button text-right" id="searchBtn" >增加一条</button>
									</div>
								</div>
						</div>            
                    </div> 
                </div> 
                  <div class="panel panel-default">
                    <div class="panel-body pt30">
						<div>
						<ul id="fan_ul">
							<?php foreach($order_list as $n=>$m):?>
							<li style="display:inline-block">
									<label for="InputName2"><?php echo $n+1;?>：</label>
									<select name="shop_name[]" id="slist"  class="form-control" style="width:125px;">
										<option value="0">=请选择=</option>
										<?php foreach($shop_list as $k=>$v):?>
										<?php if($m['oshop_id'] == $v['id']):?>
											<option value="<?php echo $v['id'];?>" selected="selected" ><?php echo $v['name'];?></option>
										<?php else:?>
											<option value="<?php echo $v['id'];?>"><?php echo $v['name'];?></option>
										<?php endif;?>
										
										<?php endforeach;?>
									</select>
									<input type="text" placeholder="支付" value="<?php echo $m['opay'];?>" style="" name="zf[]" class="form-control w60">
									<input type="text" placeholder="收取"  value="<?php echo $m['osum'];?>" style="" name="sq[]" class="form-control w60">
									<input type="text" placeholder="配送费" value="" style="" name="psf[]" class="form-control w70">
									<input type="text" placeholder="电话"  value="<?php echo $m['otel'];?>" style="" name="dianhua[]" class="form-control w100">
									<input type="text" placeholder="地址"  value="<?php echo $m['oaddress'];?>" style="width:120px;" name="dizhi[]" class="form-control w100">
									<input type="text" placeholder="员工"  value="" style="width:60px;" name="psy[]" class="form-control">
									<input type="text" placeholder="备注"  value="" style="width:360px;" name="beizhu[]" class="form-control">
							</li>		
							<?php endforeach;?>							
						</ul>
						</div>
						</br>
						<div style="border-top:1px solid #ccc;border-bottom:1px solid #ccc;padding:25px 0px">
							<form class="form-inline" role="form">
								<div class="col-md-3">
									<label class="form-label">德鑫全</label>
									<input type="text" class="form-control" style="width:150;" id="dyue" placeholder="德鑫全">
								</div>
								<div class="col-md-3">
									<label class="form-label">舅老爷</label>
									<input type="text" class="form-control" style="width:150;" id="jyue" placeholder="德鑫全">
								</div>
								<div class="col-md-3">
									<label class="form-label">麻辣烫</label>
									<input type="text" class="form-control" style="width:150;" id="myue" placeholder="麻辣烫">
								</div>
								<div class="col-md-3">
									<label class="form-label">小时咖喱</label>
									<input type="text" class="form-control" style="width:150;" id="gyue" placeholder="小时咖喱">
								</div>
								</br></br>
								<div class="col-md-3">
									<label class="form-label">上交额</label>
									<input type="text" class="form-control" style="width:150;" id="shangjiao" placeholder="上交额">
								</div>
								<div class="col-md-3">
									<label class="form-label">&nbsp;日&nbsp期&nbsp;</label>
									<input type="text" class="form-control" style="width:150;" id="date" placeholder="日期">
								</div>
								<div class="col-md-3">
									<label class="form-label">网上支付</label>
									<input type="text" class="form-control" style="width:150;" id="alipay" placeholder="网上支付金额">
								</div>
								<div class="col-md-3">
									<label class="form-label">上报人</label>
									<input type="text" class="form-control" style="width:150;" id="clerk">
								</div>
								</br></br></br>
								<div class="col-md-12">
									<label class="form-label">&nbsp;备&nbsp;注&nbsp;</label>
									<input type="text" class="form-control" style="width:90%;" id="exampleInputEmail2"  placeholder="备注">
								</div>
								</br></br></br>
								<div><label class="">总计上交：<font color="red">100</font>元；舅姥爷:<font color="red">200</font>元；德鑫全:<font color="red">123</font>元；小时咖喱:<font color="red">123</font>元；麻辣烫:<font color="red">123</font>元</label></div>
							</form>
						</div>
						</br>
						<div>
							<div class="form-group">
								<div class="col-md-offset-2 col-md-6">
									<input type="hidden" value="0" name="goods_id">
									<button id="addGoodsBtn" class="btn btn-primary ladda-button" onclick='check_submit()' type="button">
										保存修改
									</button>
								</div>
							</div>
						</div>
                  </div> 
                </div>
                <nav>
                  <ul class="pagination pagination-sg" style="float: right;"></ul>
                </nav>
            </div>
        </div>
</div>
<script type="text/javascript">
function check_submit()    
{    
        if($("#shangjiao").val().length<1)
        {
                alert('请填写上交金额');
                return false;  
        }
        else if($("#dyue").val().length<1)
        {
                alert('请填写德鑫全余额');
                return false;  
        }
        else if($("#jyue").val().length<1)
        {
                alert('请填写舅姥爷余额');
                return false;  
        }
		else if($("#myue").val().length<1)
        {
                alert('请填写麻辣烫余额');
                return false;  
        }
        else if($("#gyue").val().length<1)
        {
                alert('请填写咖喱余额');
                return false;  
        }
        else if($("#date").val().length<1)
        {
                alert('请填写日期');
                return false;  
        }
        else if($("#alipay").val().length<1)
        {
                alert('请填写网上支付金额');
                return false;   
        }else if($("#clerk").val().length<1)
        {
                alert('请填写上交人');
                return false;   
        }else{
                $("#sub_bt").addClass("pure-button-disabled");
                return true;
        }
}    
</script>
</body>
</html>
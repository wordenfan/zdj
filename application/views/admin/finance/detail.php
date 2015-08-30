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

<style class="ng-scope">
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
                <div class="table_wrap">
                  <div class="panel panel-default">
                    <div class="panel-body pt30">
                      <table class="table table-condensed table-hover table-bordered" style="font-size:12px;" >
                        <thead>
						<tr bgcolor="#FBFCE2">
							<th height="24" width="20px">ID</th>
							<th height="24" width="100px">商家</th>
							<th height="24" width="80px">支付</th>
							<th height="24" width="80px">收取</th>
							<th height="24" width="80px">配送费</th>
							<th height="24" width="100px">电话</th>
							<th height="24" width="250px">地址</th>
							<th height="24" width="80px">配送员</th>
							<th height="24" width="360px">备注</th>
						</tr>
                        </thead>
                        <tbody id="dayDetail">
						<?php foreach($flist as $k=>$v):?>
						<tr>
							<td><?php echo $v['lid']+1;?></td>
							<td><?php echo $v['shop'];?></td>
							<td><?php echo $v['pay'];?></td>
							<td><?php echo $v['receive'];?></td>
							<td><?php echo $v['distribution_fee'];?></td>
							<td><?php echo $v['tel'];?></td>
							<td><?php echo $v['address'];?></td>
							<td><?php echo $v['distribution_staff'];?></td>
							<td><?php echo $v['mark'];?></td>
						</tr>
						<?php endforeach;?>
						</tbody>
                      </table>
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
$(function(){
})
</script>
</body>
</html>
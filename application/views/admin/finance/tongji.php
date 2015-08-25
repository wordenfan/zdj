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
                <div class="check well">
                    <div class="clearfix"> 
								<div class="container">
								<div class="row">
									<div class="col-md-1" style="text-align:right;height:32px;line-height:32px">
									订单搜索
									</div>
									<div class="col-md-2" style="padding-left:0px">
										<select class="form-control w150" name="cat_id" >
                                            <option value="0">电话号码</option>
                                            <option value="1" >用户名</option>
										</select>
									</div>
									<div class="col-md-3" style="padding-left:0px">
										<input type="text" name="keyword" class="form-control w250" placeholder="电话号码/用户名">
									</div>
									<div class="col-md-4" style="">
										<button type="button" class="btn btn-info ladda-button" id="searchBtn" >
										<i class="glyphicon glyphicon-search mr5"></i>搜索
										</button>
									</div>
									<div class="col-md-1" style="padding-left:0px">
										<button type="button" class="btn btn-success ladda-button text-right" id="searchBtn" >添加订单</button>
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
							<td width="7%" height="24" align="center">日期</td>
							<td width="3%" height="24" align="center">单量</td>
							<td width="5%" height="24" align="left">流水</td>
							<td width="5%" height="24" align="center">净利</td>
							<td width="5%" height="24" align="center">上交额</td>
							<td width="5%" height="24" align="center">支付宝</td>
							<td width="5%" height="24" align="center">舅老爷</td>
							<td width="5%" height="24" align="center">德鑫全</td>
							<td width="5%" height="24" align="center">小时咖喱</td>
							<td width="5%" height="24" align="center">麻辣烫</td>
							<td width="20%" height="24" align="center">备注</td>
							<td width="5%" height="24" align="center">上报人</td>
							<td width="5%" height="24" align="center">操作</td>
						</tr>
                        </thead>
                        <tbody id="goodsList">
						<?php foreach($list as $k=>$v):?>
						<tr bgcolor="#FFFFFF" align="center" class="hover">
							<td align="left"><?php echo $v['date'];?></td>
							<td align="center"><?php echo $v['order_num'];?></td>
							<td align="left"><?php echo $v['daybook'];?></td>
							<td align="left"><?php echo $v['profit'];?></td>
							<td align="left"><?php echo $v['hand_in'];?></td>
							<td align="left"><?php echo $v['alipay'];?></td>
							<td align="left"><?php echo $v['j_yue'];?></td>
							<td align="left"><?php echo $v['d_yue'];?></td>
							<td align="left"><?php echo $v['x_yue'];?></td>
							<td align="left"><?php echo $v['m_yue'];?></td>
							<td align="left"><?php echo $v['remark'];?></td>
							<td align="center"><?php echo $v['clerk'];?></td>
							<td align="center"><a class='btn' href="<?php echo base_url('/admin/finance/detail/hid/'.$v['id']);?>">查看</a></td>
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
</body>
</html>
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
                            <a type="button" href="/admin/shop/addshop" class="btn btn-primary ladda-button pull-right" id="addShopBtn" >添加商家</a>
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
                        <td width="4%" height="24" align="center">ID</td>
                        <td width="8%" height="24" align="center">名称</td>
                        <td width="8%" align="center">订餐电话</td>
                        <td width="6%" height="24" align="center">类别</td>
                        <td width="6%" align="center">区域</td>
                        <td width="4%" align="center">起送价</td>
                        <td width="4%" align="center">配送费</td>
                        <td width="6%" align="center">加盟时间</td>
                        <td width="6%" align="center">总订单量</td>
                        <td width="6%" align="center">总销量额</td>
                        <td width="4%" align="center">状态</td>
                        <td width="15%" align="center">管理项</td> 
                    </tr>
                    </thead>
                    <tbody id="goodsList">
                    <?php foreach($info_tmp as $k=>$v):?>
                        <tr bgcolor="#FFFFFF" align="center" class="hover">
                            <td width="4%" height="24" align="center"><?php echo $v['id'];?></td>
                            <td width="8%" height="24" align="center"><?php echo $v['name'];?></td>
                            <td width="8%" align="center"><?php echo $v['telephone'];?></td>
                            <td width="6%" height="24" align="center"><?php echo $v['type'];?></td>
                            <td width="6%" align="center"><?php echo $v['area_id'];?></td>
                            <td width="4%" align="center"><?php echo $v['start_price'];?></td>
                            <td width="4%" align="center"><?php echo $v['send_price'];?></td>
                            <td width="6%" align="center"><?php echo $v['publish'];?></td>
                            <td width="6%" align="center"><?php echo $v['order_num'];?></td>
                            <td width="6%" align="center"><?php echo $v['order_profit'];?></td>
                            <td width="4%" align="center" id="status_a">
                            <?php if($v['status'] == 1):?><font color="green">正常</font>
                            <?php elseif($v['status'] == 2):?><font color="red">休息</font>
							<?php else :?><font color="gray">关闭</font>
                            <?php endif;?>
                            <td width="15%" align="center">
                                <a id="editBtn" class="btn btn-default btn-sm" type="button" href="<?php echo base_url('admin/shop/editshop/id').'/'.$v['id'];?>"/>编辑</a>
                                <a id="restBtn" onclick="do_rest_ajax('<?php echo $v['id'];?>')" class="btn btn-danger btn-sm" type="button"/>休息</a>
                                <a id="openBtn" onclick="do_open_ajax('<?php echo $v['id'];?>')" class="btn btn-success btn-sm" type="button"/>营业</a>
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
function do_open_ajax(par){
	$.post('/admin/shop/doajax',{shop_id:par,to_status:1},function($data){
		location.replace(location.href);
	})
}
function do_rest_ajax(par){
	$.post('/admin/shop/doajax',{shop_id:par,to_status:2},function($data){
		location.replace(location.href);
	})
}
</script>
</body>
</html>

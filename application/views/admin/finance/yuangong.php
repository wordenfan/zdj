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
                                            <option value="0">月份</option>
                                            <option value="1" >一月</option>
										</select>
									</div>
									<div class="col-md-2" style="padding-left:0px">
										<select class="form-control w150" name="cat_id" >
                                            <option value="0">员工</option>
                                            <option value="1" >陈超云</option>
										</select>
									</div>
									<div class="col-md-4" style="">
										<button type="button" class="btn btn-info ladda-button" id="searchBtn" >
										<i class="glyphicon glyphicon-search mr5"></i>搜索
										</button>
									</div>
									<div class="col-md-3" style="text-align:right;height:32px;line-height:32px">
										<em>本月配送单量共计：<font color="red">123</font>单</em>
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
							<td width="10%" height="24" align="center">日期</td>
							<td width="10%" height="24" align="center">商家</td>
							<td width="55" height="24" align="left">地址</td>
							<td width="20%" height="24" align="center">备注</td>
							<td width="5%" height="24" align="center">操作</td>
						</tr>
                        </thead>
                        <tbody id="goodsList">
						<tr bgcolor="#FFFFFF" align="center" class="hover">
							<td align="left">2015-08-31</td>
							<td align="center">沙县小吃</td>
							<td align="left">青岛开发区第一人民医院门诊二楼口腔技工室</td>
							<td align="left">暂无备注</td>
							<td align="left"><a class='btn'>查看</a></td>
						</tr>
						<tr bgcolor="#FFFFFF" align="center" class="hover">
							<td align="left">2015-08-31</td>
							<td align="center">沙县小吃</td>
							<td align="left">青岛开发区第一人民医院门诊二楼口腔技工室</td>
							<td align="left">暂无备注</td>
							<td align="left"><a class='btn'>查看</a></td>
						</tr>
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
    showGoodsList(1);

    $("#searchBtn").click(function(){
       showGoodsList(1);
    })
    function showGoodsList(pg){
        var cat_id = parseInt($("select[name='cat_id']").val());
        var keyword = $.trim($("input[name='keyword']").val());
        var json = {pg:pg};
        
        if(!isNaN(cat_id) && cat_id != 0 ) {
           json['cat_id'] = cat_id;
        }

        if( keyword != '' ) {
           json['keyword'] = keyword;
        }

        $.ajax({
            type:'POST',
            url:'/system/goods/getGoodsList',
            dataType:'json',
            data:json,
            success:function(ret){
                if( ret.apiStatus ) {
                   var data = ret.data;
                   var html = '';
                   $('#goodsList').html(html);
                   if( data['goodsList'].length > 0 ) {
                       var goods = data.goodsList;

                       for(var i in goods) {
                         html += '<tr>' +
                                  '<td>'+goods[i]['goods_id']+'</td>'+
                                  '<td>'+goods[i]['goods_name']+'</td>'+
                                  '<td><span class="text-danger">￥'+goods[i]['goods_price']+'</span>元/'+goods[i]['goods_unit']+'</td>'+
                                  '<td><span class="text-danger">￥'+goods[i]['shop_price']+'</span>元/'+goods[i]['shop_unit']+'(重'+goods[i]['goods_number']+goods[i]['goods_unit']+')</td>'+                                  '<td>'+goods[i]['add_time']+'</td>'+
                                  '<td class="last">'+
                                        '<a href="/system/goods/edit?goods_id='+goods[i]['goods_id']+'" class="btn btn-info btn-sm ng-scope">编辑</a>'+
                                        '<a href="javascript:void(0)" class="btn btn-danger btn-sm ng-scope">删除</a>'+
                                  '</td>'+
                                  '</tr>';
                       }
                       $('.pagination').html(data.pageInfo);
                       $('.pagination>li:gt(0)').find('a').each(function() {
                            $(this).click(function(){
                                if(!$(this).parent('li').hasClass('disabled')) { 
                                  var pg = $.trim($(this).attr('pg'));
                                  showGoodsList(pg);
                                }
                            });
                        });
                   } else {
                       html += '<tr ng-repeat="list in vm.lists" class="ng-scope">' +
                                  '<td colspan="5" align="center" class="ng-binding">当前没有您要查询的记录！</td>'+
                                '</tr>';
                   }
                   $('#goodsList').html(html);
                }
            }
        })
    }
})
</script>
<script>
	

</script>
</body>
</html>
<html>
<head>
<meta charset="utf-8">
<title>商品列表_商品管理_91批购系统管理</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/css/bootstrap.min.css');?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/css/ad_base.css');?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/css/ad_module.css');?>" />

<style class="ng-scope"></style>
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
								<select class="form-control w150" id="search_type" name="search_type" >
									<option value="0">电话号码</option>
									<option value="1" >用户名</option>
								</select>
							</div>
							<div class="col-md-3" style="padding-left:0px">
								<input type="text" name="keyword" class="form-control w250" placeholder="电话号码/用户名" id="searchInput">
							</div>
							<div class="col-md-5" style="">
								<button type="button" class="btn btn-info ladda-button" id="searchBtn" >
								<i class="glyphicon glyphicon-search mr5"></i>搜索
								</button>
							</div>
							<div class="col-md-1" style="padding-left:0px">
								<button type="button" class="btn btn-success ladda-button pull-right" id="addOrderBtn" >添加订单</button>
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
							<td width="8%" height="24" align="center">下单时间</td>
							<td width="8%" height="24" align="left">订单商家</td>
							<td width="10%" height="24" align="center">商家电话</td>
							<td width="6%" height="24" align="center">订餐用户</td>
							<td width="20%" height="24" align="center">订餐地址</td>
							<td width="10%" height="24" align="center">订餐电话</td>
							<td width="7%" height="24" align="center">实价--支出</td>
							<td width="4%" height="24" align="center">收取</td>
							<td width="5%" height="24" align="center">类型</td>
							<td width="5%" height="24" align="center">支付</td>
							<td width="4%" align="center">状态</td>
							<td width="9%" align="center">管理项</td>
						</tr>
                        </thead>
                        <tbody id="goodsList">
						<?php foreach($order_list as $k=>$v):?>
						<tr bgcolor="#FFFFFF" align="center" class="hover">
							<td align="center" class="order_id"><a href="<?php echo base_url('home/order/orderInfo/oid/'.$v['oid']);?>" style="color:#ff0000;text-decoration:underline;" target="_blank"><?php echo $v['snid'];?></a></td>
							<td align="center"><?php echo date('m-d H:i',$v['opublish']);?></td>
							<td align="left"><?php echo $v['oshop_name'];?></td>
							<td align="left"><?php echo $v['oshop_tel'];?></td>
							<td align="left"><?php echo $v['oname'];?></td>
							<td align="left"><?php echo $v['oaddress'];?></td>
							<td align="left"><?php echo $v['otel'];?></td>
							<td align="center"><?php echo $v['osum_real'].' - '.$v['opay'];?></td>
							<td align="center" id="money"><?php echo $v['osum'];?></td>
							<td align="center">
								<?php if($v['user_status'] == 1):?>
									<font color="red">新用户</font>
								<?php else:?>
									<font color="green">老用户</font>
								<?php endif;?>
							</td>
							<td align="center">
								<?php if($v['pay_status'] == 0):?>
									<font color="grey">到付</font>
								<?php elseif($v['pay_status'] == 1):?>
									<font color="green">已网付</font>
								<?php elseif($v['pay_status'] == 2):?>
									<font color="red">未网付</font>
								<?php endif;?>
							</td>
							<td align="center" id="status_a">
								<?php if($v['order_status'] == 1):?>
									<font color="green">成功</font>
								<?php elseif($v['order_status'] == 2):?>
									<font color="red">取消</font>
								<?php else:?>
									<font color="gray">未受理</font>
								<?php endif;?>
							</td>
							<td align="right">
								<?php if($v['order_status'] == 0):?>
									<a href="/admin/order/operate/oid/<?php echo $v['oid'];?>/stu/1"><u>接单</u></a>
									<a href="/admin/order/operate/oid/<?php echo $v['oid'];?>/stu/2"><u>取消</u></a>
									<a href="/admin/order/operate/oid/<?php echo $v['oid'];?>/stu/2"><u>撤销</u></a>
								<?php else:?>
									<a href="/admin/order/operate/oid/<?php echo $v['oid'];?>/stu/2"><u>撤销</u></a>
								<?php endif;?>
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
$(function(){
    $("#addOrderBtn").click(function(){
		
	})
    $("#searchBtn").click(function(){
		$type = $.trim($('#search_type').val());
		$type_str = String($type) == '0'?'otel':'oname';
		$keyword = String($.trim($('#searchInput').val()));
		if($keyword==''){
			alert('搜索内容为空将显示全部内容！')
		}
        $url = "<?php echo base_url('admin/order/olist/type');?>";
        window.location.href = $url +'/'+$type_str+'/condition/'+encodeURIComponent($keyword)+'';
    })
})
</script>
</body>
</html>
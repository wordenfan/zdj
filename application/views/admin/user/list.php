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

<script Language="JavaScript" src="<?php echo base_url('static/js/jquery-1.11.0.min.js');?>"></script>
<script Language="JavaScript" src="<?php echo base_url('static/js/bootstrap.min.js');?>"></script>
<script Language="JavaScript" src="<?php echo base_url('static/js/jquery.uploadify.min.js');?>"></script>
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
                                <option value="0">用户名称</option>
                                <option value="1" >用户id</option>
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
                            <button type="button" class="btn btn-primary ladda-button pull-right" >添加用户</button>
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
						<td width="4%" height="24" align="center">id</td>
						<td width="6%" align="center">昵称</td>
						<td width="6%" align="center">注册时间</td>
						<td width="6%" align="center">上次登录</td>
						<td width="6%" align="center">电话</td>
						<td width="20%" align="center">配送地址</td>
						<td width="15%" align="center">标记地址</td>
						<td width="15%" align="center">其他标记</td>
						<td width="4%" align="center">状态</td>
						<td width="18%" align="center">管理项</td>
					</tr>
                    </thead>
                    <tbody id="goodsList">
                    <?php foreach($info_tmp as $k=>$v):?>
                        <tr bgcolor="#FFFFFF" align="center" class="hover">
							<td width="4%"><?php echo $v['uid'];?></td>
							<td width="6%"><?php echo $v['uname'];?></td>
							<td width="6%" ><?php echo date('Y-m-d',$v['reg_time']);?></td>
							<td width="6%" ><?php echo date('Y-m-d',$v['last_login_time']);?></td>
							<td width="6%" align="left"><?php echo $v['tel'];?></td>
							<td width="20%"align="left"><?php echo $v['address'];?></td>
							<td width="15%"><?php echo $v['mark_address'];?></td>
							<td width="15%"><?php echo $v['mark_info'];?></td>
							<td width="4%" ><?php echo $d = $v['status']==1?'正常':'禁止';?></td>
							<td>
                                <button type="button" class="btn btn-default btn-sm" data-toggle="modal" onclick="showModal('<?php echo $v['uid'];?>','<?php echo $v['uname'];?>','<?php echo $v['mark_address'];?>','<?php echo $v['mark_info'];?>')" data-target="#myModal_user">修改</button>
								<a href="#" class="btn btn-default btn-sm">重置密码</a>
								<a href="/zadmin/User/userOrder/id/1624.html"class="btn btn-default btn-sm">订单</a>
								<a href="/zadmin/User/edit/id/1624.html" class="btn btn-default btn-sm">禁用</a>
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
<!-- Modal -->
<div class="modal fade" id="myModal_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel"><?php echo isset($shop_name)?$shop_name:'编辑用户';?></h4>
	  </div>
	  <div class="modal-body">
		<input type="hidden" name="shop_id" id="user_modal_id" value=""/>
		<div class="form-group">
			<label for="exampleInputPassword1">用户昵称</label>
			<input type="text" class="form-control" id="user_modal_uname" value="" disabled/>
		</div>
		<div class="form-group">
			<label for="exampleInputPassword1">标记地址</label>
			<input type="text" class="form-control" id="user_modal_address" placeholder="请输入标记地址"/>
		</div>
		<div class="form-group">
			<label for="exampleInputPassword1">其他标记</label>
			<input type="text" class="form-control" id="user_modal_info" placeholder="是否为黑户等"/>
		</div>
	  </div>
	  <div class="modal-footer">
		<button type="button" id="user_modal_save" class="btn btn-primary">保存</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
	  </div>
	</div>
  </div>
</div>
<!-- endModal -->
<script type="text/javascript">
$(function(){
    $("#user_modal_save").click(function(){
		var uid = $('#user_modal_id').val();
		var mark_address = $('#user_modal_address').val();
		var mark_info = $('#user_modal_info').val();
        var url = "<?php echo base_url('admin/user/updateInfo');?>";
		$.post(url,{uid:uid,mark_address:mark_address,mark_info,mark_info},function(data){
			window.location.href="<?php echo base_url('admin/user/ulist');?>";
		})
    })
	//搜索
	$("#searchBtn").click(function(){
		$type = $.trim($('#search_type').val());
		$type_str = String($type) == '0'?'uname':'uid';
		$keyword = String($.trim($('#searchInput').val()));
        $url = "<?php echo base_url('admin/user/ulist/type');?>";
        window.location.href = $url +'/'+$type_str+'/condition/'+$keyword;
    })
})
function showModal($val1,$val2,$val3,$val4){
	$('#user_modal_id').val($val1);
	$('#user_modal_uname').val($val2);
	$('#user_modal_address').val($val3);
	$('#user_modal_info').val($val4);
}
</script>
</body>
</html>
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
            <li ng-repeat="crumb in crumbs" ng-class="{active: $last}" class="ng-scope"><span ng-if="$first" class="active ng-binding ng-scope">新闻列表</span></li>
        </ol>
    </div>
    <div class="ng-scope">
        <div class="list">
              <div class="panel panel-default">
                <div class="panel-body pt30">
                  <table class="table table-condensed table-hover table-bordered" style="font-size:12px;" >
                    <thead>
                    <tr bgcolor="#FBFCE2">
						<td width="10%" height="24" align="center">id编号</td>
						<td width="60%" align="center">标题</td>
						<td width="10%" align="center">排序</td>
						<td width="20%" align="center">管理项</td> 
					</tr>
                    </thead>
                    <tbody id="goodsList">
                    <?php foreach($info_tmp as $k=>$v):?>
                        <tr bgcolor="#FFFFFF" align="center" class="hover">
							<td width="10%" height="24" align="center"><?php echo $v['id'];?></td>
							<td width="60%" height="24" align="left"><?php echo $v['title'];?></td>
							<td width="10%" height="24" align="center"><?php echo $v['sort'];?></td>
							<td width="20%" align="center">
								<a href=""><u>修改</u></a> |
								<a class="confirmdel" href=""><u>删除</u></a>
							</td>
						</tr>
                    <?php endforeach;?>
                    </tbody>
                  </table>
                </div>  
              </div> 
        </div>
    </div>
</div>
<script Language="JavaScript" src="<?php echo base_url('static/js/jquery-1.11.0.min.js');?>"></script>
<script type="text/javascript">
</script>
</body>
</html>
<?php $this->load->view('home/common/header');?>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('static/css/base.css');?>" />
</head>
<body>
<?php $this->load->view('home/common/menu');?>
<!--以上为动态载入区-->
<div class="content">
	<div class="w_cnt">
	<div class="member_cnt w950">
		<h2 class="member_title ordersTitle dis_area">配送区域信息</h2>
			<div class="orders_content dis_area_div" id="allmap"></div>
			<div class="orders_tips" style="margin:20px 0px;">
				<p>1.目前宅当家只开通了图示所示区域</p>
				<p>2.对尚未开通的区域配送订单将自动视为无效，同时宅当家也在努力的拓展中。</p>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('home/common/footer');?>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=1a9dc3534c908d4a19ba288d87d7fef5"></script>
<script type="text/javascript" src="<?php echo base_url('static/js/map.js')?>"></script>
<script  type="text/javascript">
loadTianjinMap();
</script>

<?php $this->load->view('home/common/header');?>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('static/css/base.css');?>" />
</head>
<body>
<?php $this->load->view('home/common/menu');?>
<!--以上为动态载入区-->
<div class="content">
	<div class="w_cnt">
	<div class="member_cnt w950">
		<h2 class="member_title ordersTitle dis_area">团体订餐</h2>
			<div class="dc_title">
			<p>
				<img style="height:560px; width:948px;margin-bottom:50px;" src="<?php echo base_url('static/images/tuancan.gif')?>" alt="">
			</p>
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
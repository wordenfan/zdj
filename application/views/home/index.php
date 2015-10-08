<?php $this->load->view('home/common/header');?>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('static/css/index.css');?>" />
	<script type="text/javascript" src="<?php echo base_url('static/js/picswitch.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('static/js/jquery.lazyload.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('static/js/simplepop.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('static/js/main.js');?>"></script>
</head>
<body>
<?php $this->load->view('home/common/menu');?>
<!--以上为动态载入区-->
	<!--第一级-->
	<div class="w_cnt">
		<ul class="slide_nav l">
			<li><a href="#"><b class="food_1"></b>中式餐厅</a></li>
			<li><a href="#"><b class="food_2"></b>馄饨面食</a></li>
			<li><a href="#"><b class="food_3"></b>便当套餐</a></li>
			<li><a href="#"><b class="food_4"></b>西式餐点</a></li>
			<li class="nbd"><a href="#"><b class="food_5"></b>日韩料理</a></li>
		</ul>
		<!--焦点图-->
		<div class="focus l">
			<div id="hotpic">
			<div id="NewsPic">
				<a target="_blank" href="#" style="visibility: visible; display: block;">
				<img src="<?php echo base_url('static/images/focus/focus_1.jpg');?>" width="460" height="250" alt="焦点图" title="焦点图" /></a>
				<a style="visibility: hidden; display: none;" target="_blank" href="#">
				<img src="<?php echo base_url('static/images/focus/focus_2.jpg');?>" width="460" height="250" alt="焦点图" title="焦点图" /></a>
				<a target="_blank" href="#" style="visibility: hidden; display: none;">
				<img src="<?php echo base_url('static/images/focus/focus_3.jpg');?>" width="460" height="250" alt="焦点图" title="焦点图" /></a>
				<div class="Navv">
					<span class="Cur">1</span>
					<span class="Normal">2</span>
					<span class="Normal">3</span>
				</div>
			</div>
			</div>
		</div>
		<!--焦点图-->
		<!--登录公告-->
		<div class="login_gg l">
			<div class="login_state">
				<h2 class="login_title box_title">用户登录</h2>
				<!--logined1-->
				<div class="logined" style="display:<?php echo $login_status>0?'block':'none'?>">
					<div class="login_info">
					<div class="login_pic l"></div>
					<div class="login_infoR l">
					<div class="lg_info_top">hi  <?php echo $myinfo['uname'];?><a href="<?php echo base_url('home/user/logout');?>">退出>></a></div>
					<div class="lg_info_btm">宅当家，用心创造便利</div>
					</div>
					</div>
					<div class="enter_btn"><a href="<?php echo base_url('home/user/pcenter');?>">进入个人中心</a></div>
				</div>
				<!--logined2-->
				<!--no logined-->
				<div class="no_login" style="display:<?php echo $login_status>0?'none':'block'?>">
				<form action="" method="post" name="loginform" id="loginform" onsubmit="return false;">
					<input type="text" autocomplete="off" id="uname" name="uname" placeholder="昵称/手机号" />
					<input type="password" autocomplete="off" id="pwd" name="pwd" placeholder="密码" />
					<div class="log_reg">
					<button type="button" class="login_to l" id="lgbt" onclick="dologin(this);"><b></b>账号登陆</button>
					<a class="user_reg r" href="<?php echo base_url('home/user/register');?>">用户注册</a>
					</div>
				</form>
				</div>
				<!--no logined-->
			</div>
			<ul class="gg">
				<?php foreach($news as $k=>$v):?>
					<li><a href="<?php echo base_url('home/news/show/id/').$v['id'];?>"><?php echo $v['title']?></a></li>
				<?php endforeach;?>
			</ul>
		</div>
	</div>
	<!--公告-->
	<?php if(config_item(AREA.'ANNOUNCEMENT_MODE')==1):?>
		<div class="w1000 notify"><b></b><?php echo config_item(AREA.'ANNOUNCEMENT')?></div>
	<?php else: ?>
		<div></div>
	<?php endif;?>
	<!--商家列表-->
	<div class="product">
	  <div class="w_cnt">
		<div class="product_box">
		  <div class="product_top">
			<div class="pdt_titile l"><b></b>外卖商家</div>
			<div class="product_support r">
			  <span>订餐时间：<?php echo config_item(AREA.'SERVICE_TIME')?></span>
			  <span>客服电话：<?php echo config_item(AREA.'SERVICE_PHONE')?></span>
			  <a href="http://weibo.com/zhaidangjia" target="_blank"><img src="<?php echo base_url('/static/images/weibo.gif');?>" width="18" height="16" /></a>
				<a href="#" id="weixinbtn" style="position: relative;"><img src="<?php echo base_url('/static/images/weixin.gif');?>" width="18" height="17" />
				<div id="weixinfu" style="z-index:99;position: absolute;margin:-34px 1px 0 23px;border:1px solid #666;width:100px; height:100px; background:#ccc; display:none;padding:5px;">
					<img src="<?php echo base_url('/static/images/erweima.jpg');?>" width="100" height="100" />
				</div>
				</a>
			  <a href="#"><img src="<?php echo base_url('/static/images/qq.gif');?>" width="74" height="23" /></a>
			</div>
		  </div>
		  <ul class="product_in">
			<?php foreach($open_list as $k => $v):?>
			<li onclick="location='<?php echo base_url('home/shop/shopinfo/id/'.$v['id']);?>'">
				<div>
					<div class="product_info">
						<a class="pdt_pic l">
							<img  class="lazy shop_cls" src="<?php echo base_url('/static/images/grey.gif');?>" data-original="<?php echo base_url('/'.$v['logo'])?>" width="127" height="98" alt="青岛开发区<?php echo $v['name'];?>" title="青岛开发区<?php echo $v['name'];?>" />
						</a>
						<div class="pdt_text l">
							<h2><a><?php echo $v['name'];?></a></h2>
							<p>起送价格：￥<?php echo $v['start_price'];?>元</p>
							<p>配送费用：￥<?php echo $v['send_price'];?>元</p>
							<p><b class="star"></b><b class="star"></b><b class="star"></b><b class="star"></b><b class="star"></b></p>
						</div>
					</div>
					<div class="shop_info_icon">
						<i class="shop_business"></i>
						<span><?php echo $v['summary'];?></span>
						<?php if($v['free_send']==1):?>
						<b class="mian"></b><span class="btip"></span>
						<?php endif;?>
						<b class="pin"></b>
					</div>
				</div>
			</li>
			<?php endforeach;?>
			<?php foreach($close_list as $k => $v):?>
			<li onclick="location='<?php echo base_url('home/shop/shopinfo/id/'.$v['id']);?>'">
				<div class="reset_mask">			
					<div class="product_info">
						<a class="pdt_pic l">
							<img  class="lazy shop_cls" src="<?php echo base_url('/static/images/grey.gif');?>" data-original="<?php echo base_url('/'.$v['logo'])?>" width="127" height="98" alt="青岛开发区<?php echo $v['name'];?>" title="青岛开发区<?php echo $v['name'];?>" />
						</a>
						<div class="pdt_text l">
							<h2><a><?php echo $v['name'];?></a></h2>
							<p>起送价格：￥<?php echo $v['start_price'];?>元</p>
							<p>配送费用：￥<?php echo $v['send_price'];?>元</p>
							<p><b class="star"></b><b class="star"></b><b class="star"></b><b class="star"></b><b class="star"></b></p>
						</div>
					</div>
					<div class="shop_info_icon">
						<span><?php echo $v['summary'];?></span>
						<i class="shop_reset"></i>
						<?php if($v['free_send']==1):?>
						<b class="mian"></b><span class="btip"></span>
						<?php endif;?>		
						<b class="pin"></b>
					</div>
				</div>
			</li>
			<?php endforeach;?>
		  </ul>
		</div>
	  </div>
	</div>
	<script type="text/javascript">
		$(function() {
			//幻灯片
			$('#hotpic').liteNav(3000);	
			//延迟加载
			$("img.lazy").lazyload({effect:"fadeIn",threshold:300});
			//登录
			$("#loginform").keyup(function(event){
				if(event.keyCode ==13){
					$("#lgbt").trigger("click");
				}
			});
		});
		function dologin(obj)
		{
			obj.disabled =true;
			var js_ud = $('#uname').val();
			var js_pwd = $('#pwd').val();
			$.post(baseurl+'home/home/index',{keyword:js_ud,pwd:js_pwd},function(data)
			{
				obj.disabled =false;
				var json = eval(data);
				alert(json.status);
				if(json.status == 1)
				{
					$(".no_login").css("display","none");
					$(".logined").css("display","block");
					$(".lg_info_top").html("hi "+ json.data +"<a href='<?php echo base_url('home/user/logout');?>'>退出登录>></a>");
				}else{
					$("#pwd").val("")
					alert('用户名或密码错误！');
				}
			},'json')
		}
	</script>
	<?php $this->load->view('home/common/footer');?>
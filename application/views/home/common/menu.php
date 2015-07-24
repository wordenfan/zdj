<!--顶部信息-->
<div class="topest">
 <div class="w1000">
  <div class="top_l l">
   <a href="#" class="mobile"><b></b>手机版</a>
   <a href="#" class="collect"><b></b>收藏宅当家</a>
  </div>
  <div class="top_r r">
	<?php if($login_status>0):?>
		<span>您好，<a href=""><?php echo $myinfo['uname'];?></a></span><span><a href="<?php echo base_url('home/User/logout')?>">退出</a></span>
		<span class="short_line">|</span>
		<span>客服时间：00:00</span>
	<?php else :?>
		<a href="<?php echo base_url('home/User/login')?>">会员登录</a><span class="short_line">|</span><a href="<?php echo base_url('home/User/register') ?>" class="red">免费注册</a>
		<span class="short_line">|</span>
		<span>客服时间：00:00</span>
	<?php endif;?>
  </div>
 </div>
</div>
<!--顶部信息-->
<!--头部-->
<div class="w1000 head">
    <div class="logo l"><a href="<?php echo base_url('home/home/index');?>"><img src="<?php echo base_url('static/images/mainLogo.gif')?>" width="154" height="75" alt="宅当家" title="宅当家" /></a></div>
 <div class="city l">
   <div class="city_now"><b></b>黄岛</div>
   <span class="qh_chs">[切换城市]</span>
 </div>
 <div class="search l">
   <div class="search_l l"><input value="" type="text" name="search" placeholder="请输入餐馆名、地名、附近区域位置"/></div>
   <div class="search_btn l"><button><strong>搜索</strong></button></div>
 </div>
 <div class="shop_sure l"></div>
</div>
<!--头部-->
<!--导航-->
<block name="titles">
<div class="nav_main">
  <div class="w1000">
    <ul class="nav_in l">
      <li><a href="<?php echo base_url(); ?>" class="current">首页</a></li>
      <li><a href="<{:U('Group/index')}>">团体订餐</a></li>
      <li><a href="<{:U('Area/index')}>">配送区域</a></li>
      <li><a href="#">积分商城</a></li>
    </ul>
    <a href="#" class="view_last r" style="display:none">最近浏览</a>
  </div>
</div>
</block>
<!--导航-->
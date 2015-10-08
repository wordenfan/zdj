<?php $this->load->view('home/common/header');?>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('static/css/base.css');?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('static/css/shopinfo.css');?>" />
    <script type="text/javascript" src="<?php echo base_url('static/js/main.js');?>"></script>
    <script> javascript:window.history.forward(1); </script>
</head>
<body>
    <?php $this->load->view('home/common/menu');?>
<!--以上为动态载入区-->
<!--food_img-->
<div id="bg"></div>
<div id="show_img_div">
	<a class="d_closeBtn" title="" onclick="hidePic();"></a>
	<div id="show_food_pic">
		<img alt="" width="320px" height="240px" src="">
	</div>	
</div>
<!--login-->
<div id="show_login_div" class="show_float_div">
	<div class="login_header">
        <button class="login_close" type="button" onclick="hideLogin()">×</button>
        <h3>登录</h3>
    </div>
    <div class="login_body">
         <form name="loginform" id="loginform">
            <div class="f_login_item">
				<span class="f_login_span l">&nbsp;&nbsp;&nbsp;&nbsp;</span>
				<div class="l">
					<span class="lg_prompt"></span>
				</div>
			</div>
			<div class="f_login_item">
				<span class="f_login_span l">昵&nbsp;&nbsp;&nbsp;&nbsp;称：</span>
				<div class="l">
					<input type="text" placeholder="填写昵称" maxlength="16" id="lg_uname_id" name="lg_uname">
				</div>
			</div>
			<div class="f_login_item">
				<span class="f_login_span l">密&nbsp;&nbsp;&nbsp;&nbsp;码：</span>
				<div class="l">
					<input type="password" placeholder="填写密码" maxlength="16" id="lg_pwd_id" name="lg_pwd">
				</div>
			</div>
			<div class="f_login_item">
				<span class="f_login_span l">&nbsp;&nbsp;&nbsp;&nbsp;</span>
				<div class="">
					<button type="button" id="lgbt" onclick="do_float_login();">登 录</button>
				</div>
			</div>
        </form>
    </div>
    <div style="" class="f_login_reg">
        <a href="<?php echo base_url('home/User/register');?>">还没有账号？十秒注册</a>
    </div>
</div>
<!--主题-->
<div class="w_cntnb">
  <div class="w_cntnb">
    <div class="guide_nav">
      <span>您现在的位置：</span><a href="#">青岛开发区</a>&nbsp;>&nbsp;<span><?php echo $name;?></span>
    </div>
    <div class="order_wrap">
		<div class="menu_lstL l">
			<div class="menu_shop">
				<div class="menu_shopL"><img src="<?php echo base_url('/'.$logo);?>" width="165" height="124" alt="青岛开发区<?php echo $name; ?>" title="青岛开发区<?php echo $name;?>" /></div>
				<div class="menu_shopM">
					<h2>
						<span><?php echo $name;?></span>
					</h2>
					<div class="shop_item">餐厅地址：<?php echo $address;?>&nbsp;&nbsp;&nbsp;&nbsp;配送费用：￥<?php echo $send_price;?>元</div>
					<div class="shop_item">营业时间：<?php echo $business_hours;?></div>
					<div class="shop_item">
						<span><img src="<?php echo base_url('static/images/shop_tag1.gif');?>" width="13" height="14" /></span><span><?php echo $start_price;?>元起送&nbsp;</span>
						<span><img src="<?php echo base_url('static/images/shop_tag4.gif');?>" width="14" height="14" /></span><span>约45分钟送达&nbsp;</span>
						<span><img src="<?php echo base_url('static/images/shop_tag2.gif');?>" width="16" height="14" /></span><span>餐到付款&nbsp;</span>
					</div>
					<div class="shop_item">
						<span>				
							<b class="pin"></b><span class="btip">(品质外卖提供商)</span>
							<?php if($free_send==1):?>
							<b class="mian"></b><span class="btip">(满<?php echo config_item(AREA.'FREE_SEND');?>免配送费)</span>
							<?php endif;?>
						</span>
					</div>
				</div>
				<div class="menu_shopR">
					<?php if($open_close == 0): ?>
					<img src="<?php echo base_url('static/images/station_rest.gif');?>" width="50" height="132" />
					<?php else:?>
					<img src="<?php echo base_url('static/images/station_open.gif');?>" width="50" height="132" />
					<?php endif;?>
				</div>
			</div>
			<div class="menus_view">
				 <div class="title">简介说明</div>
				 <div class="menus_viewTip"><?php echo $summary;?></div>
				 <div class="title" style="border-top:0px solid #ccc"><span style="color:#ff0000;float:right;display:block">(如需打包费的已计入餐品价格)</span><a>菜单列表</a></div>
				
				<div class="food_fenl" id="food_fen1">
                    餐品分类：<?php foreach($foodlist_tmp as $t=>$to):?><span><a href="#anchor<?php echo $t;?>"><?php echo $to['type_name'];?></a></span><?php endforeach;?>
				</div>
                
                <?php foreach($foodlist_tmp as $k=>$vo):?>
                    <div class="menusView_item"  id="anchor<?php echo $k; ?>">
                        <h2><?php echo $vo['type_name']; ?></h2>
                        <ul>
                            <?php foreach($vo['food_list'] as $m=>$mo):?>
                                <li>
                                    <input type="hidden" id="<?php echo $vo['type_name']; ?>" value="<?php echo $mo['food_id']; ?>" />
                                    <div class="food_num l"><span>+</span></div>
                                    <div class="food_name l">
                                        <span id='fd_name' title="<?php echo $mo['food_name']; ?>"><?php echo $mo['food_name']; ?></span>
                                        <span>
                                            <?php if(!empty($mo['food_pic'])):?>
                                            <img class="food_pic" id="<?php echo base_url($mo['food_pic']);?>" src="<?php echo base_url('static/images/foodimg.gif')?>" width="15" height="15" />
                                            <?php endif;?>
                                        </span>
                                    </div>
                                    <div class="sale_price r">
                                        <span>￥<label><?php echo $mo['sale_price']; ?></label></span><span></span>
                                    </div>
                                </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                <?php endforeach;?>
			</div>
		</div>
       <div class="menu_lstR r">
        <div class="menu_order" id="menu_order">
			<h2>今日餐品</h2>
			<div class="orders_tody">
				<table width="248" style="table-layout:fixed" cellpadding="0" cellspacing="0" border="0">
				<tr>
					<th width="80">名称</th>
					<th width="80">数量</th>
					<th width="44">价格</th>
					<th width="44">操作</th>
				</tr>
				<tr class="flist_id"></tr>
				<tr id="sendtab_id">
					<td>配送费</td>
					<td><span class="send_fee">宅当家配送</span></td>
					<td><span class="send_fee_num" id="pp">￥<?php echo $send_price; ?></span></td>
					<td></td>
				</tr>
				</table>
			</div>
			<input id="f_uid" type="hidden" name="o_uid" value="<?php echo isset($myinfo)?$myinfo['uid']:'';?>" />
			<div class="sum_price">合计：<span class="send_fee_num">￥<?php echo $send_price; ?></span> </div>
			<div class="orders_send">
				<div class="sendInfo_next">
					<button id="info_next" >下一步</button>
				</div>
			</div>
		</div>
       </div>
    </div>
  </div>
</div>
<!--底部-->
<script>
//加载完毕
$(function(){
    $cart = <?php echo $shop_cart; ?>;
    showHtml($cart);
}); 

//显示图片
$(".food_pic").click(function(event)
{
	showPic($(this).attr('id'));
	event.stopPropagation();
})
function showPic(url) {
	$("#show_food_pic").children("img").attr("src",url);
	$("#bg").css("display","block");
	$("#show_img_div").css("display","block");
}
function hidePic() {
	$("#show_food_pic").children("img").attr("src","");
	document.getElementById("bg").style.display ='none';
	document.getElementById("show_img_div").style.display ='none';
}
//购物车操作
var send_prc = <?php echo $send_price; ?>;
var food_sum = 0;//每次操作都会导致是否出现配送费的价格变动，所以此为变量
//====增加
$(".menusView_item ul li").click(function()
{
	var tm_flag = <?php echo $open_close; ?>;
	if(tm_flag == 1)
	{
		var _sid = <?php echo $id ;?>;
		var _type = $(this).children("input").attr("id");
		var _id = $(this).children("input").val();
		var _name = $.trim($(this).children(".food_name").children("span").text());
		var _price = $(this).children(".sale_price").children("span").children("label").text();
		var click_obl = $(this);//供下方动画调用，否则无法调用到this
		$.post('/home/shop/doShopping',{sid:_sid,fid:_id,ftype:_type,fname:_name,fprice:_price,fmod:1,send_price:send_prc},function(data)
		{
			//动画
			/*
			var carton_obj = click_obl.children(".food_num").children("span");
			var tmp;
			if(tmp) tmp.remove(); 
			var box=carton_obj.parent();
			tmp=carton_obj.clone();
			var p=carton_obj.offset();
			var p2=$('.sum_price').offset();
			tmp.addClass('_box').css(p).appendTo(box);
			tmp.appendTo(box);
			p2=$.extend(p2,{height:5,width:5,opacity:10});
			$(tmp).animate(p2, "normal",function(){
				tmp.remove();  
			});
			*/
			//
			showHtml(data);
		},'json')
	}else if(tm_flag == 0){
		alert('店家或配送员已下班');
	}
});
//====移除
$('body').on('click','.order_delete', function() 
{
	var _id = $(this).attr('cid');
	var _sid = <?php echo $id ;?>;
	$.post('/home/shop/doShopping',{sid:_sid,fid:_id,fmod:3,send_price:send_prc},function(jdata)
	{
		showHtml(jdata);			
	},'json')
});
//====加号
$('body').on('click','#increase_id', function() 
{
	var _id = $(this).attr("cid");
	var _name = $(this).attr("cname");
	var _price = $(this).attr("cprice");
	var _sid = <?php echo $id ;?>;
	var _type = $(this).attr("ctype");
	
	$.post('/home/shop/doShopping',{sid:_sid,fid:_id,ftype:_type,fname:_name,fprice:_price,fmod:1,send_price:send_prc},function(data)
	{
		showHtml(data);	
	},'json')
});
//====减号
$('body').on('click','#decrease_id', function() 
{
    var _sid = <?php echo $id ;?>;
	var _id = $(this).attr("cid");
	
	$.post('/home/shop/doShopping',{sid:_sid,fid:_id,fmod:2,send_price:send_prc},function(data)
	{
		showHtml(data);	
	},'json')
});
function showHtml(json)
{
	var html_str="";//购物列表htnl
	var select_arr=[];//选中的数组
	var nm = $(".menusView_item ul li");
	var free_send_price = "<?php echo config_item(AREA.'FREE_SEND');?>";
	nm.removeClass();//还原1
	nm.children(".food_num").children("span").text("+");//还原2
	for(var w in json )
	{
		//合计总额
		if(w=="total")
		{
			food_sum = parseFloat(json[w]);//用于判断是否够起送价
			//是否够免配送资格，修改配送费
			$('#pp').text('￥'+send_prc);
			$('.sum_price').children("span").text('￥'+(parseFloat(json[w])+send_prc));
			//开启"免"活动并且超过免金额则享受活动
			if($('.mian').length>0&&json[w] >= parseFloat(free_send_price))
			{
				$('#pp').text('￥0');
				$('.sum_price').children("span").text('￥'+(parseFloat(json[w])));
			}
			break;
		}
		//左侧变为选中并且更新数量
		for(i=0;i<nm.length;i++)
		{
			if(nm.eq(i).children("input").val()==w)//id相同
			{
				nm.eq(i).children(".food_num").children("span").text(json[w].num);
				nm.eq(i).addClass("selected");
				select_arr.push(nm.eq(i));
			}
		}
		//右侧刷新界面
		html_str+='<tr class="flist_id"><input id="f_id" type="hidden" value='+w+' /><td id="f_name"><span class="cart_food_name" title="'+json[w].name+'">'+json[w].name+'</span></td><td><div class="amount_count"><a href="javascript:void(0)" id="decrease_id" class="jian yoyo_amountJian" cid="'+w+'"></a><input type="text" readonly = "true" id = "amount_id" name="amount3" value="'+json[w].num+'" /><a href="javascript:void(0)" id="increase_id" class="jia yoyo_amountJia" cid="'+w+'" ctype="'+json[w].type+'" cname="'+json[w].name+'" cprice="'+json[w].price+'"></a></div></td><td id="unit_price">￥'+Math.round(json[w].price*json[w].num*100)/100+'</td><td><span class="order_delete" cid="'+w+'">移除</span></td></tr>';
		}
	$("tr").remove(".flist_id");
	$("#sendtab_id").before(html_str);
}
//=========================================================================
//点击下一步提交信息
$("#info_next").click(function(event)
{
	var id = $("#f_uid").val();
	var _start_price = "<?php echo $start_price ;?>";
	if(food_sum < parseFloat(_start_price))
	{
		alert('商家满'+_start_price+'元起送哦！');
		return false;
	}
	else if(!id)
	{
		showLogin();
	}else{
       window.location.href = "<?php echo base_url('home/order/orderSubmit');?>";
	}
});
//显示登录框
function showLogin(url) {
	$("#bg").css("display","block");
	$("#show_login_div").css("display","block");
}
function hideLogin() {
	document.getElementById("bg").style.display ='none';
	document.getElementById("show_login_div").style.display ='none';
}
//回车登录
$("#loginform").keyup(function(event){
	if(event.keyCode ==13){
		do_float_login();
	}
});
//====登录弹窗
function do_float_login()
{
	var luname = $("#lg_uname_id").val();
	var lpwd = $("#lg_pwd_id").val();
	$.post('/home/user/login',{uname:luname,pwd:lpwd,frompage:'shopinfo'},function(data){
		$(".lg_prompt").html(data['msg']);
		if(data['flag']=='1')
		{
			$(".lg_prompt").css("color","green");
			window.location.href = "<?php echo base_url('home/order/orderSubmit');?>";
		}else{
			$(".lg_prompt").css("color","#ff0000");
		}
	},'json')
}
</script>
<?php $this->load->view('home/common/footer');?>
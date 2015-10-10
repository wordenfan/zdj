<style>
.curAddrPanel{margin:20px 0px 0px 20px;height:auto;width:100%;overflow:hidden;}
.curMarkPanel{margin:-10px 0px 20px 20px;height:auto;width:100%;}
.curMarkPanel li{margin:12px 0px 0px 4px;font-size:14px;}

.addr-item {float:left;width:260px;height:120px;margin:0 15px 20px 0;padding:0 15px 0px;border:1px solid #e4e4e4;background:#fff;position:relative;overflow:hidden;border:1px solid #ccc}
.addr-item span,.addr-item p{font-size:14px;color:#333;font-weight:400;text-decoration:none;}
.addr-item .addr-title{height:26px;line-height:26px;padding:10px 0 7px;border-bottom:1px solid #e4e4e4;overflow:hidden;zoom:1}
.addr-item .addr-title .addr-user{float:left;width:160px;height:26px;overflow:hidden}
.addr-item .addr-title .addr-user .name{display:inline-block;max-width:130px;height:26px;overflow:hidden}
.addr-item .addr-title .addr-user .sex{display:inline-block;max-width:30px;height:26px;overflow:hidden}
.addr-item .addr-title .addr-action{float:right;}
.addr-item .addr-title .addr-action a{padding:2px 3px;text-decoration:none;color:#333;cursor:pointer;}
.addr-item .addr-title .addr-action a:hover{text-decoration:underline;}
.addr-item:hover {border-color: #ff2d4b;}

.addr-item .addr-con{padding-top:10px;}
.addr-item .select-ico{position:absolute;right:0;bottom:0;display:inline-block;margin-right:0;width:24px;height:24px;line-height:24px;vertical-align:text-bottom;*display:inline;zoom:1;visibility:hidden;background-repeat: no-repeat;}
.addr-item .select-ico{visibility:visible;background-image:url(http://webmap0.map.bdimg.com/static/waimai/common_z_ee375f9.png);background-position:-60px -207px}
.addr_item_new{cursor:pointer;}
.addr-item .add_new{background-image:url(http://webmap0.map.bdimg.com/static/waimai/common_z_ee375f9.png);background-position:-60px -378px;background-repeat:no-repeat;width:90px;display:block;margin:50px 0px 50px 60px;padding-left:28px;}
.addr-item .add_new:hover{text-decoration:underline;}
<!--地址-->
.show_float_div{overflow:hidden;display:none;position:fixed !important; position:absolute;top:25%;left:50%;width:460px;height:270px;margin-left:-230px;border:5px solid #999;background-color:white;z-index:1002;overflow: auto;}
#show_address_div{height:290px;}
#show_address_div .address_body{height:180px;}
#bg{display:none;position:fixed !important; position:absolute;top:0%;left:0%;width:100%;height:100%;background-color: black;z-index:1001;  -moz-opacity: 0.5;  opacity:.50;  filter:alpha(opacity=50);}
#bg{background:#000;top:0px; left:0px; width:100%; height:100%;_height:3000px;filter: progid:DXImageTransform.Microsoft.Alpha(opacity=50);}

</style>
<!--address_START-->
<div id="show_address_div" class="show_float_div">
	<div class="login_header">
        <button class="login_close" type="button">×</button>
        <h3>地址</h3>
    </div>
    <div class="address_body">
         <form>
			<input type="hidden" id="addr_id" value="0"/>
            <div class="f_login_item">
				<span class="f_login_span l">&nbsp;&nbsp;&nbsp;&nbsp;</span>
				<div class="l">
					<span class="lg_prompt"></span>
				</div>
			</div>
			<div class="f_login_item">
				<span class="f_login_span l">收货人：</span>
				<div class="l">
					<input type="text" placeholder="填写收货人" maxlength="16" id="add_uname">
				</div>
			</div>
			<div class="f_login_item">
				<span class="f_login_span l">电&nbsp;&nbsp;&nbsp;&nbsp;话：</span>
				<div class="l">
					<input type="text" placeholder="填写电话" maxlength="11" id="tel">
				</div>
			</div>
			<div class="f_login_item">
				<span class="f_login_span l">地&nbsp;&nbsp;&nbsp;&nbsp;址：</span>
				<div class="l">
					<input type="text" placeholder="收餐地址" maxlength="50" id="address">
				</div>
			</div>
			<div class="f_login_item">
				<span class="f_login_span l">&nbsp;&nbsp;&nbsp;&nbsp;</span>
				<div class="">
					<button type="button" id="save_address" onclick="do_float_login();">保 存</button>
				</div>
			</div>
        </form>
    </div>
</div>
<script>
$(function(){
	//保存
	$('#save_address').click(function(){
		var id = $('#addr_id').val();
		var add_uname = $('#add_uname').val();
		var tel = $('#tel').val();
		var address = $('#address').val();
		$.post('/home/user/add_address',{id,id,add_uname:add_uname,tel:tel,address:address},function(data){
			hideAddress();
			if(data.status == 1){
				window.location.href=window.location.href; 
			}else{
				alert(data.msg);
			}
		},'json')
	})
	//添加新地址(用户中心)
	$('#add_new_id').click(function(){
		if($('tbody').children('tr').length >=2){
			alert('配送地址最多为两个')
			return;
		}
		$('#addr_id').val(0);
		showAddressEdit();
	});
})
//地址栏修改
function showAddressEdit() {
	$("#bg").css("display","block");
	$("#show_address_div").css("display","block");
}
function hideAddress() {
	document.getElementById("bg").style.display ='none';
	document.getElementById("show_address_div").style.display ='none';
}
$('.login_close').on('click',function(){
	hideAddress();
});
//修改地址
function addr_update(id,uname,tel,address){
	$('#addr_id').val(id);
	$('#add_uname').val(uname);
	$('#tel').val(tel);
	$('#address').val(address);
	showAddressEdit();
}
//设为默认，点击li或设置默认的连接
function addr_set_default(id){
	$.post('/home/user/set_default_address',{id,id},function(data){
		if(data.status == 1){
			window.location.href=window.location.href; 
		}else{
			alert(data.msg);
		}
	},'json')
}
//删除(用户中心)
function addr_remove(id){
	$.post('/home/user/del_address',{id,id},function(data){
		if(data.status == 1){
			window.location.href=window.location.href; 
		}else{
			alert(data.msg);
		}
	},'json')
}
</script>
<!--address_END-->
// JavaScript Document
   function jia(stri_str,maxnum){
	  var value=$(stri_str).parent('div').children('input').attr("value");
        if(value<maxnum){
		   value=+value+1;
			$(stri_str).parent('div').children('input').attr("value",value)       
		} 
		else{
			alert("已经是最大值")
			}
	   }
	   function jian(stri_str,minnum){
	  var value=$(stri_str).parent('div').children('input').attr("value");
		if(value>minnum){
			
		   value=+value-1;
			$(stri_str).parent('div').children('input').attr("value",value)       
			} 
          else{
			  alert("已经是最小值")
			  }
		   }
$(document).ready(function(){
	
	$("#weixinbtn").hover(function(){
		$("#weixinfu").show();
		},function(){
		$("#weixinfu").hide();
			})
	
	window.onscroll = function(){
	//判断浏览器的内核类型
	if(navigator.userAgent.indexOf('Opera') >= 0||navigator.userAgent.indexOf('Chrome') >= 0||navigator.userAgent.indexOf('Safari') >= 0){
	scroll_top_num=$('body').scrollTop();
		}//判断是否为欧朋，谷歌，苹果；
	if(navigator.userAgent.indexOf('MSIE') >= 0||navigator.userAgent.indexOf('Firefox') >= 0){
	scroll_top_num=$('html').scrollTop();
		}//判断IE，火狐；
	if(scroll_top_num>=605){
	$('#food_fen1').addClass('food_fen1_fixed');
		}
	if(scroll_top_num>=260){
	$('#menu_order').addClass('menu_order_fixed');
		}
	if(scroll_top_num<605){
	$('#food_fen1').removeClass('food_fen1_fixed')
		}
	if(scroll_top_num<260){
	$('#menu_order').removeClass('menu_order_fixed');
		}
	
	}
$("#bg").css('opacity',0.7);

	
	})
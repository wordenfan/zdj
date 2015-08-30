$(function(){
	
	 $('.out').click(function(){
   
        var url=$(this).attr('href');
        if(window.confirm('你确定要退出吗？')){
         window.open(url,'_top');
        }

      return false;
    });
	
	//删除确认框
	 $('.confirmdel').click(function(){
     if (!$(this).hasClass("nodel"))
      {
        var url=$(this).attr('href');
        if(window.confirm('你确定要删除吗？')){
           window.location=url;
        }
      }
      return false;
    });
	
	//鼠标样式的切换
	$('.hover').hover(function(){
		
		$(this).css("background" , "#f9fcdf")

		},
		function(){
			$(this).css("background" , "#fff")
			});
	
	});

$(function(){
	//排序 更改了方框里的排序值就选中该行
	$('.sort').change(function(){
		var id=$(this).attr('id');
		$('#sort_'+id).attr('checked',true);
	  });
	  
	  $('.typename').change(function(){
		var id=$(this).attr('id');
		id=id.split("_");
		$('#sort_'+id[1]).attr('checked',true);
	  });
	   
	  $('.score').change(function(){
		var id=$(this).attr('id');
		id=id.split("_");
		$('#sort_'+id[1]).attr('checked',true);
	  });
	  
	  

 	//全选和取消选择
    $('input[name="all"]').click(function(){
		
      if ($(this).attr("checked")) 
      	{  
            $("input[class=aid]").each(function() {  
                $(this).attr("checked", true);  
            });  
        } 
        else 
        {  
            $("input[class=aid]").each(function() {  
                $(this).attr("checked", false);  
            });  
        }  
    });	
	var text=""; 
	//删除
	$(".del").click(function(){
        if(window.confirm('你确定要删除吗？'))
        {	
			//获取中的id
		 	$("input[class=aid]").each(function() {  
            	if ($(this).attr("checked")) 
            	{  
                	text += ","+$(this).val();  
            	}
        	});  
        	if(!text)
    			alert('请选择文档'); 
	    	//ajax传值
			$.post(delurl,{'id':text},function(data){
		   		//排序成功页面跳转
		   		//排序失败提示请重试
		   		if(data.status)
		  			 window.open(turl,'main');
		   		else
		   			 alert('请重试');	
		 	});
       	}
	});  
	//推荐
	$(".best").click(function(){
        if(window.confirm('你确定推荐吗？'))
        {	
			//获取中的id
		 	$("input[class=aid]").each(function() {  
            	if ($(this).attr("checked")) 
            	{  
                	text += ","+$(this).val();  
            	}
        	}); 
        	if(!text)
    			alert('请选择文档'); 
	    	//ajax传值
			$.post(besturl,{'id':text},function(data){
		   		 //排序成功页面跳转
		  		 //排序失败提示请重试
		   		if(data.status)
		   			window.open(turl,'main');
		  		 else
		   	 		alert('请重试');	
		 	});
       	}
	});  
	
	// 删除推荐
	$(".dbest").click(function(){
        if(window.confirm('你确定删除推荐吗？'))
        {	
			//获取中的id
		 	$("input[class=aid]").each(function() {  
            	if ($(this).attr("checked")) 
            	{  
                	text += ","+$(this).val();  
            	}
        	}); 
        	if(!text)
    			alert('请选择文档'); 
	    	//ajax传值
			$.post(dbesturl,{'id':text},function(data){
		  		 //排序成功页面跳转
		   		//排序失败提示请重试
		   		if(data.status)
		   			window.open(turl,'main');
		   		else
		   	 		alert('请重试');	
		 	});
       	}
	});
	
	// 审核
	$(".check").click(function(){
        if(window.confirm('你确定审核吗？'))
        {	
			//获取中的id
		 	$("input[class=aid]").each(function() {  
            	if ($(this).attr("checked")) 
            	{  
                	text += ","+$(this).val();  
            	}
        	}); 
        	if(!text)
    			alert('请选择文档'); 
	    	//ajax传值
			$.post(checkurl,{'id':text},function(data){
		   		//排序成功页面跳转
		   		//排序失败提示请重试
		   		if(data.status)
		   			window.open(turl,'main');
		   		else
		   	 		alert('请重试');	
		 	});
       	}
	});
	// 删除审核
	$(".dcheck").click(function(){
        if(window.confirm('你确定删除审核吗？'))
        {	
			//获取中的id
		 	$("input[class=aid]").each(function() {  
            	if ($(this).attr("checked")) 
            	{  
                	text += ","+$(this).val();  
            	}
        	}); 
        	if(!text)
    			alert('请选择文档'); 
	    	//ajax传值
			$.post(dcheckurl,{'id':text},function(data){
		   		//排序成功页面跳转
		   		//排序失败提示请重试
		   		if(data.status)
		   			window.open(turl,'main');
		   		else
		   	 		alert('请重试');	
		 	});
       	}
	});
	//增加属性
	$('.attr').click(function(){
		var attrid=$('#attr').val();//属性id
		//获取中的id
	 	$("input[class=aid]").each(function() {  
        	if ($(this).attr("checked")) 
        	{  
            	text += ","+$(this).val();  
        	}
    	}); 
    	if(!text)
    		alert('请选择文档');
    	//ajax传值 
    	$.post(attrurl,{'attrid':attrid,'id':text},function(data){
			//排序成功页面跳转
	   		//排序失败提示请重试
	   		if(data.status)
	   			window.open(turl,'main');
	   		else
	   	 		alert('请重试');	
    	});
	});
	//删除属性
	$('.dattr').click(function(){
		var attrid=$('#attr').val();//属性id
		//获取中的id
	 	$("input[class=aid]").each(function() {  
        	if ($(this).attr("checked")) 
        	{  
            	text += ","+$(this).val();  
        	}
    	}); 
    	if(!text)
    		alert('请选择文档');
    	//ajax传值 
    	$.post(dattrurl,{'attrid':attrid,'id':text},function(data){
			//排序成功页面跳转
	   		//排序失败提示请重试
	   		if(data.status)
	   			window.open(turl,'main');
	   		else
	   	 		alert('请重试');	
    	});
	});	
});
	
//图片上传
function ajaxFileUpload()
	{

		$.ajaxFileUpload
		(
			{
				url:ajaxurl, 
				secureuri:false,
				fileElementId:'pic',
				dataType: 'json',
				success: function (data, status)
				{
					if(data.error)
						{
							alert(data.error);
						}
						else
						{
							$("#info >ul ").html("<li><img class='info-img' src='"+imageshow+data.msg+"' width='100'/><img  src='"+imagecolse+"close.gif' alt=''  class='close-img' rel='"+data.msg+"' /><input type='hidden' name='imgpic[]' value='"+data.msg+"'/></li>"+$("#info >ul ").html());
						}
				},
				error: function (data, status, e)
				{
					alert(e);
				}
			}
		)
		
		return false;
	}
//单个图片	
function ajaxFileUploadList()
	{

		if($("#infoList >ul>li").length==1)
		{
			alert('只能上传一张图片');
			return false;
		}
		$.ajaxFileUpload
		(
			{
				url:ajaxurllist, 
				secureuri:false,
				fileElementId:'img',
				dataType: 'json',
				success: function (data, status)
				{
					if(data.error)
						{
							alert(data.error);
						}
						else
						{
							$("#infoList >ul ").html("<li><img class='info-img' src='"+imageshow+data.msg+"' width='100'/><img  src='"+imagecolse+"close.gif' alt=''  class='close-img' rel='"+data.msg+"' /><input type='hidden' name='imgpicList[]' value='"+data.msg+"'/></li>"+$("#infoList >ul ").html());
						}
				},
				error: function (data, status, e)
				{
					alert(e);
				}
			}
		)
		
		return false;
	} 
$(document).ready(function(){
  });
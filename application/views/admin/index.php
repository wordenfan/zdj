<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>后台管理系统</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="Text/Javascript" language="JavaScript">
if (window.top != window)
{
  //window.top.location.href = document.location.href;
}
</script>
<frameset rows="50,*" framespacing="0" border="0">
    <frame src="<?php echo base_url('admin/order/ad_top');?>" id="header-frame" name="header-frame" frameborder="no" scrolling="no">
  <frameset cols="175, *" framespacing="0" border="0" id="frame-body">
    <frame src="<?php echo base_url('admin/order/ad_menu');?>" id="menu-frame" name="menu-frame" frameborder="no" scrolling="yes">
    <frame src="<?php echo base_url('admin/order/olist');?>" id="main-frame" name="main-frame" frameborder="no" scrolling="yes">
  </frameset>
</frameset>
</head>
<body>
</body>
</html>
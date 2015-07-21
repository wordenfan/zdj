<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="宅当家跳转页" name="description" />
<meta content="宅当家跳转页" name="keywords" />
</head>
<body>
<link href="<?php echo base_url('static/css/prompt.css') ?>" rel="stylesheet" type="text/css" />
<base target="_self" />
<div class="Prompt">
  <div class="Prompt_top"></div>
  <div class="Prompt_con">
    <dl>
    <dt>提示信息</dt>
        <dd><span id="img_flag" class='Prompt_x'></span></dd>
        <dd>
            <?php if(strlen($error)<1):?>
                <script type="text/javascript">
                    document.getElementById('img_flag').className = 'Prompt_ok';
                </script>
                <h2><?php echo($message); ?></h2>
            <?php else: ?>
                <script type="text/javascript">
                    document.getElementById('img_flag').className = 'Prompt_x';
                </script>
                <h2><?php echo($error); ?></h2>
            <?php endif; ?>
            <p>系统<?php echo strlen($error) ?>将在 <span id="wait" style='color:blue;font-weight:bold'><?php echo($waitSecond); ?></span> 秒后自动跳转,也可直接点击<a id='href' href="<?php echo($url); ?>" style='color:#395690'>立即跳转</a></p>			
            <script type="text/javascript">
             (function(){
                var wait = document.getElementById('wait');
                var interval = setInterval(function(){
                   var time = --wait.innerHTML;
                   if(time <= 0) {
                       location.href = document.getElementById('href').href;
                       clearInterval(interval);
                   };
                }, 1000);
             })();
            </script>
        </dd>
    </dl>
    <div class="c"></div>
    </div>
    <div class="Prompt_btm"></div>
  </div>
</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理后台</title>
<link rel="stylesheet" href="/public/manage/css/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/public/manage/css/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/public/manage/css/invalid.css" type="text/css" media="screen" />	
<script type="text/javascript" src="/public/js/jquery.js"></script>
<script type="text/javascript" src="/public/manage/scripts/simpla.jquery.configuration.js"></script>
<script type="text/javascript" src="/public/manage/scripts/facebox.js"></script>
<script type="text/javascript" src="/public/manage/scripts/jquery.wysiwyg.js"></script>
</head>
<script language="javascript">
$(document).ready(function(){
	$(".button").click(function(){
		$(this).attr({"disabled":"disabled"});
		var username = $("input[name=cname]").val();
		var password = $("input[name=cpwd]").val();
		$.ajax({
			type:		"POST",
			url:		"/manage/login",
			data:		{'cname':username,'cpwd':password},
			dataType:	"JSON",
			success:	function(res){
							$(".button").removeAttr("disabled");
							var info = '';
							if(res.stat == 0){
								info = '登录成功 ... 请稍等';
								$("#logininfo").html(info).show();
								widow.location.href = "/manage";
							} else {
								info = '登录失败 请重试';
								$("#logininfo").html(info).show();
							}
						},
			error:		function(){
							$(".button").removeAttr("disabled");
							var info = '网络故障 请稍后重试';
							$("#logininfo").html(info).show();
						}
		});
	});
});
</script>
  
<body id="login">
    <div id="login-wrapper" class="png_bg">
        <div id="login-top">
            <h1>后台管理</h1>
            <img id="logo" src="/public/manage/images/logo.png" alt="Simpla Admin logo" />
        </div>
        <div id="login-content">
            <form method="post">
                <div class="notification information png_bg">
                    <div id="logininfo">
                        请输入您的用户名和密码！
                    </div>
                </div>
                <p>
                    <label>用户名：</label>
                    <input class="text-input" type="text" name="cname" />
                </p>
                <div class="clear"></div>
                <p>
                    <label>密码：</label>
                    <input class="text-input" type="password" name="cpwd" />
                </p>
                <div class="clear"></div>
                <p id="remember-password">
                    <input type="checkbox" />记住账户
                </p>
                <div class="clear"></div>
                <p>
                    <input class="button" type="submit" onclick="javascript:return false" value="登录" />
                </p>
            </form>
        </div>
    </div>
</body>
</html>

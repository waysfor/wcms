<!DOCTYPE html>
<html lang="en">
<head>
<title>很抱歉，该页面不存在</title>
<style type="text/css">

::selection{ background-color: #E13300; color: white; }
::moz-selection{ background-color: #E13300; color: white; }
::webkit-selection{ background-color: #E13300; color: white; }

body {
	background-color: #fff;
	margin: 40px;
	font: 13px/20px normal Helvetica, Arial, sans-serif;
	color: #4F5155;
}

a {
	color: #003399;
	background-color: transparent;
	font-weight: normal;
}

h1 {
	color: #444;
	background-color: transparent;
	border-bottom: 1px solid #D0D0D0;
	font-size: 19px;
	font-weight: normal;
	margin: 0 0 14px 0;
	padding: 14px 15px 10px 15px;
}

code {
	font-family: Consolas, Monaco, Courier New, Courier, monospace;
	font-size: 12px;
	background-color: #f9f9f9;
	border: 1px solid #D0D0D0;
	color: #002166;
	display: block;
	margin: 14px 0 14px 0;
	padding: 12px 10px 12px 10px;
}

#container {
	margin: 10px;
	border: 1px solid #D0D0D0;
	-webkit-box-shadow: 0 0 8px #D0D0D0;
}

p {
	margin: 12px 15px 12px 15px;
}
</style>
<script src='/public/js/jquery.js'></script>
</head>
<body>
	<div id="container">
		<h1><?php echo $heading; ?></h1>
		<?php echo $message; ?>
	</div>
	<script language="javascript">
		var timer = 5;
		function goto(){
			if(timer == 0){
				if(document.referrer == ''){
					var ourl = 'http://www.error.com/';
				} else {
					var ourl = document.referrer;
				}
				var curl = document.URL;
				var durl= /\.(.*?)\.(.*?)\//g;
				odomain = ourl.match(durl);
				cdomain = curl.match(durl);
				wdomain = "http://www"+cdomain[0].slice(0,-1);
				if(odomain.toString() == cdomain.toString()){
					history.go(-1);
				} else {
					window.location.href = wdomain;
				}
			} else {
				timer--;
				$("#second").html(timer);
				setTimeout("goto()",1000);
			}
		}
		$(function(){
			goto();
		})
	</script>
</body>
</html>
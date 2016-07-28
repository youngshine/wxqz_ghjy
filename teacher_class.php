
<?php
/*
	require_once "script/weixinJS/jssdk-userinfo.php";

	$code = $_GET["code"];

	$corpid = "wx09e87ee7559bb52f";
	$corpsecret = "PejuuyVL8COKUOWfSfaEOFnxzV9mz3yd5hQsQr2z9UmHmlXLsA2SR8ChV9Zf0-00";

	$jssdk = new JSSDK($corpid, $corpsecret,$code);
	$userId = $jssdk->getUserInfo();
*/
	//setcookie("userId",'ys');
	//$userId = $_COOKIE["userId"];
	//echo $userId;
	//$userId = $_GET["userId"];
?>

<!DOCTYPE html>
<html>
  <head>
    <title>大小班级上课</title>
	<meta charset="utf-8" />
	<meta name="format-detection" content="telephone=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui">	
	<!-- 
	<link rel="stylesheet" href="//cdn.kik.com/app/2.0.1/app.min.css">
		-->
	<link rel="stylesheet" href="src/app.min.css">	
	<style>
		.app-topbar {background:#E82;}
		
		/*  msg box */
		#m {
			filter: alpha(opacity=30);
			-moz-opacity: 0.3; 
			opacity: 0.3;
			position:absolute;
			z-index:10000;
			background-color:none;
		}
		#lo {
			position:absolute;
			width:150px;
			height:90px;
			line-height:90px;
			background-color:#000;
			color:#fff;
			text-align:center;
			z-index:9999;
	
			filter: alpha(opacity=70);
			-moz-opacity: 0.7; 
			opacity: 0.7;
			
			border-radius:10px;
			-moz-border-radius:10px; /* Old Firefox */
		} /* ends - msg box */
		.list {
			margin:5px 0;
		}
		.list .listItem {
			background: #fcfcfc;
			padding: 10px 15px;
			border: 0px solid #fff;
			margin:5px;
			border-radius:10px;
			-moz-border-radius:10px; /* Old Firefox */
		}
	</style>
  </head>

  <body>
	  
    <div class="app-page" data-page="home">
      <div class="app-topbar">
          <div class="app-title">大小班上课</div>
      </div>
      <div class="app-content">
    	<div class="list">
    	  <div class="listItem">
    	    <div class="title"></div>
  			<div class="subtitle">
  				<span>上课周期：</span>
  				<span class="weekday"></span>
    		</div>
			<!-- 隐藏id -->
  			<div class="userId" style="display:none;"></div>
  			<div class="id" style="display:none;"></div>		
    	  </div>
    	</div>
	  </div>	  
    </div>
	  
    <div class="app-page" data-page="attendee">
      <div class="app-topbar">
        <div class="app-button left" data-back data-autotitle></div>
        <div class="app-title">点名</div>
		<div class="right app-button hist" style="font-size:2.5em;">历史记录</div>
      </div>
      <div class="app-content">
		  <ul class="app-list">
		    <li>
				<span class="name"></span>
				<!-- 默认选中，不隐藏display:none-->
				<span class="checked" style="float:right;">✔</span>
				<!-- 学生微信，用于发送模版消息 -->
				<span class="wxID" style="display:block;"></span>
				<span class="id" style="display:block;"></span>
		    </li>
		  </ul>

			<div style="margin:10px">
				<div class="app-button finish" style="display:none;color:red;">选择学生，点名</div>	 
			</div>	
		</div>
	
    </div>
	

    <script src="src/zepto.js"></script>
    <script src="src/app.min.js"></script>
	
	<script src="js/main.js"></script>		
	<script src="js/teacher_class.js"></script>
	
	<!-- js-sdk wxSig 签名 -->
	<script type="text/javascript" src = "http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>

	<script>
		// 中文参数，解决乱码。location.search就无效
		var url = decodeURI(window.location);
		//alert(url)

		//采用正则表达式获取地址栏参数
		function getQueryString(param){
		     var reg = new RegExp("(^|&)"+ param +"=([^&]*)(&|$)");
		     //var r = window.location.search.substr(1).match(reg);
			 url = url.substr(url.indexOf("?") + 1); //取得所有参数
			 var r = url.match(reg);
		     if(r!=null)return  unescape(r[2]); return null;
		}
	
		// 全局变量，你的校区，微信号，姓名
		gUserID = getQueryString("userId");
		gUserName = getQueryString("userName")
		gSchoolID = getQueryString("schoolID");// 扩展属性
		//alert("学校："+gSchoolID);
	
		App.load('home');

	</script>
  </body>
</html>

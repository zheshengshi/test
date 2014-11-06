<?php session_start(); ?>
<meta charset="utf-8">
<html>
<head>
	<title>網路測速工程</title>
	<style >
	a:link 		{color:black;}
	a:visited 	{color:green;}
	a:hover 	{color:yellow;}
	.context {font-family: 華康粗黑體;}
	.title	 {font-family: 華康粗黑體 ; color: aqua}
	</style>
</head>
<body style="background-image:url(back_nfu.jpg);background-size:contain">

<img src="每頁標題.jpg" align="left" hspace="270" width="800" height="100"><br /><br /><br /><br /><br /><br /><br /><br />

<div align="left">
	<p class="context" > RTT(Round Trip Time):封包來回時間　</a><br />
	   是指經由某ISP公司的網路，傳送一個封包至國內或國外的網路節點，並收到回應的所需時間。
	</P>
</div>
<div align="right">
	<!-- <a href="index new.php" STYLE="text-decoration:none">回上一頁</a> -->
	<!-- <a href="logout.php" STYLE="text-decoration:none">登出</a>  <br><br> -->
	<input type="button" value="上一頁" onclick="self.location.href='index new.php'"/>
    <input type="button" value="登出" onclick="self.location.href='logout.php'"/>
</div>
<?php
// include('incsession.php');
include('ping_speed.php');
require('config.php');


?>


</body>
</body>
</html>
<?php session_start(); ?>
<meta charset="utf-8">
<html>
<head>
	<title>網路測速工程</title>
	<style >
	a:link 		{color:black;}
	a:visited 	{color:green;}
	a:hover 	{color:yellow;}
	.context {font-family: 標楷體;}
	.title	 {font-family: 華康粗黑體 ; color: aqua}
	</style>
</head>
<body style="background-image:url(back_nfu.jpg);background-size:contain">

<img src="每頁標題.jpg" align="left" hspace="270" width="800" height="100"><br /><br /><br /><br /><br /><br /><br /><br />

<div align="left">
	
</div>
<div align="right">
	<!-- <a href="index new.php" STYLE="text-decoration:none">回上一頁</a> -->
	<!-- <a href="logout.php" STYLE="text-decoration:none">登出</a>  <br><br> -->
	<input type="button" value="上一頁" onclick="self.location.href='index new.php'"/>
    <input type="button" value="登出" onclick="self.location.href='logout.php'"/>
</div>
<?php
// include('incsession.php');
include('iperf_speed.php');
require('config.php');


?>


</body>
</body>
</html>
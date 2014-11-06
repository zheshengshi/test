<?php session_start(); ?>
<meta charset="utf-8">
<html>
<head>
	<title>網路測速工程</title>
	<style >
	a:link 		{color:black;}
	a:visited 	{color:brown;}
	a:hover 	{color:yellow;}
	.context {font-family: 華康粗黑體;}
	.title	 {font-family: 華康粗黑體 ; color: aqua}
	</style>
</head>
<body style="background-image:url(back.jpg);background-size:contain">


<img src="每頁標題.jpg" align="left" hspace="270" width="800" height="100"><br /><br /><br /><br /><br /><br /><br /><br />


<?php
	include('incsession.php');
	require('config.php');

	echo "歡迎 : ".$id;

?>

<div align="right">
	<!-- <a href="logout.php" STYLE="text-decoration:none">登出</a>  <br><br> -->
	<input type="button" value="登出" onclick="self.location.href='logout.php'"/> <br><br>
</div>

<P class="context">Iperf :<br />
	&nbsp &nbsp Iperf 是一個 TCP/IP 和 UDP/IP 	的性能測量工具，能夠提供網路吞吐率信息，以及震動、丟包率、最大段和最大傳輸單元大小等統計信息；從而能夠幫助我們測試網路性能。
</P>
<P class="context">Ifstat :<br />
	&nbsp &nbsp Ifstat 是一個網絡流量監測程序，能查看網卡的流出和流入，我們用於區別網路有人使用與無人使用之數據。
</P>
<div style="font-size:26px" class="context">查看數據:<br />
	&nbsp &nbsp <a class="context" href="iperf.php">iperf_data</a><br />
	&nbsp &nbsp <a class="context" href="ifstat.php">ifstat_data</a><br />
	&nbsp &nbsp <a class="context" href="ping.php">ping_data</a><br />
	<div style="font-size:26px" class="context">查看圖表:<br />
	&nbsp &nbsp <a class="context" href="iperf_chart.php">iperf_chart</a><br />
	&nbsp &nbsp <a class="context" href="ifstat_chart.php">ifstat_chart</a><br />
	&nbsp &nbsp <a class="context" href="ping_chart.php">ping_chart</a><br />
	</div>
</div>

</body>

</html>
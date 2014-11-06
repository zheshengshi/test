<meta charset="utf-8">
<html>
	<head>
	<title>Login</title>
	<style >
	a:link 		{color:black;}
	a:visited 	{color:green;}
	a:hover 	{color:yellow;}
	.context {font-family: 標楷體;}
	.title	 {font-family: 華康粗黑體 ; color: aqua}
	</style>
	
	</head>
<body style="background-image:url(back.jpg);background-size:contain">


<!--H1 align=left><FONT face="標楷體" color ="blue">虎科大學生校外租屋頻寬檢測</FONT></H1-->
<img src="標題.jpg" align="left"><br /><br />
<h1 class="title">Welcome to NFU student</h1>
<h1 class="title"> &nbsp;&nbsp;&nbsp;speed test</h1>
<P style="font-size:20px" class="context"><br />

	學生校外租屋頻寬檢測，其目的是讓賃居校外之本校學生能夠有一個隨時監控網速，並將所有數據有效的統計與整理的工具，檢視ISP提供的網路速度是否符合實際速度。
</P>

<hr size="5" align="center" noshade width="100%" color="green">

<form action="actionlogin.php" method="POST">

<center>
ID:<br />
<input type="text" name="id">
<br />
Password:<br />
<input type="password" name="password">
<br />
<input type="submit" name="submit" value="Login">
<input type="hidden" name="refer" value="<?php echo (isset($_GET['refer'])) ? $_GET['refer'] : 'index new.php'; ?>">
</center>
<img align=right src="test1.gif" style="opacity=0.8">

<p style="font-size:20px" class="context">
<a class="context" href="http://www.nfu.edu.tw/main.php">虎科大-首頁</a><br />
<a class="context" href="http://e3.nfu.edu.tw/ecampus3p/learn/">虎科大-E3平台</a><br />
<a class="context" href="http://www.nfu.edu.tw/inlet/pages.php?ID=Students">虎科大-在校生(使用者平台)</a>
</p>

<center>


</form>
</body>
</html>
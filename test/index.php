<?php session_start(); ?>
<meta charset="utf-8">
<html>
<head>
<title>網路測速工程</title>
</head>
<body>

<p>會員專區</p>



<?php
include('incsession.php');
include('speed1.php');
require('config.php');
echo $_SESSION['id'];
// echo "session_id:".session_id();


$id=$_SESSION['id'];				//取出存在session裡面的值!!!!!!!!!!!!!
echo '<a href="logout.php">登出</a>  <br><br>';
	if ($_SESSION['id']!=null) {
		echo 'Seize the Day';
		$sql = "SELECT *
				FROM student
				INNER JOIN ifstat_data 
				ON student.device_number=ifstat_data.device_number
				where id='$id'";
        $result = mysql_query($sql);
        while($row = mysql_fetch_row($result))
        {
                 echo "$row[0] - 名字(帳號)：$row[1], " . 
                 "電話：$row[3], 地址：$row[4], 備註：$row[5], 備註：$row[5], 備註：$row[5], 備註：$row[5], 備註：$row[5], 備註：$row[5], 備註：$row[5], 備註：$row[5]<br>";
        }
	}
echo "歡迎您".$id;

?>

</body>
</body>
</html>
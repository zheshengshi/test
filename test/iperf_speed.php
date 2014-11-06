<?php session_start(); ?>
<meta charset="utf-8">
<?php
require('config.php');

$id=$_SESSION['id'];				//取出存在session裡面的值!!!!!!!!!!!!!


$con = mysql_connect($db_host, $db_user, $db_pass);
mysql_select_db($db_name, $con);

$query = "  SELECT iperf_data.timestamp,iperf_data.interval,iperf_data.transferred
				   ,iperf_data.bandwidth,iperf_data.server_ip,iperf_data.client_ip,iperf_data.client_port
			FROM student
			INNER JOIN iperf_data 
			ON student.device_number=iperf_data.device_number
			where id='$id'";
$result=mysql_query($query) or die ('Error in query');

/*echo "<table width='400' border='1'><tr align>";
$a=0;
$j=0;
while ($a<mysql_num_fields($result)) {
		$meta=mysql_fetch_field($result,$a);
		echo "<tr>";
		echo "<td>$meta->name</td>";
		echo "<td>$meta->type</td>";
		echo "<td>$meta->max_length</td>";
		echo "</tr>";
		$a++;
}*/


$sentback_a = array();	
$sentback_b = array();
$sentback_c = array();
while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
	$row_b=$row['bandwidth'];
	$row_b=$row_b/1024/1024;
	array_push($sentback_b, $row_b);

	$row_a=$row['transferred'];
	$row_a=$row_a/1024/1024;
	array_push($sentback_a, $row_a);

	$row_c=$row['timestamp'];
	
	$split= "-";
	$split1= "_";
	$row_c = substr($row_c,0,4).$split.substr($row_c,4,2).$split.substr($row_c,6,2).$split1.substr($row_c,8);
	array_push($sentback_c, $row_c);
	/**/
}

	


//echo "$sentback_c[0]";
//echo "$str";



echo "<div class=out1 style='text-align:center' size='4'>";							//要在php裡面用html 使用echo即可
echo "伺服器 IP:".mysql_result($result,1,4)."&nbsp;&nbsp;&nbsp;&nbsp;"; 
echo "租屋處 IP:".mysql_result($result,1,5);
echo "</div>";
//echo mysql_result($result1);

echo "</table>";

//顯示總表格
echo "<table border='1' align='center'><tr align='center' bgcolor='#b3e7ff'>";

$x = array('測速日期','測試花的時間/秒(開始-結束)','資料傳輸量(MB)','頻寬傳輸速率(Mbps)');
for ($i=0; $i < 4; $i++) { 
	echo "<td><font face='華康粗黑體' size='4'>"."$x[$i]"."</td></font>";				//更改字體
	
 }

/*for ($i=0; $i < mysql_num_fields($result); $i++) {				//mysql_num_fields( )傳回結果中欄位的數目
	echo "<td>".mysql_fetch_field($result, $i)->name."</td>";	 //mysql_fetch_field --- 取得欄位資訊(名稱)   語法:object mysql_fetch_field (int result [, int])
}*/
echo "</tr align='center'>";
for ($j=0; $j < mysql_num_rows($result); $j++) { 				//mysql_num_rows --- 取得結果中列的數目 
	echo "<tr align='center'>";
	for ($k=0; $k < mysql_num_fields($result); $k++) {
		if($k==1)
			echo "<td>"."$sentback_c[$j]"."</td>";				//timestamp
		if($k==2)
			echo "<td>"."$sentback_a[$j]"."</td>";				//transferred
		if($k==3)
			echo "<td>"."$sentback_b[$j]"."</td>";				//bandwidth
		if($k==4)												//只留前面五欄
			break;
		if($k!=3 && $k!=2 && $k!=0)
		echo "<td>".mysql_result($result, $j,$k)."</td>";		//mysql_result --- 取得結果資料  語法:int mysql_result (int result, int row [, mixed field])
	}
	echo "</tr align='center'>";
	
}
echo "</table>";
	



// echo "id:".mysql_num_rows(result);
// echo "包含".mysql_num_fields(result);
// $db_selected=mysqli_select_db("susers") or die("can't open surser database<br>".mysql_error()); //選擇資料庫abc


?>
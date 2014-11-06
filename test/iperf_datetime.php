<?php session_start(); ?>
<meta charset="utf-8">
<?php
require('config.php');


$id=$_SESSION['id'];				//取出存在session裡面的值!!!!!!!!!!!!!


$con = mysql_connect($db_host, $db_user, $db_pass);
mysql_select_db($db_name, $con);

$query = "  SELECT iperf_data.timestamp
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


echo "</table>";


//顯示總表格
echo "<table border='1' align='center'><tr align='center'>";
for ($i=0; $i < mysql_num_fields($result); $i++) {				//顯示欄位名稱
	echo "<td>".mysql_fetch_field($result, $i)->name."</td>";
}
echo "</tr>";
for ($j=0; $j < mysql_num_rows($result); $j++) { 				//顯示欄位內容
	echo "<tr>";
	for ($k=0; $k < mysql_num_fields($result); $k++) {
	
		echo "<td>".mysql_result($result, $j,$k)."</td>";
	
	}

	echo "</tr>";
	
}
echo "</table>";
	



// echo "id:".mysql_num_rows(result);
// echo "包含".mysql_num_fields(result);
// $db_selected=mysqli_select_db("susers") or die("can't open surser database<br>".mysql_error()); //選擇資料庫abc


?>
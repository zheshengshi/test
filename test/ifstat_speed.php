<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
require('config.php');

$id=$_SESSION['id'];				//取出存在session裡面的值!!!!!!!!!!!!!


$con = mysql_connect($db_host, $db_user, $db_pass);
mysql_select_db($db_name, $con);

$query = "  SELECT ifstat_data.timestamp,ifstat_data.Traffic_in,ifstat_data.Traffic_out
			FROM student
			INNER JOIN ifstat_data 
			ON student.device_number=ifstat_data.device_number
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
echo "<table border='1' align='center'><tr align='center' bgcolor='#b3e7ff'>";

$x = array('測速日期','測速盒wan端流進資料量(KB)','測速盒wan端流出資料量(KB)');
for ($i=0; $i < 3; $i++) { 
	echo "<td><font face='華康粗黑體' size='4'>"."$x[$i]"."</td></font>";				//更改字體
	
 }

/*for ($i=0; $i < mysql_num_fields($result); $i++) {				//mysql_num_fields( )傳回結果中欄位的數目
	echo "<td>".mysql_fetch_field($result, $i)->name."</td>";   //mysql_fetch_field --- 取得欄位資訊(名稱)   語法:object mysql_fetch_field (int result [, int])
}
*/

echo "</tr align='center'>";
for ($j=0; $j < mysql_num_rows($result); $j++) { 				//mysql_num_rows --- 取得結果中列的數目   
	echo "<tr align='center'>";
	for ($k=0; $k < mysql_num_fields($result); $k++) 
		echo "<td>".mysql_result($result, $j,$k)."</td>";		//mysql_result --- 取得結果資料  語法:int mysql_result (int result, int row [, mixed field])
	echo "</tr align='center'>";
	
}
echo "</table>";
	



// echo "id:".mysql_num_rows(result);
// echo "包含".mysql_num_fields(result);
// $db_selected=mysqli_select_db("susers") or die("can't open surser database<br>".mysql_error()); //選擇資料庫abc


?>
<?php session_start(); ?>
<?
	require('config.php');
	$id=$_SESSION['id'];

	date_default_timezone_set('Asia/Taipei');			//用php抓目前時間
	$day=date("Ymd");
	$dayshow=date("Ymd");
	//$day=$day*10000;
	//echo "圖表測試日期:$dayshow";
	$con = mysql_connect($db_host, $db_user, $db_pass);
		   mysql_select_db($db_name, $con);
	$daq="20141104";
	$query = "  SELECT *
				FROM student
				INNER JOIN iperf_data 
				ON student.device_number=iperf_data.device_number
				where id='$id' AND MID( TIMESTAMP , 1 , 8 ) = '$day' ";		//AND timestamp<'$day'	
				
	$result=mysql_query($query) or die ('Error in query');
	

	$sentback_x = array();				//宣告陣列	(bandwidth)
	$sentback_y = array();				//transferred
	//$sentback_z = array();				//datetime
	$sentback_t = array();				//time

	/*print_r($result);
	exit();*/

	//print_r(mysql_fetch_array($result));

	//echo mysql_num_fields($result);


	/*while(mysql_num_fields($result,MYSQL_ASSOC)){		
		 $row_x=$row['time'];
		 array_push($sentback_x, $row_x);	
		 
	}*/

 	while($row = mysql_fetch_array($result,MYSQL_ASSOC)){		
		 //$row_z=$row['timestamp'];
		 $row_t=$row['timestamp'];
		// $row_z=substr ($row_z, 0, 8)."&nbsp;";      //用來比對是否為今日資料

		 $row_t=substr ($row_t, 8, 2)."&nbsp;";		  //用來顯示X軸時間
		// $split= "h";
		// $row_t = substr($row_t,0,2).$split.substr($row_t,2)."&nbsp;";
		// echo  $row_t = substr($row_t,0,5).$split.substr($row_t,5)."&nbsp;";
		 //echo "$row_z &nbsp;";
		 //gif($row_z=$day){
			 //echo "$row_z &nbsp;";
			 array_push($sentback_t, $row_t);
			 $row_x=$row['bandwidth'];
			 array_push($sentback_x, $row_x);
			 $row_y=$row['transferred'];
			 array_push($sentback_y, $row_y);	
		//} 
	}

	
	//print_r($sentback_x);

	/*foreach ($sentback_x as $value) {
	print "Value: $value";
	} 

	for ($i = 0, $cnt = count($sentback_x); $i < $cnt; $i++) {
		print($sentback_x[$i]);
	}*/
 	
// echo "$sentback_x";
	$str=json_encode($sentback_x);
	$str1=json_encode($sentback_y);
	$str2=json_encode($sentback_t);
	//$str = str_replace(array("[","]"), array("",""), $str);        //去除特殊字元：str_replace()函數運用
	//echo "$str";
	//echo "$str2";

?>







<?php session_start(); ?>
<?
	require('config.php');
	$id=$_SESSION['id'];

	date_default_timezone_set('Asia/Taipei');			//用php抓目前時間
	$day=date("Y-m-d");

	$con = mysql_connect($db_host, $db_user, $db_pass);
		   mysql_select_db($db_name, $con);

	$query = "  SELECT *
				FROM student
				INNER JOIN ping_data 
				ON student.device_number=ping_data.device_number
				where id='$id' AND MID( TIMESTAMP , 1 , 10 ) = '$day'";			
				
	$result=mysql_query($query) or die ('Error in query');
	

	$sentback_x = array();				//宣告陣列 rtt_min
	$sentback_y = array();				//rtt_avg
	$sentback_z = array();				//Traffic_out
	$sentback_t = array();				//rtt_max

	/*print_r($result);
	exit();*/

	//print_r(mysql_fetch_array($result));

	//echo mysql_num_fields($result);


	/*while(mysql_num_fields($result,MYSQL_ASSOC)){		
		 $row_x=$row['time'];
		 array_push($sentback_x, $row_x);	
		 
	}*/

 	while($row = mysql_fetch_array($result,MYSQL_ASSOC)){		
		
		 $row_t=$row['timestamp'];
		 $row_t=substr ($row_t, 11, 2)."&nbsp;";		  //用來顯示X軸時間 
		 array_push($sentback_t, $row_t);
		 
		// $split= "h";
		// $row_t = substr($row_t,0,2).$split.substr($row_t,2)."&nbsp;";
		// echo  $row_t = substr($row_t,0,5).$split.substr($row_t,5)."&nbsp;";
		
		 $row_x=$row['rtt_min'];
		 array_push($sentback_x, $row_x);
		 $row_y=$row['rtt_avg'];
		 array_push($sentback_y, $row_y);	
		 $row_z=$row['rtt_max'];
		 array_push($sentback_z, $row_z);			 
		 
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
	$str2=json_encode($sentback_z);
	$str3=json_encode($sentback_t);
	//$str = str_replace(array("[","]"), array("",""), $str);        //去除特殊字元：str_replace()函數運用
	//echo "$str";
//	echo "$str2";
?>







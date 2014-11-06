<?php session_start(); ?>
<?php
require('config.php');

$id = $_POST['id'];
$password = $_POST['password'];
$refer = $_POST['refer'];

if ($id == '' || $password == '')
{
    // No login information
    header('Location: login.php?refer='. urlencode($_POST['refer']));
}
else
{
    // Authenticate user
    $con = mysql_connect($db_host, $db_user, $db_pass);
    mysql_select_db($db_name, $con);
    
    $query = "SELECT device_number, MD5(UNIX_TIMESTAMP() + device_number + RAND(UNIX_TIMESTAMP()))
        guid FROM student WHERE id = '$id' AND password = password('$password')";
        
    $result = mysql_query($query, $con)
    	or die ('Error in query');

    if (mysql_num_rows($result))
    {
        $row = mysql_fetch_row($result);
        // Update the user record
        $query = "UPDATE student SET guid = '$row[1]' WHERE device_number = $row[0]";
            
        mysql_query($query, $con)
        	or die('Error in query');
             $_SESSION['id'] = $device_number;       

        // Set the cookie and redirect
        // setcookie( string name [, string value [, int expire [, string path
        // [, string domain [, bool secure]]]]])
        // Setting cookie expire date, 6 hours from now
        $cookieexpiry = (time() + 21600);
        setcookie("session_id", $row[1], $cookieexpiry);
        if (empty($refer) || !$refer)
        {
            $refer = 'index.php';
        }

        header('Location: '. $refer);
    }
    else
    {
        // Not authenticated
        header('Location: login.php?refer='. urlencode($refer));
    }
}
?>
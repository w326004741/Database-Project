
<?php
 $host = "mysql1.it.nuigalway.ie";
 $username = "mydb4147ab";
 $password = "ga0byj";
 $database = "mydb4147";

//error_reporting(0);// With this no error reporting will be there

// connect to a database
$conn=mysqli_connect($host,$username,$password,$database);
if (!$conn) {
    echo "Error: Unable to connect to MySQL.<br>";
    echo "<br>Debugging errno: " . mysqli_connect_errno();
    echo "<br>Debugging error: " . mysqli_connect_error();
    exit;
}
 
?>
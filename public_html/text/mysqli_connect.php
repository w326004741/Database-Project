<?php
// Opens a connection to the database
// Since it is a php file it won't open in a browser 
// It should be saved outside of the main web documents folder
// and imported when needed
 

 
// Defined as constants so that they can't be changed
DEFINE ('DB_USER', 'mydb4147ab'); // database username
DEFINE ('DB_PASSWORD', 'ga0byj'); // database password
DEFINE ('DB_HOST', 'mysql1.it.nuigalway.ie'); // database host
DEFINE ('DB_NAME', 'mydb4147'); // database name
  
// $dbc will contain a resource link to the database
// @ keeps the error from showing in the browser
 
$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL: ' .
mysqli_connect_error());
?>
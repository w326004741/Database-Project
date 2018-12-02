<?php
// Get a connection for the database
include_once 'includes/db_connect.php';
if($conn === false){
    die("ERROR: Could not connection. ". mysqli_connect_error());
}

$productID = mysqli_escape_string($conn, $_GET['ProductID']);


// delete the query
$sql = "DELETE FROM products WHERE ProductID = $productID ";

if(mysqli_query($conn,$sql)){
    echo "<div align='center'><img align='middle' class='image' src='https://gatesbbq.com/wp-content/uploads/2017/04/checkmarksuccess.gif' width='700' height='500'></div>";
    echo "<h1 align='center' style='color:red;'>Deleted Successfully !</h1>";
    header("refresh:1.5, url=http://danu6.it.nuigalway.ie/dbDeliverable/text/viewProduct.php");
}else {
    echo "ERROR: Could not able to excute $sql. " . mysqli_error($link);
}

mysqli_close($conn);
?>
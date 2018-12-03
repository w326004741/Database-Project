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
    header("refresh:1.5, url=text/viewProduct.php");
}else {
    echo "<div align='center'><img align='middle' class='image' src='https://cdn.dribbble.com/users/24613/screenshots/3302270/error.gif' width='700' height='500'></div>";
    echo "<p align='center' style='color:red;'><b>ERROR: Could not DELETE, the product in order already<b></p>" ;
    header("refresh:4, url=text/viewProduct.php");
}

mysqli_close($conn);
?>
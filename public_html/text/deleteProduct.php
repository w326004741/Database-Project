<?php


// Get a connection for the database 面向过程风格
$link = mysqli_connect("mysql1.it.nuigalway.ie", "mydb4147ab", "ga0byj", "mydb4147");
//check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


// 
//$ProductID = mysqli_real_escape_string($link, $_GET['ProductID']);
$productID = mysqli_escape_string($conn, $_GET['ProductID']);

// delete the query
$sql = "DELETE FROM products WHERE ProductID = $productID ";

// $sql = "DELETE FROM products WHERE ProductID = $ProductID";
if(mysqli_query($link, $sql)){
    echo "<div align='center'><img align='middle' class='image' src='https://gatesbbq.com/wp-content/uploads/2017/04/checkmarksuccess.gif' width='700' height='500'></div>";
    echo "<h1 align='center' style='color:red;'>Deleted Successfully !<br>Page will return in 3 Seconds</h1>";
    header("refresh:3, url='http://danu6.it.nuigalway.ie/dbDeliverable/text/viewProduct.php'");
} else {
    echo "Not deleted";
}
// Close connection
mysqli_close($link);
?>
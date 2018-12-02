

<title>View Product Details</title>

<?php
// connect database
$link = mysqli_connect("mysql1.it.nuigalway.ie", "mydb4147ab", "ga0byj", "mydb4147");
 

//check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security . $(name)应该和addProduct.php中的Input name一样
$ProductName = mysqli_real_escape_string($link, $_REQUEST['ProductName']);

$Price = mysqli_real_escape_string($link, $_REQUEST['Price']);
$Unit = mysqli_real_escape_string($link, $_REQUEST['Unit']);
$CategoryID = mysqli_real_escape_string($link, $_REQUEST['CategoryID']);

// Attemp insert query execution
$sql = "INSERT INTO products (ProductName, Price, Unit, CategoryID) VALUES ('$ProductName', '$Price', '$Unit', '$CategoryID');";
if(mysqli_query($link, $sql)){
    echo "<div align='center'><img align='middle' class='image' src='https://gatesbbq.com/wp-content/uploads/2017/04/checkmarksuccess.gif' width='700' height='500'></div>";
    echo "<h1 align='center' style='color:red;'>Added Successfully !</h1>";
    header("refresh:1.5, url=viewProduct.php");
} else {
    echo "ERROR: Could not able to excute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
?>
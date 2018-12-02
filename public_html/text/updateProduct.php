
<title>Update Product</title>
<?php 

// Get a connection for the database
require_once 'mysqli_connect.php';
//check connection
if($dbc === false){
    die("ERROR: Could not connection. ". mysqli_connect_error());
}

$ProductID = mysqli_escape_string($dbc, $_POST['ProductID']);
$ProductName = mysqli_escape_string($dbc, $_POST['ProductName']);
$Price = mysqli_escape_string($dbc, $_POST['Price']);
$Unit = mysqli_escape_string($dbc, $_POST['Unit']);
$CategoryID = mysqli_escape_string($dbc, $_POST['CategoryID']);

// Attempt insert query execution
$sql = "UPDATE products SET ProductName = '$ProductName', Price = '$Price', Unit = '$Unit', CategoryID = '$CategoryID' WHERE ProductID = '$ProductID';";
if(mysqli_query($dbc, $sql)){
    echo "<div align='center'><img align='middle' class='image' src='https://gatesbbq.com/wp-content/uploads/2017/04/checkmarksuccess.gif' width='700' height='500'></div>";
    echo "<h1 align='center' style='color:red;'>Update Successfully !</h1>";
    header("refresh:1.5, url=http://danu6.it.nuigalway.ie/dbDeliverable/text/viewProduct.php");
}else {
    echo "ERROR: Could not able to execute $sql." . mysqli_error($dbc);
}
 
// Close connection
mysqli_close($dbc);
?>
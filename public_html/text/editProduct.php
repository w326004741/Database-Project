
<?php echo file_get_contents('html/header1.html'); ?>
<?php  
// Get a connection for the database
require_once 'mysqli_connect.php';

$ProductID = mysqli_escape_string($dbc, $_GET['ProductID']);

$sql = "SELECT ProductName, Price, Unit, CategoryID FROM products WHERE ProductID = $ProductID";

// Get a response from the database by sending the connection
// and the query
$result = mysqli_query($dbc, $sql);
?>

<?php
    $row = mysqli_fetch_assoc($result);
        $ProductName = $row['ProductName'];
        $Price = $row['Price'];
        $Unit = $row['Unit'];
        $CategoryID = $row['CategoryID'];
?>



<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <title>Edit Product</title>
      <h1 align="center"> Update Student </h1>
   </head>

   <body>
        <div class="container" id="editProduct"  align="center">

            <form action="updateProduct.php" method="post"> 

                <form>
                    <div class="form-group">
                        <label for="InputProductID">Product ID</label>
                        <input name="ProductID" type="text" class="form-control" id="inputProductID" size="10" value="<?php echo $ProductID; ?>" disabled>
                    </div>

                    <div class="form-group">
                        <label for="InputProductName">Product Name</label>
                        <input name="ProductName" type="text" class="form-control" id="inputProductName" size="50" value="<?php echo $ProductName; ?>" />
                    </div>

                    <div class="form-group">
                        <label for="InputCategoryID">CategoryID</label>
                        <input name="CategoryID" type="text" class="form-control" id="inputCategoryID" size="10" value="<?php echo $CategoryID; ?>" />
                    </div>

                    <div class="form-group">
                        <label for="InputPrice">Price</label>
                        <input name="Price" type="text" class="form-control" id="inputPrice" size="30" value="<?php echo $Price; ?>" />
                    </div>

                    <div class="form-group">
                        <label for="InputUnit">Unit</label>
                        <input name="Unit" type="text" class="form-control" id="inputUnit" size="30" value="<?php echo $Unit; ?>" />
                    </div>

                    <div class="form-group">
                        <p>
                        <input name="ProductID" type="hidden" class="form-control" id="inputProductID" value="<?php echo $ProductID; ?>" />
                        </p>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </form>
        </div>
   </body>
</html>

<?php 
    mysqli_close($dbc);
 ?>
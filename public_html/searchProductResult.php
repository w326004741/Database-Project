<?php
// Get a connection for the database
include_once 'includes/db_connect.php';

$search_value = mysqli_real_escape_string($conn, $_POST['search_value']);
$search = mysqli_real_escape_string($conn, $_POST['SEARCH']);
if(!empty($search) && !empty($search_value)) {

   $e = $search_value;

   $query = 'SELECT * FROM products WHERE ' .
           "ProductName LIKE '%$e%' OR " .
           "ProductID LIKE '%$e%';";
$result=mysqli_query($conn, $query);
$result_check=mysqli_num_rows($result);
// echo "The number of rows is " . $result_check;
?>

<html>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <title>Search Result</title>
   </head>
 <body>
      <!-- <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"> -->
      <form method="post" action="searchProductResult.php">
      <br>
        <table align="center">
            <tr>
                 <td>
                    <div class="input-group mb-3">
                       <input type="text" class="form-control" name="search_value" size="30" maxlength="30" placeholder="enter product name or id">
                           <div class="input-group-append">
                               <input class="btn btn-info" type="submit" name="SEARCH" value="Search"/>
                           </div>
                     </div>                     
                  </td>
             </tr>
          </table>
      </form>
     
<div class="container">
   <table class="table table-striped" align="center" cellspacing="5" cellpadding="8">
<tr>
<th align="center"><b> ProductID</b></th>
<th align="center"><b> ProductName</b></th>
<th align="center"><b>Price</b></th>

</tr>
</div>

<?php
   while($row =mysqli_fetch_assoc($result)){
      $ProductID=$row['ProductID'];
      $ProductName=$row['ProductName'];
      $Price=$row['Price'];
      ?>
 <tr>
 <td> <?php echo $ProductID; ?></td>
 <td> <?php echo $ProductName; ?></td>
 <td> <?php echo $Price; ?></td>
 </tr>
   <?php } ?>
 </table>

<?php
}
else {
header("refresh:0, url=searchProduct.php");
}
mysqli_close($conn);
?>
   </body>
</html>
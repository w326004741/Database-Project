<?php echo file_get_contents('html/header1.html'); ?>
<title>Popular Products Top 10</title>
<?php
// echo file_get_contents(): read entire file into the string 将整个文件读入一个字符串；
// Get a connection for the database
require_once 'mysqli_connect.php';

// Create a query for the database
$query = "SELECT products.ProductID as 'ProductID',ProductName,CategoryID,Unit,Price,sum(quantity) as 'total' FROM products
INNER join order_details on products.ProductID = order_details.ProductID
GROUP by products.ProductID,ProductName,CategoryID,Unit,Price
order by sum(quantity) desc Limit 10";

// Get a response from the database by sending the connection and the query
// 通过发送连接和查询从数据库获取响应
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed 如果查询执行正确，继续
if ($response) {
    // Table design in here
    echo '
<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<head></head>
<body>
<br>
<div class="w3-container w3-teal bg-while  ">
  <h1 align="center">Top 10 of Popular Products</h1>
</div>
<br>
<table class="table table-striped" align="center" cellspacing="5" cellpadding="8" >


<tr>
<td align="center" ><b>ProductID</b></td>
<td align="center" ><b>ProductName</b></td>
<td align="center" ><b>CategoryID</b></td>
<td align="center" ><b>Unit</b></td>
<td align="center" ><b>Quantity</b></td>
<td align="center" ><b>Total quantities sold so far</b></td>




</tr>
</body>
</html>';

    // mysqli_fetch_array will return a row of data from the query
    // until no further data is available
    // mysqli_fetch_array将返回查询中的一行数据，直到没有其他数据可用
    while ($row = mysqli_fetch_array($response)) {
        echo '<tr><td align="center">'.$row['ProductID']
            .'</td><td align="center">'.$row['ProductName']
            .'</td><td align="center">'.$row['Price']
            .'</td><td align="center">'.$row['CategoryID']
            .'</td><td align="center">'.$row['Unit']
            .'</td><td align="center">'.$row['total']
            .'</td>';

        echo '</tr>';
    }

    echo '</table>';
} else {
    echo "Couldn't issue database query<br />";

    echo mysqli_error($dbc);
}

// Close connection to the database
mysqli_close($dbc);
?>

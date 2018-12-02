<?php echo file_get_contents('html/header1.html'); ?>
<?php
// echo file_get_contents(): read entire file into the string 将整个文件读入一个字符串；

// Get a connection for the database
require_once('mysqli_connect.php');

// Create a query for the database
$query = "SELECT concat('€ ',round(SUM(price *Quantity),2)) AS 'Profit',count(DISTINCT orders.OrderID) AS 'orders', year(OrderDate) AS 'year' 
FROM products 
INNER JOIN order_details ON products.ProductID = order_details.ProductID 
INNER JOIN orders ON order_details.OrderID = orders.OrderID 
GROUP BY year(OrderDate);";

// Get a response from the database by sending the connection and the query
// 通过发送连接和查询从数据库获取响应
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed 如果查询执行正确，继续
if($response){

    // Table design in here
echo '

<html>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<head></head>
<body>
<br>
<div class="w3-container w3-teal bg-while  ">
  <h1 align="center">Sales Between Years</h1>
</div>
<br>

<div class="container">
<table class="table table-striped" align="center" cellspacing="5" cellpadding="8" >

<tr>
<td align="center" ><b>Profit of the Year</b></td>
<td align="center" ><b>Number of Orders</b></td>
<td align="center" ><b>Year</b></td>
</tr>
</div>
</html>
';


// mysqli_fetch_array will return a row of data from the query
// until no further data is available
// mysqli_fetch_array将返回查询中的一行数据，直到没有其他数据可用
while($row = mysqli_fetch_array($response)){

echo '<tr><td align="center">' .
$row["Profit"] . '</td><td align="center">' .
$row["orders"] . '</td><td align="center">' .
$row["year"] . '</td>';

echo '</tr>';
}

echo '</table>';

} else {

echo "Couldn't issue database query<br />";

echo mysqli_error($dbc);

}

echo '
<html>
</body>
<div class="container" align="center">
<table class="t2">
  <img src="Images/graph.png" alt="Card image cap">

</div>
</html>

';
// Close connection to the database
mysqli_close($dbc);




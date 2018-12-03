<?php echo file_get_contents('html/header1.html'); ?>
<?php
// echo file_get_contents(): read entire file into the string 将整个文件读入一个字符串；

// Get a connection for the database
require_once('mysqli_connect.php');

// Create a query for the database
$query = "SELECT customers.CustomerID as 'customerID',CustomerName,ContactName,Address,City,PostalCode,Country,count(OrderID) as 'total'FROM customers INNER join orders on customers.CustomerID = orders.CustomerID GROUP by customers.CustomerID HAVING count(OrderID) >=(SELECT count(OrderID) FROM `orders` group by CustomerID order by count(OrderID) DESC LIMIT 1)";

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
<div class="w3-container w3-teal">
  <h1 align="center">The Most Valuable Customer from 2015 to 2017</h1>
</div>
<br>
<div class="container">
<table class="table table-striped" align="center" cellspacing="5" cellpadding="8" >

<tr>
<td align="center" ><b>CustomerID</b></td>
<td align="center" ><b>CustomerName</b></td>
    <td align="center" ><b>ContactName</b></td>
<td align="center" ><b>Address</b></td>
<td align="center" ><b>City</b></td>
<td align="center" ><b>PostalCode</b></td>
<td align="center" ><b>Country</b></td>
<td align="center" ><b>total orders Placed sold</b></td>





</tr>
</div>
</body>
</html>
';


// mysqli_fetch_array will return a row of data from the query
// until no further data is available
// mysqli_fetch_array将返回查询中的一行数据，直到没有其他数据可用
while($row = mysqli_fetch_array($response)){

echo '<tr><td align="center">' .
$row["customerID"] . '</td><td align="center">' .
$row["CustomerName"] . '</td><td align="center">' .
$row["ContactName"] . '</td><td align="center">' .
$row["Address"] . '</td><td align="center">' .
$row["City"] . '</td><td align="center">' .
$row["PostalCode"] . '</td><td align="center">' .
$row["Country"] . '</td><td align="center">' .
$row["total"] . '</td>';

echo '</tr>';
}

echo '</table>';

} else {

echo "Couldn't issue database query<br />";

echo mysqli_error($dbc);

}

// Close connection to the database
mysqli_close($dbc);
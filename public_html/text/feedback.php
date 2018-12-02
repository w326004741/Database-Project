<?php echo file_get_contents('html/header1.html'); ?>
<?php
// echo file_get_contents(): read entire file into the string 将整个文件读入一个字符串；

// Get a connection for the database
require_once 'mysqli_connect.php';

// Create a query for the database
$query = "SELECT FeedbackID,a.OrderDetailID as 'OrderDetailID',a.OrderID as 'OrderID',products.ProductName as 'ProductName',products.ProductID as 'ProductID', c.CustomerName as 'CustomerName',
CASE 
when datediff(CURRENT_DATE,date(Time))=0 then concat('comment was posted before few hours') 
when datediff(CURRENT_DATE,date(Time))=1 then concat('comment was posted before 1 day ') 
ELSE concat('comment was posted before ',datediff(CURRENT_DATE,date(Time)),' days ') 
END AS  'Posted' ,Comments FROM feedback 
inner JOIN order_details a on feedback.OrderDetailID = a.OrderDetailID 
INNER join products on products.ProductID = a.ProductID 
INNER join orders b  on b.OrderID = a.OrderID 
INNER join customers c on b.CustomerID = c.CustomerID 
order by FeedbackID ASC";


// Get a response from the database by sending the connection and the query
// 通过发送连接和查询从数据库获取响应
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed 如果查询执行正确，继续
if ($response) {

    // Table design in here
    echo '

<html>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<head></head>
<body>
<br>
<div class="w3-container w3-teal bg-while  ">
  <h1 align="center">Feedback</h1>
</div>
<br>
<div class="container">
<table class="table table-striped" align="center" cellspacing="5" cellpadding="8" >

<tr>
<td align="center" ><b>FeedbackID</b></td>
<td align="center" ><b>OrderDetailID</b></td>
<td align="center" ><b>OrderID</b></td>
<td align="center" ><b>ProductName</b></td>
<td align="center" ><b>Product</b></td>
<td align="center" ><b>CustomerName Quantity</b></td>
<td align="center" ><b>Posted Before</b></td>
<td align="center" ><b>Comments</b></td>

</tr>
</div>
</body>
</html>
';

// mysqli_fetch_array will return a row of data from the query
    // until no further data is available
    // mysqli_fetch_array将返回查询中的一行数据，直到没有其他数据可用
    while ($row = mysqli_fetch_array($response)) {

        echo '<tr><td align="center">' .
            $row["FeedbackID"] . '</td><td align="center">' .
            $row["OrderDetailID"] . '</td><td align="center">' .
            $row["OrderID"] . '</td><td align="center">' .
            $row["ProductName"] . '</td><td align="center">' .
            $row["ProductID"] . '</td><td align="center">' .
            $row["CustomerName"] . '</td><td align="center">' .
            $row["Posted"] . '</td><td align="center">' .
            $row["Comments"] . '</td>';

        echo '</tr>';
    }

    echo '</table>';

} else {

    echo "Couldn't issue database query<br />";

    echo mysqli_error($dbc);

}

// Close connection to the database
mysqli_close($dbc);
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

<head>
<meta charset="utf-8">
<title>Login</title>
</head>

<body>
<?php

// Get a connection for the database
include_once 'includes/db_connect.php';
session_start();

if (isset($_POST['username'])){
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
	
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username'
and password='$password'";

	$result = mysqli_query($conn,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
          echo "<div align='center'><img align='middle' class='image' src='https://gatesbbq.com/wp-content/uploads/2017/04/checkmarksuccess.gif' width='700' height='500'></div>";
          echo "<h1 align='center' style='color:red;'>Login Successfully !</h1>";
          header("refresh:1.5, url=text/home.php");
        }else{
            echo "<div class='form'>
                  <h3>Username/password is incorrect.</h3>
                  <br/>Click here to <a href='login.php'>Login</a></div>";
	          }
        }else{
            ?>
              <div class="wrapper animated bounce">
                <h1><a href="http://danu6.it.nuigalway.ie/dbDeliverable/text/home.php">Login</a></h1>
                <hr>
                <form action="login.php" method="post" name="login">

                  <label class="icon" for="username"><i class="fa fa-user"></i></label>
                  <input type="text" placeholder="Enter your username" id="username" name="username" required />
                  <label class="icon" for="password"><i class="fa fa-key"></i></label>
                  <input type="password" placeholder="Enter your password" id="password" name="password" required />
                  <input name="submit" type="submit" value="Login">
                  <hr>
                  <div class="crtacc"><a href="registration.php">Create Account</a></div>
                </form>
              </div>
              </div>
              </div>
            <?php } ?>

</body>
</html>
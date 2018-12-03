<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

<head>
<meta charset="utf-8">
<title>Registration</title>
</head>
<body>
<?php



// Get a connection for the database
include_once 'includes/db_connect.php';


// If form submitted, insert values into the database.


if (isset($_REQUEST['username'])){
        // removes backslashes
   $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
   $username = mysqli_real_escape_string($conn,$username);
   $email = stripslashes($_REQUEST['email']);
   $email = mysqli_real_escape_string($conn,$email);
   $password = stripslashes($_REQUEST['password']);
   $password = mysqli_real_escape_string($conn,$password);
        $query = "INSERT into `users` (username, password, email)
VALUES ('$username', '$password', '$email')";
        $result = mysqli_query($conn,$query);
        
        
        if($result){
          echo "<div align='center'><img align='middle' class='image' src='https://gatesbbq.com/wp-content/uploads/2017/04/checkmarksuccess.gif' width='700' height='500'></div>";
          echo "<h1 align='center' style='color:red;'>Registered Successfully !</h1>";
          header("refresh:1.5, url=login.php");
        }
      }else{
            
    
?>


<div class="wrapper animated bounce">
  <h1><a href="http://danu6.it.nuigalway.ie/dbDeliverable/text/home.php">Register</a></h1>
  <hr>
  <form action="" method="post" name="registration">
    <label class="icon" for="username"><i class="fa fa-user"></i></label>
    <input type="text" placeholder="Enter your username" id="username" name="username" required />
    <label class="icon" for="password"><i class="fa fa-key"></i></label>
    <input type="password" placeholder="Enter your password" id="password" name="password" required />
    <label class="icon" for="email"><i class="fa fa-at"></i></label>
    <input type="email" placeholder="Email address" id="email" name="email" required />
    <input name="submit" type="submit" value="Register">
    <hr>
  </form>
</div>


<?php } ?>
</body>
</html>
<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <title>Search</title>
   </head>
 <body>
 <!-- <a href="http://danu6.it.nuigalway.ie/dbDeliverable/text/home.php"> Home </a> -->

 <div class= "container" align="center">
 
 <!-- <p> Please enter a search term </p > -->
      <form method="post" action="searchProductResult.php">
          <table align="center">
              <tr>
                <td>
                <a class="navbar-brand" href="http://danu6.it.nuigalway.ie/dbDeliverable/text/home.php">
                  <img class="image" src="https://i.pinimg.com/originals/98/f1/3b/98f13be7284304d89c884bf5064f22c9.gif" width="700" height="500">
                </a>
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
  </div>
  </body>
</html>

<?php echo file_get_contents("html/header1.html"); ?>

<title>Add Product</title>
<br>
<h1 align="center">Add a New Product</h1>



<form action="insertProduct.php" method="post">

<div class="container" id="addProduct">
<form>
  <div class="form-group">
    <label for="InputProductName">Product Name</label>
    <input name="ProductName" type="text" class="form-control" id="inputProductName" aria-describedby="productHelp" placeholder="Enter Product Name">
    <small id="productHelp" class="form-text text-muted">Just Please enter product name 😊</small>
  </div>

  <div class="form-group">
    <label for="InputCategoryID">Category ID</label>
    <input name="CategoryID" type="text" class="form-control" id="inputCategoryID" placeholder="CategoryID">
    <small id="CategoryIDHelp" class="form-text text-muted">Just please enter CategoryID</small>
  </div>

  <div class="form-group">
    <label for="InputUnit">Unit</label>
    <input name="Unit" type="text" class="form-control" id="inputUnit" placeholder="Unit">
    <small id="UnitHelp" class="form-text text-muted">Just please enter unit</small>
  </div>
  
  <div class="form-group">
    <label for="InputPrice">Price</label>
    <input name="Price" type="text" class="form-control" id="inputPrice" placeholder="Price">
    <small id="PriceHelp" class="form-text text-muted">Just please enter price 💰💶</small>
  </div>
  

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</form>

<?php

include('dbconnection.php');
if(isset($_POST['submit'])){
   $name = $_POST['name'];
   $category = $_POST['category'];
   $product_name = $_POST['product_name'];
   $storage = $_POST['storage'];
    $quantity = $_POST['quantity'];
   $status = $_POST['status'];
   $query = mysqli_query($con, "Insert into itemsinuse (name, category_id, product_name, storage_id, quantity,status)
   Values ('$name','$category','$product_name', '$storage','$quantity','$status')");
}

$product_id = $_GET['id']; // Assuming you are passing product ID through URL
$query = mysqli_query($con, "SELECT * FROM product WHERE id='$product_id'");
$product = mysqli_fetch_assoc($query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
<?php include 'navbarr.php' ?>
<ol class="breadcrumb" style="background-color:#c6d3eb;">
<li><a href="dashboard.php">HOME / </a></li>
<li><a href="itemsinuseUpdated.php">ITEMS IN USE / </a></li>		
<li><a href="viewAvailItems.php">AVAIL ITEMS / </a></li>		
		  <li class="active">USE ITEMS</li>
		</ol>
 <form method="POST">


 <div class = "container" style="background-color:#8eaee9;">
<br>
    <div class="form group" style="background-color:#c6d3eb;">
    <br>
    <div class="col-lg-4">
      <label>NAME</label>
      <br>
        <input type ="text" name="name" id="name"> 
</div>
<br>
     </div>
<br>
    
   <div class="form group" style="background-color:#c6d3eb;">
    <br>
    <div class="col-lg-4">
                 <label>SELECT CATEGORY</label><br>
                      <select name="category">
                      <option value="">~~SELECT~~</option>
                       <?php
                          include('dbconnection.php');
                      $categories = mysqli_query($con,"Select * from category");
                   while($c = mysqli_fetch_array($categories)) {
                   ?>
                  <option value="<?php echo $c['category_name'] ?>"> <?php echo $c ['category_name']?></option> ?>
                          <?php } ?>
                     </select>
     <br> 

    <br>
                         <label>SELECT STORAGE</label><br>
                          <select name="storage">
                          <option value="">~~SELECT~~</option>
                            <?php
                                include('dbconnection.php');
                             $storages = mysqli_query($con,"Select * from storage");
                            while($c = mysqli_fetch_array($storages)) {
                              ?>
                              <option value="<?php echo $c['storage_name'] ?>"> <?php echo $c ['storage_name']?></option> ?>
                             <?php } ?>
                          </select>
        </div>
       <br> 
<br>
</div>
<br>
<div class="form group" style="background-color:#c6d3eb;">
  <br>
  <div class="col-lg-4">
   <label>PRODUCT NAME</label>
   <br>
   <input type="text" name="product_name" value="<?php echo $product['product_name']; ?>"><br><br>

    
    <label>QUANTITY</label>
    <input type="text" name="quantity" value="<?php echo $product['quantity']; ?>"><br><br>
   <br>
   <label>Status:</label>
        <input type="text" name="status" value="<?php echo $product['status']; ?>"><br><br>
         

    
    <br>
  </div>
</div>
<br>
   <button class="btn btn-primary" type="submit" name= "submit">ASSIGN</button>
      <br>
      <br>


 </form>
</body>
</html>
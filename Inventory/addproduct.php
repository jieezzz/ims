<?php
include('dbconnection.php');
if(isset($_POST['submit'])){
   $category = $_POST['category'];
   $product_name = $_POST['product_name'];
   $storage = $_POST['storage'];
    $quantity = $_POST['quantity'];
   $status = $_POST['status'];
   $query = mysqli_query($con, "Insert into product (category_id,product_name, storage_id, quantity,status)
   Values ('$category','$product_name', '$storage','$quantity','$status')");
   if($query){
    echo "<script>alter('done') </script>";
    } else {
        echo "<script>alter('error') </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
</head>
<body>
<?php include 'navbarr.php' ?>
 <form method="POST">
 <ol class="breadcrumb" style="background-color:#c6d3eb;">
 <li><a href="dashboard.php">HOME / </a></li>		
        <li><a href="product.php">PRODUCT / </a></li>		
		  <li class="active">ADD PRODUCT</li>
		</ol>


 <div class = "container" style="background-color:#8eaee9;">
<br>
<br>
              <div class="form group" style="background-color:#c6d3eb;">
              <br>
              <label>SELECT CATEGORY</label><br>
                      <select name="category">
                       <?php
                          include('dbconnection.php');
                      $categories = mysqli_query($con,"Select * from category");
                   while($c = mysqli_fetch_array($categories)) {
                   ?>
                  <option value="<?php echo $c['category_name'] ?>"> <?php echo $c ['category_name']?></option> ?>
                          <?php } ?>
                     </select>
                       <br> </br>

                       <label>SELECT STORAGE</label><br>
                          <select name="storage">
                            <?php
                                include('dbconnection.php');
                             $storages = mysqli_query($con,"Select * from storage");
                            while($c = mysqli_fetch_array($storages)) {
                              ?>
                              <option value="<?php echo $c['storage_name'] ?>"> <?php echo $c ['storage_name']?></option> ?>
                             <?php } ?>
                          </select>
                        <br> </br>
               </div>
<br>
               <div class="form group" style="background-color:#c6d3eb;">
                      <label>PRODUCT NAME</label><br>
                         <input type ="text" name="product_name"/> <br/><br/>


                      <label>QUANTITY</label><br>
                           <input type ="text" name="quantity"/> <br/><br/>




                          <label>STATUS</label><br>
                     <input type ="text" name="status"/> <br/><br/>
                     </div>

<br>


                          <button class="btn btn-primary" type="submit" name= "submit" >SUBMIT</button>
                          
                          <div>           
<br>

 </form>
</body>
</html>
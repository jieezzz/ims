<?php
include('dbconnection.php');
if(isset($_POST['submit'])){
   $category = $_POST['category_name'];

   $sql = "Insert into category (category_name)
   Values('$category')";
   $result = mysqli_query($con,$sql);
   if(mysqli_connect_errno()){
    echo "Connection Error" . mysqli_connect_error();
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<?php include 'navbarr.php' ?>
<form method="POST">
<ol class="breadcrumb" style="background-color:#c6d3eb;">
       <li><a href="dashboard.php">HOME / </a></li>		
            <li><a href="category.php">CATEGORY / </a></li>		
		  <li class="active">ADD CATEGORY</li>
		</ol>
        <br>

    <div class = "container" style="background-color:#8eaee9;">
    <br>
        <div class="form group" style="background-color:#c6d3eb;">
        <br>
          <label>INPUT CATEGORY NAME</label><br>
          <input type ="text" name="category_name"/> <br/><br/>
        </div>
        <div class="form">
            <br>
   <button class="btn btn-primary" type="submit"    name= "submit">SUBMIT</button>
   <br>
      </div>
      <br>
</div>
    </class>
</button>

</form>
   
</body>
</html>
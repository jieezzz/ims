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
		  <li class="active">CATEGORY</li>
		</ol>

    <div class="controler">
   
    <div class=  " container my-3">
      <a class = "btn btn-primary" href="addcategory.php" role="button">ADD CATEGORY</a>
    <br>
    <br>
    <div class="panel-heading"  style="background-color:#c6d3eb;"> CATEGORY LIST</div>
    <table class=" table" style="background-color:#8eaee9;">
      <thead>
       <tr>
       <th>ID</th>
      <th>CATEGORY</th>

       </tr>
       <tbody>

<?php
$servername="localhost";
$username="root";
$password="";
$database="ims";

$connection= new mysqli($servername,$username,$password,$database);
if($connection->connect_error){
  die("CONNECTION FAILED: " .$connection->connect_error);
}

 $sql ="SELECT * FROM category";
 $result =$connection->query($sql);
 
 if(!$result){
    die("invalid query: " . $connection->error);
 }
 while($row = $result -> fetch_assoc()){
     echo "    
  <tr>
     <td>$row[id]</td>
     <td> $row[category_name]</td>
     <td>
     <a class='btn btn-danger btn-sm' href= 'deletecategory.php?id=$row[id]'> DELETE</a>
     </td>
   
     </tr>
     
     " ;
    
 }
    
?>
</thead>    
</table>
</tbody>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
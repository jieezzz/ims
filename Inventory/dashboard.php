
<!DOCTYPE html>
<?php 
require_once 'navbarr.php'; 
?>

<html lang="en">
<head>


<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

<link rel="stylesheet" href="assets/navstyle.css">

    <title>Dashboard</title>

    <ol class="breadcrumb" style="background-color:#c6d3eb;">
    <li><a href="dashboard.php">HOME / </a></li>		
		  <li class="active">DASHBOARD</li>
		</ol>

</head>
<body>

 <br>
 <div class ="row">   
  <div class= "col-md-4">
    <div class="card">
      <div class="card-body" style="background-color:#8eaee9;">
        <h5 class="card-title" style="font-color:white;">CATEGORY</h5>
        <a class='btn btn-primary btn-sm' href='category.php'> View</a>
      </div>
    </div>
    <br>
  </div>

  <div class= "col-md-4">
    <div class="card">
      <div class="card-body" style="background-color:#8eaee9;">
        <h5 class="card-title" style="font-color:white;">STORAGE</h5>
        <a class='btn btn-primary btn-sm' href='storage.php'> View</a>
      </div>
    </div>
  </div>

  <br>
 <div class= "col-md-4">
    <div class="card">
      <div class="card-body" style="background-color:#8eaee9;">
        <h5 class="card-title" style="font-color:white;">PRODUCT</h5>
        <a class='btn btn-primary btn-sm' href='product.php'> View</a>
      </div>
    </div>
  </div>
  </div>
      
  <div class="container">
  <div class="col-md-12">
	
			<div class="panel-heading"  style="background-color:#c6d3eb;"> STOCKS</div>

			<div class="panel-body" style="background-color:#8eaee9;">
       <br>
            <table class="table table-striped">
             <thead>
                <tr>
                 <th>ID</th>
                   <th>PRODUCT NAME</th>
                    <th>CATEGORY</th>
                    <th>QUANTITY</th>
                    <th>STATUS</th>

                </tr>
       </div>

  </div>

    </tbody>

    <?php
      $servername="localhost";
      $username="root";
       $password="";
           $database="ims";

           $connection= new mysqli($servername,$username,$password,$database);
           if($connection->connect_error){
                    die("CONNECTION FAILED: " .$connection->connect_error);
           }

           $sql ="SELECT * FROM product";
             $result =$connection->query($sql);
 
             if(!$result){
            die("invalid query: " . $connection->error);
          }
             while($row = $result -> fetch_assoc()){
           echo "    
                 <tr>
                      <td>$row[id]</td>
                      <td> $row[product_name]</td>
                       <td>$row[category_id]</td>
                           <td>$row[quantity]</td>
                      <td>$row[status]</td>
                    <td>

                       </td>
    
   
                         </tr>
     
                                    " ;
    
                               }
    
                         ?>
            </table>
         <tbody>
       </thead>  
   </div>
   </div>



</script>
  

  </body>
</html>
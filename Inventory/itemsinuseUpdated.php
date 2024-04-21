
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items In Use</title>
</head>
<body>
<?php include 'navbarr.php' ?>
<ol class="breadcrumb" style="background-color:#c6d3eb;">
<li><a href="dashboard.php">HOME / </a></li>		
		  <li class="active">ITEMS IN USE</li>
		</ol>
<div class="container">
<a class="btn btn-primary" href="viewAvailItems.php" role="button">VIEW AVAILABLE ITEMS</a><br><br>
<div class="panel-heading"  style="background-color:#c6d3eb;"> ITEMS IN USE LIST</div>
    <table class="table" style="background-color:#8eaee9;">
        <thead>
            <tr>

                <th>ID</th>
                <th>NAME</th>
                <th>PRODUCT NAME</th>
                <th>CATEGORY</th>
                <th>QUANTITY</th>
            
                <th>DATE</th>
            

                <!-- Add other relevant columns -->
            </tr>
        </thead>
        <tbody>
            <?php
            // Include database connection
            include('dbconnection.php');

            // Query to select items in use
            $sql = "SELECT * FROM itemsinuse"; 

            // Execute the query
            $result = $con->query($sql);

            // Check if there are rows returned
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    
                    echo "<tr id='itemsinuseRow_{$row['id']}'>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>{$row['product_name']}</td>";
                    echo "<td>{$row['category_id']}</td>";
                    echo "<td>{$row['quantity']}</td>";
                    echo "<td>{$row['use_date']}</td>";
                   
                  
                    echo  "<td>
                    <a class='btn btn-primary btn-sm' href='ReturnItem.php?id=$row[id]'>Return</a>

                    </td>";
                    echo "</tr>";
                }
                   

                }
            
            ?>
        </tbody>
    </table>
            </div>
</div>
</div>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'navbarr.php' ?>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">


    <title>Items In Use</title>
    <ol class="breadcrumb" style="background-color:#c6d3eb;">
    <li><a href="dashboard.php">HOME / </a></li>		
		  <li class="active">ITEMS IN USE</li>
		</ol>
</head>
<body>


<div class="container">
    <div class="panel-heading"  style="background-color:#c6d3eb;"> ITEMS LIST</div>
    <table class="table" style="background-color:#8eaee9;">
        <thead>
            <tr>
                <th>ID</th>
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
            $sql = "SELECT * FROM product Where id=  1"; 

            // Execute the query
            $result = $con->query($sql);

            // Check if there are rows returned
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr id='productRow_{$row['id']}'>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['product_name']}</td>";
                    echo "<td>{$row['category_id']}</td>";
                    echo "<td>{$row['quantity']}</td>";
                  
                    echo "<td>{$row['add_at']}</td>";
                    echo "<td>";
                    if ($row['id'] == 0) {
                        echo "<button class='btn btn-danger btn-sm' onclick='useItem({$row['id']})'>USE ITEM</button>";
                    } else {
                        echo "<span class='badge bg-success'>In Use</span>";
                    }
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No products found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</div>

</body>
</html>
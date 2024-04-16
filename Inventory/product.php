<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
</head>
<body>
<?php include 'navbarr.php' ?>
<ol class="breadcrumb" style="background-color:#c6d3eb;">
<li><a href="dashboard.php">HOME / </a></li>		
		  <li class="active">PRODUCT</li>
		</ol>
<div class="controler">
   
    <div class="container my-3">
        <a class="btn btn-primary" href="addproduct.php" role="button">ADD PRODUCT</a><br><br>
        <div class="panel-heading"  style="background-color:#c6d3eb;"> PRODUCT LIST</div>
        <table class="table" style="background-color:#8eaee9;">
        
            <thead>
                <tr>
                    <th>ID</th>
                    <th>PRODUCT NAME</th>
                    <th>CATEGORY</th>
                    <th>STORAGE</th>
                    <th>QUANTITY</th>
                    <th>STATUS</th>
                    <th>DATE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('dbconnection.php');

                // Query to fetch products
                $sql = "SELECT * FROM product";
                $result = $con->query($sql);

                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr id='productRow_{$row['id']}'>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['product_name']}</td>";
                        echo "<td>{$row['category_id']}</td>";
                        echo "<td>{$row['storage_id']}</td>";
                        echo "<td>{$row['quantity']}</td>";
                        echo "<td>{$row['status']}</td>";
                        echo "<td>{$row['add_at']}</td>";
                       
                        echo  "<td>
                        <a class='btn btn-primary btn-sm' href='update.php?id=$row[id]'> UPDATE</a>
                        <a class='btn btn-danger btn-sm' href='deleteproduct.php?id=$row[id]'> DELETE</a>
                        <a class='btn btn-danger btn-sm' href='useitem.php?id=$row[id]'> USE ITEM</a>
                        </td>";
                        echo "</tr>";
                    }
                       
                       
                    
                } else {
                    echo "<tr><td colspan='7'>No products found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script>
function useitem(itemId) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'useitem.php?id=' + itemId, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var row = document.getElementById('productRow_' + itemId);
                var itemsinuseTable = document.getElementById('itemsinuseTable');
                var newRow = itemsinuseTable.insertRow();
                newRow.innerHTML = row.innerHTML;
                row.parentNode.removeChild(row);
            } else {
                console.error('Error marking item as in use');
            }
        }
    };
    xhr.send();
}
</script>

</body>
</html>
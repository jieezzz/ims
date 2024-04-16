<?php
// get_products.php
include('dbconnection.php');
if(isset($_POST['category_id'])) {
    $category_id = $_POST['category_id'];
    $products = mysqli_query($con, "SELECT * FROM products WHERE category_id = $category_id");
    while ($p = mysqli_fetch_array($products)) {
        echo "<option value='" . $p['product_id'] . "'>" . $p['product_name'] . "</option>";
    }
}
?>
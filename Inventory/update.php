<?php
include('dbconnection.php');

// Update Section
if(isset($_POST['update'])){
    $product_id = $_POST['product_id'];
    $category = $_POST['category'];
    $product_name = $_POST['product_name'];
    $storage = $_POST['storage'];
    $quantity = $_POST['quantity'];
    $status = $_POST['status'];
    
    $query = mysqli_query($con, "UPDATE product SET category_id='$category', product_name='$product_name', storage_id='$storage', quantity='$quantity', status='$status' WHERE id='$product_id'");
    
    if($query){
        echo "<script>alert('Product updated successfully')</script>";
    } else {
        echo "<script>alert('Error updating product')</script>";
    }
}

// Fetch Product Data
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
    <title>Update Product</title>
</head>
<body>
    <?php include 'navbar.php' ?>
    <h2>Update Product</h2>
    <form method="POST">
        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
        <label>Category:</label>
        <select name="category">
            <?php
            $categories = mysqli_query($con, "SELECT * FROM category");
            while($c = mysqli_fetch_array($categories)) {
                $selected = ($c['category_id'] == $product['category_id']) ? "selected" : "";
            ?>
            <option value="<?php echo $c['category_name'] ?>" <?php echo $selected ?>><?php echo $c['category_name'] ?></option>
            <?php } ?>
        </select><br><br>
        <label>Storage:</label>
        <select name="storage">
            <?php
            $storages = mysqli_query($con, "SELECT * FROM storage");
            while($s = mysqli_fetch_array($storages)) {
                $selected = ($s['storage_id'] == $product['storage_id']) ? "selected" : "";
            ?>
            <option value="<?php echo $s['storage_name'] ?>" <?php echo $selected ?>><?php echo $s['storage_name'] ?></option>
            <?php } ?>
        </select><br><br>
        <label>Product Name:</label>
        <input type="text" name="product_name" value="<?php echo $product['product_name']; ?>"><br><br>
        <label>Quantity:</label>
        <input type="text" name="quantity" value="<?php echo $product['quantity']; ?>"><br><br>
        <label>Status:</label>
        <input type="text" name="status" value="<?php echo $product['status']; ?>"><br><br>
        <button type="submit" name="update">Update Product</button>
    </form>
</body>
</html>
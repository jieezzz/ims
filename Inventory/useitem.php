<?php
include('dbconnection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($con, "UPDATE itemsinuse SET id = 1 WHERE id = '$id'");
    if ($query) {
        echo "Item marked as in use";
    } else {
        echo "Error marking item as in use";
    }
}
?>
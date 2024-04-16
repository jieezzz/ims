<?php
if (isset($_GET["id"])) {

    $id = $_GET["id"];

    $servername= "localhost";
    $username= "root";
    $password= "";
    $database= "ims";

    $connection = new mysqli($servername,$username,$password,$database);

    $sql = "DELETE  FROM category WHERE id=$id";
    $connection->query($sql);
}

header("location: category.php");
exit;
?>

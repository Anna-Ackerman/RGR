<?php
    include_once "../config/dbconnect.php";

    $product_id = mysqli_real_escape_string($conn, $_POST['record']);
    
    $query = "DELETE FROM products WHERE id='$product_id'";
    
    $data = mysqli_query($conn, $query);

    if ($data) {
        echo "Product Deleted";
    } else {
        echo "Not able to delete";
    }
?>
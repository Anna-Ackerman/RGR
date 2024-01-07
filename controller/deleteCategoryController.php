<?php
    include_once "../config/dbconnect.php";

    $category_id = mysqli_real_escape_string($conn, $_POST['record']);
    
    $query = "DELETE FROM categories WHERE id='$category_id'";
    
    $data = mysqli_query($conn, $query);

    if ($data) {
        echo "Category Deleted";
    } else {
        echo "Not able to delete";
    }
?>

<?php
    include_once "../config/dbconnect.php";

    $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);
    $category_name = mysqli_real_escape_string($conn, $_POST['category_name']);

    $valid_name = preg_match("/^[A-Za-zА-Яа-яІіЇї]+$/u", $category_name);

    if (!$valid_name) {
    echo "Invalid name format";
    exit;
    }

    $updateCategory = mysqli_query($conn, "UPDATE categories SET 
        name='$category_name'
        WHERE id=$category_id");

    if ($updateCategory) {
        echo "true";
    } else {
        echo mysqli_error($conn);
    }
?>
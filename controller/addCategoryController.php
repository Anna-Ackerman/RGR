<?php
include_once "../config/dbconnect.php";

if(isset($_POST['category_name']))
{
    $category_name = filter_input(INPUT_POST, 'category_name', FILTER_SANITIZE_STRING);
    
    if (!preg_match("/^[a-zA-Z0-9іїІЇа-яА-Я\s]+$/u", $category_name)) {
        echo "Invalid category name.";
        exit;
    }

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO categories (name) VALUES (?)");
    $stmt->bind_param("s", $category_name);
    
    $insertCategory = $stmt->execute();

    if(!$insertCategory)
    {
        echo "Error: " . $stmt->error;
    }
    else
    {
        echo "Category added successfully.";
    }

    $stmt->close();
}
?>

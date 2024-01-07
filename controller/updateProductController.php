<?php
    include_once "../config/dbconnect.php";

    $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $stock_quantity = mysqli_real_escape_string($conn, $_POST['stock_quantity']);
    $manufacturer_id = mysqli_real_escape_string($conn, $_POST['manufacturer_id']);
    $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);


    $valid_name = preg_match("/^[A-Za-zА-Яа-яІіЇї]+$/u", $name);
    $valid_description = preg_match("/^[a-zA-Z0-9іїІЇа-яА-Я\s.,-]+$/u", $description);
    $valid_price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
    $valid_stock_quantity = filter_input(INPUT_POST, 'stock_quantity', FILTER_VALIDATE_INT, array("options" => array("min_range" => 0)));
    $valid_manufacturer_id = filter_input(INPUT_POST, 'manufacturer_id', FILTER_VALIDATE_INT, array("options" => array("min_range" => 0)));
    $valid_category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT, array("options" => array("min_range" => 0)));


    if (!$valid_name) {
        echo "Invalid product name.";
        exit;
    }

    if (!$valid_description) {
        echo "Invalid product description.";
        exit;
    }

    if (!$valid_price) {
        echo "Invalid price.";
        exit;
    }

    if (!$valid_stock_quantity) {
        echo "Invalid stock quantity.";
        exit;
    }

    if (!$valid_manufacturer_id) {
        echo "Invalid manufacturer ID.";
        exit;
    }

    if (!$valid_category_id) {
        echo "Invalid category ID.";
        exit;
    }


    $updateProduct = mysqli_query($conn, "UPDATE products SET 
        name='$name', 
        description='$description', 
        price='$price', 
        stock_quantity='$stock_quantity', 
        manufacturer_id='$manufacturer_id', 
        category_id='$category_id' 
        WHERE id='$product_id'");

    if ($updateProduct) {
        echo "true";
    } else {
        echo mysqli_error($conn);
    }
?>

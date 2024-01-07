<?php
include_once "../config/dbconnect.php";

if(isset($_POST['upload']))
{
    
    $name = filter_input(INPUT_POST, 'name', FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z0-9іїІЇа-яА-Я\s]+$/u")));
    $description = filter_input(INPUT_POST, 'description', FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z0-9іїІЇа-яА-Я\s.,-]+$/u")));
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
    $stock_quantity = filter_input(INPUT_POST, 'stock_quantity', FILTER_VALIDATE_INT, array("options" => array("min_range" => 0)));
    $manufacturer_id = filter_input(INPUT_POST, 'manufacturer_id', FILTER_VALIDATE_INT, array("options" => array("min_range" => 0)));
    $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT, array("options" => array("min_range" => 0)));

    
    if (!$name) {
        echo "Invalid product name.";
        exit;
    }

    if (!$description) {
        echo "Invalid product description.";
        exit;
    }

    if (!$price) {
        echo "Invalid price.";
        exit;
    }

    if (!$stock_quantity) {
        echo "Invalid stock quantity.";
        exit;
    }

    if (!$manufacturer_id) {
        echo "Invalid manufacturer ID.";
        exit;
    }

    if (!$category_id) {
        echo "Invalid category ID.";
        exit;
    }


    $stmt = $conn->prepare("INSERT INTO products (name, description, price, stock_quantity, manufacturer_id, category_id) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdiii", $name, $description, $price, $stock_quantity, $manufacturer_id, $category_id);
    
    $insertProduct = $stmt->execute();

    if(!$insertProduct)
    {
        echo "Error: " . $stmt->error;
    }
    else
    {
        echo "Product added successfully.";
    }

    $stmt->close();
}
?>
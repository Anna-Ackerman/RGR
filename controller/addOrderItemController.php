<?php
include_once "../config/dbconnect.php";

if (isset($_POST['upload'])) {
    $order_id = filter_input(INPUT_POST, 'order_id', FILTER_VALIDATE_INT, array("options" => array("min_range" => 1)));
    $product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT, array("options" => array("min_range" => 1)));
    $count = filter_input(INPUT_POST, 'count', FILTER_VALIDATE_INT, array("options" => array("min_range" => 1)));
    $subtotal = filter_input(INPUT_POST, 'subtotal', FILTER_VALIDATE_FLOAT);

    if ($order_id === false || $product_id === false || $count === false || $subtotal === false) {
        echo "Invalid input.";
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO order_items (order_id, product_id, count, subtotal) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("dddd", $order_id, $product_id, $count, $subtotal);

    $insertOrderItem = $stmt->execute();

    if (!$insertOrderItem) {
        echo "Error: " . $stmt->error;
    } else {
        echo "Order Item added successfully.";
    }

    $stmt->close();
}
?>
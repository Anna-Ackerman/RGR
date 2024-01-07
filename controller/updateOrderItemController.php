<?php
include_once "../config/dbconnect.php";

$order_item_id = mysqli_real_escape_string($conn, $_POST['order_item_id']);
$order_id = mysqli_real_escape_string($conn, $_POST['order_id']);
$product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
$count = mysqli_real_escape_string($conn, $_POST['count']);
$subtotal = mysqli_real_escape_string($conn, $_POST['subtotal']);


$valid_count = filter_input(INPUT_POST, 'count', FILTER_VALIDATE_INT, array("options" => array("min_range" => 1)));
$valid_subtotal = filter_input(INPUT_POST, 'subtotal', FILTER_VALIDATE_FLOAT);

if (!$valid_count) {
    echo "Invalid count";
    exit;
}

if (!$valid_subtotal) {
    echo "Invalid subtotal";
    exit;
}


$updateOrderItem = mysqli_query($conn, "UPDATE order_items SET 
    order_id='$order_id', 
    product_id='$product_id', 
    count='$count',
    subtotal='$subtotal'
    WHERE id=$order_item_id");

if ($updateOrderItem) {
    echo "true";
} else {
    echo mysqli_error($conn);
}
?>

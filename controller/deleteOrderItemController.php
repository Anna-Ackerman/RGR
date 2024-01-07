<?php
include_once "../config/dbconnect.php";

$order_item_id = mysqli_real_escape_string($conn, $_POST['record']);

$query = "DELETE FROM order_items WHERE id='$order_item_id'";

$data = mysqli_query($conn, $query);

if ($data) {
    echo "Order Item Deleted";
} else {
    echo "Not able to delete";
}
?>

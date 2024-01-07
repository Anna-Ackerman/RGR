<?php
include_once "../config/dbconnect.php";

$customer_id = mysqli_real_escape_string($conn, $_POST['record']);

$query = "DELETE FROM customers WHERE id='$customer_id'";

$data = mysqli_query($conn, $query);

if ($data) {
    echo "Customer Deleted";
} else {
    echo "Not able to delete";
}
?>
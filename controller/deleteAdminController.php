<?php
include_once "../config/dbconnect.php";

$id = mysqli_real_escape_string($conn, $_POST['record']);

$query = "DELETE FROM admins WHERE id='$id'";

$data = mysqli_query($conn, $query);

if ($data) {
    echo "Admin Deleted";
} else {
    echo "Not able to delete";
}
?>
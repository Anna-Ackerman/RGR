<?php
    include_once "../config/dbconnect.php";

    $manufacturer_id = mysqli_real_escape_string($conn, $_POST['record']);
    
    $query = "DELETE FROM manufacturers WHERE id='$manufacturer_id'";
    
    $data = mysqli_query($conn, $query);

    if ($data) {
        echo "Manufacturer Deleted";
    } else {
        echo "Not able to delete";
    }
?>

<?php
    include_once "../config/dbconnect.php";

    $manufacturer_id = mysqli_real_escape_string($conn, $_POST['manufacturer_id']);
    $manufacturer_name = mysqli_real_escape_string($conn, $_POST['name']); 
    $manufacturer_country = mysqli_real_escape_string($conn, $_POST['country']); 


    $valid_name = preg_match("/^[A-Za-zА-Яа-яІіЇї]+$/u", $manufacturer_name);

    $valid_country = preg_match("/^[A-Za-zА-Яа-яІіЇї]+$/u", $manufacturer_country);

    if (!$valid_name || !$valid_country) {
    echo "Invalid input format";
    exit;
    }

    $updateManufacturer = mysqli_query($conn, "UPDATE manufacturers SET 
        name='$manufacturer_name', 
        country='$manufacturer_country'
        WHERE id=$manufacturer_id");

    if ($updateManufacturer) {
        echo "true";
    } else {
        echo mysqli_error($conn);
    }
?>

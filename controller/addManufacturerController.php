<?php
include_once "../config/dbconnect.php";

if(isset($_POST['upload']))
{
    $manufacturer_name = filter_input(INPUT_POST, 'manufacturer_name', FILTER_SANITIZE_STRING);
    $manufacturer_country = filter_input(INPUT_POST, 'manufacturer_country', FILTER_SANITIZE_STRING);

    
    if (!preg_match("/^[a-zA-Zа-яА-ЯІіЇї\s]+$/u", $manufacturer_name)) {
        echo "Invalid manufacturer name.";
        exit;
    }


    if (!preg_match("/^[a-zA-Zа-яА-ЯІіЇї\s]+$/u", $manufacturer_country)) {
        echo "Invalid manufacturer name.";
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO manufacturers (name, country) VALUES (?, ?)");
    $stmt->bind_param("ss", $manufacturer_name, $manufacturer_country);
    
    $insertManufacturer = $stmt->execute();

    if(!$insertManufacturer)
    {
        echo "Error: " . $stmt->error;
    }
    else
    {
        echo "Manufacturer added successfully.";
    }

    $stmt->close();
}
?>
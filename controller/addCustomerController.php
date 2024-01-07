<?php
include_once "../config/dbconnect.php";

if(isset($_POST['upload']))
{
    
    $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
    $lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
    $patronymic = filter_input(INPUT_POST, 'patronymic', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);


    if (!preg_match("/^[a-zA-Zа-яА-Яії\s]+$/u", $fname) ||
        !preg_match("/^[a-zA-Zа-яА-Яії\s]+$/u", $lname) ||
        !preg_match("/^[a-zA-Zа-яА-Яії\s]+$/u", $patronymic)) {
        echo "Invalid name, surname, or patronymic.";
        exit;
    }

    if (!preg_match("/^[a-zA-Z0-9@.]+$/", $email)) {
            echo "Invalid email address.";
            exit;
        }


    if (!preg_match("/^[0-9+]+$/", $phone)) {
        echo "Invalid phone number.";
        exit;
    }

    
    $stmt = $conn->prepare("INSERT INTO customers (fname, lname, patronymic, email, phone) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $fname, $lname, $patronymic, $email, $phone);
    
    $insertCustomer = $stmt->execute();

    if(!$insertCustomer)
    {
        echo "Error: " . $stmt->error;
    }
    else
    {
        echo "Customer added successfully.";
    }

    $stmt->close();
}
?>
<?php
include_once "../config/dbconnect.php";

$customer_id = mysqli_real_escape_string($conn, $_POST['customer_id']);
$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$patronymic = mysqli_real_escape_string($conn, $_POST['patronymic']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);

$valid_name = preg_match("/^[A-Za-zА-Яа-яІіЇї]+$/u", $fname) && preg_match("/^[A-Za-zА-Яа-яІіЇї]+$/u", $lname) && preg_match("/^[A-Za-zА-Яа-яІіЇї]+$/u", $patronymic);

$valid_email = preg_match("/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]+$/", $email);

$valid_phone = preg_match("/^[0-9+]+$/", $phone);

if (!$valid_name || !$valid_email || !$valid_phone) {
    echo "Invalid input format";
    exit;
}

$updateCustomer = mysqli_query($conn, "UPDATE customers SET 
    fname='$fname', 
    lname='$lname', 
    patronymic='$patronymic', 
    email='$email', 
    phone='$phone'
    WHERE id=$customer_id");

if ($updateCustomer) {
    echo "true";
} else {
    echo mysqli_error($conn);
}
?>

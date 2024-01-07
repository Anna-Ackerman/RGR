<?php
session_start();
include_once "../config/dbconnect.php";

$id = $_POST['id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$patronymic = $_POST['patronymic'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];

$updateCustomer = mysqli_query($conn, "UPDATE customers SET 
    fname='$fname', 
    lname='$lname', 
    patronymic='$patronymic', 
    email='$email', 
    phone='$phone',  
    password='$password' 
    WHERE id=$id");

if ($updateCustomer) {
    $_SESSION['fname'] = $fname;
    $_SESSION['lname'] = $lname;
    $_SESSION['patronymic'] = $patronymic;
    $_SESSION['email'] = $email;
    $_SESSION['phone'] = $phone;

    echo "true";
} else {
    echo mysqli_error($conn);
}
?>

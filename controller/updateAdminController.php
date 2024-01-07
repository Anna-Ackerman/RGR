<?php
session_start();
include_once "../config/dbconnect.php";

$id = $_POST['id'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$patronymic = $_POST['patronymic'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];

$updateAdmin = mysqli_query($conn, "UPDATE admins SET 
    name='$name', 
    surname='$surname', 
    patronymic='$patronymic', 
    email='$email', 
    phone='$phone',  
    password='$password' 
    WHERE id=$id");

if ($updateAdmin) {
    $_SESSION['name'] = $name;
    $_SESSION['surname'] = $surname;
    $_SESSION['patronymic'] = $patronymic;
    $_SESSION['email'] = $email;
    $_SESSION['phone'] = $phone;
    $_SESSION['password'] = $password;

    echo "true";
} else {
    echo mysqli_error($conn);
}
?>

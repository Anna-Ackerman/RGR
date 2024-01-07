<style>
    .table {
        font-family: Montserrat, sans-serif;
        align-items: center;
    }
</style>
<link rel="stylesheet" type="text/css" href="logStyle.css">

<?php
include './config/dbconnect.php';
include 'head2.php';

$name = $_POST['name'];
$surname = $_POST['surname'];  
$patronymic = $_POST['patronymic'];  
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];

$sql_clients = "INSERT INTO customers (fname, lname, patronymic, email, phone, password) VALUES ('$name', '$surname', '$patronymic', '$email', '$phone', '$password')";

if (mysqli_query($conn, $sql_customers)) {
    echo "<center><h1><b>You have been successfully registered<b></h1></center><br><br>";
    echo '<center><table><tr><td><a href="sindex.php"><button style="background-color:black; border-color:black"><span style="color:white">Sign in! </span></button></a></td></tr></table></center>';
} else {
    echo "<center><h1><b>Registration Unsuccessful, try again with different credentials<b></h1></center><br><br>";
    echo '<center><table><tr><td><a href="register.php"><button style="background-color:black; border-color:black"><span style="color:white">Register&nbsp&nbspAgain</span></button></a></td></tr></table></center>';
}
?>

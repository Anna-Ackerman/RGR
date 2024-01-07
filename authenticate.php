<style>
    .table {
        font-family: Montserrat, sans-serif;
        align-items: center
    }
</style>

<link rel="stylesheet" type="text/css" href="logStyle.css">

<?php

include './config/dbconnect.php';
include 'head2.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql_customers = "SELECT * FROM customers WHERE email = '$email' AND password = '$password'";
$result_customers = mysqli_query($conn, $sql_customers);

if (mysqli_num_rows($result_customers) <= 0) {
    echo "<center><h1><b>Invalid email or password. Please login again.<b></h1></center><br><br>";
    echo '<center><table><tr><td><a href="sindex.php"><button style="background-color:black; border-color:black"><span style="color:white">Sign in again</span></button></a></td></tr></table></center>';
} else {
    $row_customers = mysqli_fetch_array($result_customers);

    session_start();
    $_SESSION['id'] = $row_customers['id'];
    $_SESSION['email'] = $row_customers['email'];
    $_SESSION['fname'] = $row_customers['fname'];
    $_SESSION['lname'] = $row_customers['lname'];
    $_SESSION['patronymic'] = $row_customers['patronymic'];
    $_SESSION['phone'] = $row_customers['phone'];


    $_SESSION['log'] = '1';

    header("location:indexCustomer.php");
}
?>

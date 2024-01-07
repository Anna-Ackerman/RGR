<?php
include './config/dbconnect.php';
include 'head2.php';

$email = $_POST['email'];
$password = $_POST['password'];
$sql_admins = "SELECT * FROM admins WHERE email = '$email' AND password = '$password'";
$result_admins = mysqli_query($conn, $sql_admins);

if (mysqli_num_rows($result_admins) <= 0) {
    echo "<center><h1><b>Something went wrong, please sign in again<b></h1></center><br><br>";
    echo '<center><table><tr><td><a href="adminindex.php"><button style="background-color:black; border-color:black"><span style="color:white">Sign In Again</span></button></a></td></tr></table></center>';
} else {
    $row_admins = mysqli_fetch_array($result_admins);

    session_start();
    $_SESSION['email'] = $email;
    $_SESSION['name'] = $row_admins['name'];
    $_SESSION['surname'] = $row_admins['surname'];
    $_SESSION['patronymic'] = $row_admins['patronymic'];
    $_SESSION['phone'] = $row_admins['phone'];

    
    $_SESSION['categories'] = $row_admins['categories'];
    $_SESSION['customers'] = $row_admins['customers'];
    $_SESSION['manufacturers'] = $row_admins['manufacturers'];
    $_SESSION['orders'] = $row_admins['orders'];
    $_SESSION['order_items'] = $row_admins['order_items'];
    $_SESSION['products'] = $row_admins['products'];

    $_SESSION['log'] = '1';

    header("location:indexAdmin.php");
}
?>
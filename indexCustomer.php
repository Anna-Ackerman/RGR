<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location:index.php");
    exit();
}

include_once "./config/dbconnect.php";

$customer_id = $_SESSION['id'];

$sqlOrders = "SELECT COUNT(DISTINCT o.id) AS count
              FROM orders o
              WHERE o.customer_id = $customer_id";
$resultOrders = $conn->query($sqlOrders);
$rowOrders = $resultOrders->fetch_assoc();
$orderCount = $rowOrders['count'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>User</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>

    <?php
    include "./customerHeader.php";
    include "./customerSidebar.php";
    ?>

    <div id="main-content" class="container allContent-section py-4">
        <div class="row">
            <div class="col-sm-3">
                <div class="card">
                    <i class="fa fa-credit-card mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">My orders</h4>
                    <h5 style="color:white;"><?php echo $orderCount; ?></h5>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>

</html>

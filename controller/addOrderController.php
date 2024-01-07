<?php
include_once "../config/dbconnect.php";

if (isset($_POST['order_date']) && isset($_POST['order_status']) && isset($_POST['order_price']) &&
    isset($_POST['order_shipping_method']) && isset($_POST['order_dispatch_city']) &&
    isset($_POST['order_shipping_address']) && isset($_POST['order_post']) &&
    isset($_POST['order_postal_office']) && isset($_POST['order_payment_method']) &&
    isset($_POST['order_notes']) && isset($_POST['order_customer']))  {

    $order_date = $_POST['order_date'];
    $order_status = filter_input(INPUT_POST, 'order_status', FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z0-9іїІЇа-яА-Я\s]+$/u")));
    $order_price = filter_input(INPUT_POST, 'order_price', FILTER_VALIDATE_FLOAT);
    $order_shipping_method = filter_input(INPUT_POST, 'order_shipping_method', FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z0-9іїІЇа-яА-Я\s]+$/u")));
    $order_dispatch_city = filter_input(INPUT_POST, 'order_dispatch_city', FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-ZіїІЇа-яА-Я\s]+$/u")));
    $order_shipping_address = filter_input(INPUT_POST, 'order_shipping_address', FILTER_SANITIZE_STRING);
    $order_post = filter_input(INPUT_POST, 'order_post', FILTER_SANITIZE_STRING);
    $order_postal_office = filter_input(INPUT_POST, 'order_postal_office', FILTER_SANITIZE_STRING);
    $order_payment_method = filter_input(INPUT_POST, 'order_payment_method', FILTER_SANITIZE_STRING);
    $order_notes = filter_input(INPUT_POST, 'order_notes', FILTER_SANITIZE_STRING);
    $order_customer = filter_input(INPUT_POST, 'order_customer', FILTER_VALIDATE_INT, array("options" => array("min_range" => 1)));

    if ($order_date === false || $order_status === false || $order_price === false ||
        $order_shipping_method === false || $order_dispatch_city === false ||
        $order_shipping_address === false || $order_post === false ||
        $order_postal_office === false || $order_payment_method === false ||
        $order_notes === false || $order_customer === false) {
        echo "Invalid input.";
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO orders 
    (customer_id, date, status, price, shipping_method, dispatch_city, shipping_address, post, postal_office, payment_method, notes) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("dssdsssssss", $order_customer, $order_date, $order_status, $order_price, $order_shipping_method, $order_dispatch_city,
        $order_shipping_address, $order_post, $order_postal_office, $order_payment_method, $order_notes);

    $insertOrder = $stmt->execute();

    if (!$insertOrder) {
        echo "Error: " . $stmt->error;
    } else {
        echo "Order added successfully.";
    }

    $stmt->close();
} else {
    echo "Invalid request!";
}
?>

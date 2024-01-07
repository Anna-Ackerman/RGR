<?php
    include_once "../config/dbconnect.php";

    $order_id = mysqli_real_escape_string($conn, $_POST['order_id']);
    $customer_id = mysqli_real_escape_string($conn, $_POST['customer_id']); 
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $shipping_method = mysqli_real_escape_string($conn, $_POST['shipping_method']);
    $dispatch_city = mysqli_real_escape_string($conn, $_POST['dispatch_city']);
    $shipping_address = mysqli_real_escape_string($conn, $_POST['shipping_address']);
    $post = mysqli_real_escape_string($conn, $_POST['post']);
    $postal_office = mysqli_real_escape_string($conn, $_POST['postal_office']);
    $payment_method = mysqli_real_escape_string($conn, $_POST['payment_method']);
    $notes = mysqli_real_escape_string($conn, $_POST['notes']);

    $valid_customer = filter_input(INPUT_POST, 'order_customer', FILTER_VALIDATE_INT, array("options" => array("min_range" => 1)));
    $valid_status = preg_match("/^[A-Za-zА-Яа-яІіЇї]+$/u", $status);
    $valid_price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
    $valid_shipping_method = preg_match("/^[A-Za-zА-Яа-яІіЇї]+$/u", $shipping_method);
    $valid_dispatch_city = preg_match("/^[A-Za-zА-Яа-яІіЇї]+$/u", $dispatch_city);
    $valid_shipping_address = filter_input(INPUT_POST, 'order_shipping_address', FILTER_SANITIZE_STRING);
    $valid_post = preg_match("/^[A-Za-zА-Яа-яІіЇї]+$/u", $post);
    $valid_postal_office = filter_input(INPUT_POST, 'postal_office', FILTER_SANITIZE_STRING);
    $valid_payment_method = preg_match("/^[A-Za-zА-Яа-яІіЇї]+$/u", $payment_method);
    $valid_notes = filter_input(INPUT_POST, 'notes', FILTER_SANITIZE_STRING);


    if ($valid_customer === false || $valid_status === false || $valid_price === false ||
        $valid_shipping_method === false || $valid_dispatch_city === false ||
        $valid_shipping_address === false || $valid_post === false ||
        $valid_postal_office === false || $valid_payment_method === false ||
        $valid_notes === false) {
        echo "Invalid input.";
        exit;
    }


    $updateOrder = mysqli_query($conn, "UPDATE orders SET 
        customer_id='$customer_id', 
        date='$date', 
        status='$status', 
        price='$price', 
        shipping_method='$shipping_method', 
        dispatch_city='$dispatch_city', 
        shipping_address='$shipping_address', 
        post='$post', 
        postal_office='$postal_office', 
        payment_method='$payment_method', 
        notes='$notes'
        WHERE id=$order_id");

    if ($updateOrder) {
        echo "true";
    } else {
        echo mysqli_error($conn);
    }
?>

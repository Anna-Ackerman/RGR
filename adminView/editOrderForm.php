<div class="container p-5">
    <h4>Edit Order Detail</h4>
    <?php
    include_once "../config/dbconnect.php";
    
    // Отримання даних про всіх клієнтів
    $customersQuery = mysqli_query($conn, "SELECT * FROM customers");
    $customers = mysqli_fetch_all($customersQuery, MYSQLI_ASSOC);

    $orderID = $_POST['record'];
    $qry = mysqli_query($conn, "SELECT o.*, c.fname, c.lname, c.patronymic FROM orders o
                                     JOIN customers c ON o.customer_id = c.id
                                     WHERE o.id='$orderID'");
    $numberOfRow = mysqli_num_rows($qry);
    if ($numberOfRow > 0) {
        while ($row = mysqli_fetch_array($qry)) {
            ?>
            <form id="update-Orders" onsubmit="updateOrders()" enctype='multipart/form-data'>
                <div class="form-group">
                    <input type="number" class="form-control" id="order_id" value="<?= $row['id'] ?>" hidden>
                </div>
                <div class="form-group">
                    <label for="order_date">Date:</label>
                    <input type="datetime-local" class="form-control" id="order_date" value="<?= date('Y-m-d\TH:i:s', strtotime($row['date'])) ?>">
                </div>
                <!-- Додавання випадаючого списку для клієнта -->
                <div class="form-group">
                    <label for="order_customer_id">Customer:</label>
                    <select class="form-control" id="order_customer_id" required>
                        <?php foreach ($customers as $customer): ?>
                            <option value="<?= $customer['id'] ?>" <?= ($customer['id'] == $row['customer_id']) ? 'selected' : '' ?>>
                                <?= $customer['fname'] . ' ' . $customer['lname'] . ' ' . $customer['patronymic'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="order_status">Status:</label>
                    <input type="text" class="form-control" id="order_status" value="<?= $row['status'] ?>">
                </div>
                <div class="form-group">
                    <label for="order_price">Price:</label>
                    <input type="number" step="0.01" class="form-control" id="order_price" value="<?= $row['price'] ?>">
                </div>
                <div class="form-group">
                    <label for="order_shipping_method">Shipping Method:</label>
                    <input type="text" class="form-control" id="order_shipping_method" value="<?= $row['shipping_method'] ?>">
                </div>
                <div class="form-group">
                    <label for="order_dispatch_city">Dispatch City:</label>
                    <input type="text" class="form-control" id="order_dispatch_city" value="<?= $row['dispatch_city'] ?>">
                </div>
                <div class="form-group">
                    <label for="order_shipping_address">Shipping Address:</label>
                    <input type="text" class="form-control" id="order_shipping_address" value="<?= $row['shipping_address'] ?>">
                </div>
                <div class="form-group">
                    <label for="order_post">Post:</label>
                    <input type="text" class="form-control" id="order_post" value="<?= $row['post'] ?>">
                </div>
                <div class="form-group">
                    <label for="order_postal_office">Postal Office:</label>
                    <input type="text" class="form-control" id="order_postal_office" value="<?= $row['postal_office'] ?>">
                </div>
                <div class="form-group">
                    <label for="order_payment_method">Payment Method:</label>
                    <input type="text" class="form-control" id="order_payment_method" value="<?= $row['payment_method'] ?>">
                </div>
                <div class="form-group">
                    <label for="order_notes">Notes:</label>
                    <textarea class="form-control" id="order_notes"><?= $row['notes'] ?></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" style="height:40px" class="btn btn-custom-update">Update Order</button>
                </div>
            </form>
            <?php
        }
    }
    ?>
</div>
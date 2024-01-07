<?php
include_once "../config/dbconnect.php";
session_start();
?>

<div>
    <h2>All Orders</h2>
    <table class="table">
        <thead>
            <tr>
                <th class="text-center">Order ID</th>
                <th class="text-center">Customer</th>
                <th class="text-center">Date</th>
                <th class="text-center">Status</th>
                <th class="text-center">Price</th>
                <th class="text-center">Shipping Method</th>
                <th class="text-center">Dispatch City</th>
                <th class="text-center">Shipping Address</th>
                <th class="text-center">Post</th>
                <th class="text-center">Postal Office</th>
                <th class="text-center">Payment Method</th>
                <th class="text-center">Notes</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $customer_id = $_SESSION['id']; 

            $sql = "SELECT o.id, CONCAT(c.fname, ' ', c.lname, ' ', c.patronymic) AS customer_name, o.customer_id, o.date, o.status, o.price, o.shipping_method, o.dispatch_city, o.shipping_address, o.post, o.postal_office, o.payment_method, o.notes
                    FROM orders o
                    JOIN customers c ON o.customer_id = c.id
                    WHERE o.customer_id = $customer_id"; 

            $result = $conn->query($sql);
            $count = 1;

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["customer_name"] . "</td>";
                    echo "<td>" . $row["date"] . "</td>";
                    echo "<td>" . $row["status"] . "</td>";
                    echo "<td>" . $row["price"] . "</td>";
                    echo "<td>" . $row["shipping_method"] . "</td>";
                    echo "<td>" . $row["dispatch_city"] . "</td>";
                    echo "<td>" . $row["shipping_address"] . "</td>";
                    echo "<td>" . $row["post"] . "</td>";
                    echo "<td>" . $row["postal_office"] . "</td>";
                    echo "<td>" . $row["payment_method"] . "</td>";
                    echo "<td>" . $row["notes"] . "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>

    <button type="button" class="btn btn-custom-add" style="height:40px" data-toggle="modal" data-target="#addOrderModal">
        Add Order
    </button>

    <div class="modal fade" id="addOrderModal" role="dialog">
        <div class="modal-dialog">
            <!-- Модальний вміст -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add New Order</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form onsubmit="addOrder()" method="POST">
                                          <div class="form-group">
                            <input type="hidden" id="order_customer" value="<?php echo $customer_id; ?>">
                        </div>
                        <div class="form-group">
                            <label for="order_date">Date:</label>
                            <input type="datetime-local" class="form-control" id="order_date" required>
                        </div>
                        <div class="form-group">
                            <label for="order_status">Status:</label>
                            <input type="text" class="form-control" id="order_status" required>
                        </div>
                        <div class="form-group">
                            <label for="order_price">Price:</label>
                            <input type="number" step="0.01" class="form-control" id="order_price" required>
                        </div>
                        <div class="form-group">
                            <label for="order_shipping_method">Shipping Method:</label>
                            <input type="text" class="form-control" id="order_shipping_method" required>
                        </div>
                        <div class="form-group">
                            <label for="order_dispatch_city">Dispatch City:</label>
                            <input type="text" class="form-control" id="order_dispatch_city" required>
                        </div>
                        <div class="form-group">
                            <label for="order_shipping_address">Shipping Address:</label>
                            <input type="text" class="form-control" id="order_shipping_address" required>
                        </div>
                        <div class="form-group">
                            <label for="order_post">Post:</label>
                            <input type="text" class="form-control" id="order_post" required>
                        </div>
                        <div class="form-group">
                            <label for="order_postal_office">Postal Office:</label>
                            <input type="text" class="form-control" id="order_postal_office">
                        </div>
                        <div class="form-group">
                            <label for="order_payment_method">Payment Method:</label>
                            <input type="text" class="form-control" id="order_payment_method" required>
                        </div>
                        <div class="form-group">
                            <label for="order_notes">Notes:</label>
                            <textarea class="form-control" id="order_notes"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary" style="height:40px">Add Order</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
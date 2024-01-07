<div class="container p-5">
    <h4>Edit Order Item Detail</h4>
    <?php
    include_once "../config/dbconnect.php";
    $ID = $_POST['record'];
    $qry = mysqli_query($conn, "SELECT oi.*, p.name AS product_name FROM order_items oi
                                     JOIN products p ON oi.product_id = p.id
                                     WHERE oi.id='$ID'");
    $numberOfRow = mysqli_num_rows($qry);
    if ($numberOfRow > 0) {
        while ($row1 = mysqli_fetch_array($qry)) {
            ?>
            <form id="update-OrderItem" onsubmit="updateOrder_Item()" enctype='multipart/form-data'>
                <div class="form-group">
                    <label>Order ID:</label>
                    <select id="order_id">
                        <?php
                        $sqlOrders = "SELECT * FROM orders";
                        $resultOrders = $conn->query($sqlOrders);

                        if ($resultOrders->num_rows > 0) {
                            while ($rowOrder = $resultOrders->fetch_assoc()) {
                                $selected = ($row1['order_id'] == $rowOrder['id']) ? 'selected' : '';
                                echo "<option value='" . $rowOrder['id'] . "' $selected>" . $rowOrder['id'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="order_item_id" value="<?= $row1['id'] ?>" hidden>
                </div>
                <div class="form-group">
                    <label for="product_name">Product Name:</label>
                    <select class="form-control" id="product_name">
                        <?php
                        $sqlProducts = "SELECT * FROM products";
                        $resultProducts = $conn->query($sqlProducts);

                        if ($resultProducts->num_rows > 0) {
                            while ($rowProduct = $resultProducts->fetch_assoc()) {
                                $selected = ($row1['product_id'] == $rowProduct['id']) ? 'selected' : '';
                                echo "<option value='" . $rowProduct['id'] . "' $selected>" . $rowProduct['name'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="count">Count:</label>
                    <input type="text" class="form-control" id="count" value="<?= $row1['count'] ?>">
                </div>
                <div class="form-group">
                    <label for="subtotal">Subtotal:</label>
                    <input type="text" class="form-control" id="subtotal" value="<?= $row1['subtotal'] ?>">
                </div>
                <div class="form-group">
                    <button type="submit" style="height:40px" class="btn btn-custom-update">Update Order Item</button>
                </div>
            </form>
            <?php
        }
    }
    ?>
</div>

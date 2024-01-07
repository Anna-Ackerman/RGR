<div>
  <h2>Order Items</h2>
  <table class="table">
    <thead>
      <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Order ID</th>
        <th class="text-center">Product Name</th> 
        <th class="text-center">Count</th>
        <th class="text-center">Subtotal</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
    include_once "../config/dbconnect.php";
    $sql = "SELECT oi.id, oi.order_id, oi.product_id, oi.count, oi.subtotal, p.name
            FROM order_items oi
            JOIN products p ON oi.product_id = p.id
            ORDER BY oi.id";
    $result = $conn->query($sql);
    $count = 1;
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        ?>
        <tr>
          <td>
            <?= $count ?>
          </td>
          <td>
            <?= $row["order_id"] ?>
          </td>
          <td>
            <?= $row["name"] ?>
          </td> <!-- Изменено на отображение имени продукта -->
          <td>
            <?= $row["count"] ?>
          </td>
          <td>
            <?= $row["subtotal"] ?>
          </td>
          <td><button class="btn btn-custom-edit" style="height:40px"
              onclick="order_ItemEditForm('<?= $row['id'] ?>')">Edit</button></td>
          <td><button class="btn btn-custom-delete" style="height:40px"
              onclick="order_ItemDelete('<?= $row['id'] ?>')">Delete</button></td>
        </tr>
        <?php
        $count++;
      }
    }
    ?>
  </table>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-custom-add" style="height:40px" data-toggle="modal"
    data-target="#addOrderItemModal">
    Add Order Item
  </button>

<!-- Add Order Item Modal -->
<div class="modal fade" id="addOrderItemModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Order Item</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form onsubmit="addOrder_Item(); return false;">
                    <div class="form-group">
                        <label for="order_id">Order ID:</label>
                        <!-- Замінено на випадаючий список -->
                        <select class="form-control" id="order_id" required>
                            <?php
                            $orderSql = "SELECT * FROM orders ORDER BY id";
                            $orderResult = $conn->query($orderSql);
                            while ($orderRow = $orderResult->fetch_assoc()) {
                                echo "<option value='" . $orderRow['id'] . "'>" . $orderRow['id'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="product_name">Product Name:</label>
                        <!-- Замінено на випадаючий список -->
                        <select class="form-control" id="product_name" required>
                            <?php
                            $productSql = "SELECT * FROM products ORDER BY name";
                            $productResult = $conn->query($productSql);
                            while ($productRow = $productResult->fetch_assoc()) {
                                echo "<option value='" . $productRow['id'] . "'>" . $productRow['name'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="count">Count:</label>
                        <input type="text" class="form-control" id="count" required>
                    </div>
                    <div class="form-group">
                        <label for="subtotal">Subtotal:</label>
                        <input type="text" class="form-control" id="subtotal" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary" style="height:40px">Add Order Item</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
            </div>
        </div>
    </div>
</div>

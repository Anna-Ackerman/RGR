<div>
  <h2>All Products</h2>
  <table class="table">
    <thead>
      <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Name</th>
        <th class="text-center">Price</th>
        <th class="text-center">Stock Quantity</th>
        <th class="text-center">Manufacturer</th>
        <th class="text-center">Category</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
    include_once "../config/dbconnect.php";
    $sql = "SELECT products.id, products.name, products.price, 
            products.stock_quantity, manufacturers.name AS manufacturer, categories.name AS category
            FROM products
            INNER JOIN manufacturers ON products.manufacturer_id = manufacturers.id
            INNER JOIN categories ON products.category_id = categories.id
            ORDER BY products.id";
    $result = $conn->query($sql);
    $count = 1;
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        ?>
        <tr>
          <td><?= $row["id"] ?></td>
          <td><?= $row["name"] ?></td>
          <td><?= $row["price"] ?></td>
          <td><?= $row["stock_quantity"] ?></td>
          <td><?= $row["manufacturer"] ?></td>
          <td><?= $row["category"] ?></td>
          <td><button class="btn btn-custom-edit" style="height:40px" onclick="productEditForm('<?= $row['id'] ?>')">Edit</button></td>
          <td><button class="btn btn-custom-delete" style="height:40px" onclick="productDelete('<?= $row['id'] ?>')">Delete</button></td>
        </tr>
        <?php
        $count = $count + 1;
      }
    }
    ?>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-custom-add" style="height:40px" data-toggle="modal" data-target="#addProductModal">
    Add Product
  </button>

  <!-- Add Product Modal -->
  <div class="modal fade" id="addProductModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add New Product</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form onsubmit="addProduct()" method="POST">
            <div class="form-group">
              <label for="product_name">Product Name:</label>
              <input type="text" class="form-control" id="product_name" required>
            </div>
            <div class="form-group">
              <label for="product_description">Product Description:</label>
              <textarea class="form-control" id="product_description"></textarea>
            </div>
            <div class="form-group">
              <label for="product_price">Product Price:</label>
              <input type="text" class="form-control" id="product_price" required>
            </div>
            <div class="form-group">
              <label for="product_stock_quantity">Stock Quantity:</label>
              <input type="text" class="form-control" id="product_stock_quantity" required>
            </div>
            <div class="form-group">
              <label for="manufacturer_id">Manufacturer:</label>
              <select class="form-control" id="manufacturer_id" required>
                <?php
                $manufacturers = $conn->query("SELECT * FROM manufacturers");
                while ($manufacturer = $manufacturers->fetch_assoc()) {
                  echo "<option value='{$manufacturer['id']}'>{$manufacturer['name']}</option>";
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="category_id">Category:</label>
              <select class="form-control" id="category_id" required>
                <?php
                $categories = $conn->query("SELECT * FROM categories");
                while ($category = $categories->fetch_assoc()) {
                  echo "<option value='{$category['id']}'>{$category['name']}</option>";
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" style="height:40px">Add Product</button>
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
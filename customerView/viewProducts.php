<div>
  <h2>All Products</h2>
  <table class="table">
    <thead>
      <tr>
        <th class="text-center">Name</th>
        <th class="text-center">Price</th>
        <th class="text-center">Manufacturer</th>
        <th class="text-center">Category</th>
      </tr>
    </thead>
    <?php
    include_once "../config/dbconnect.php";
    $sql = "SELECT products.name, products.price, 
            manufacturers.name AS manufacturer, categories.name AS category
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
          <td><?= $row["name"] ?></td>
          <td><?= $row["price"] ?></td>
          <td><?= $row["manufacturer"] ?></td>
          <td><?= $row["category"] ?></td>
        </tr>
        <?php
        $count = $count + 1;
      }
    }
    ?>
  </table>
</div>
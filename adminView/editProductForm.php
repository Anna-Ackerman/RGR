<div class="container p-5">
    <h4>Edit Product Detail</h4>
    <?php
    include_once "../config/dbconnect.php";
    $ID = $_POST['record'];
    $qry = mysqli_query($conn, "SELECT p.*, m.name AS manufacturer_name, c.name AS category_name 
                                FROM products p
                                JOIN manufacturers m ON p.manufacturer_id = m.id
                                JOIN categories c ON p.category_id = c.id
                                WHERE p.id='$ID'");
    $numberOfRow = mysqli_num_rows($qry);
    if ($numberOfRow > 0) {
        while ($row1 = mysqli_fetch_array($qry)) {
            ?>
            <form id="update-Products" onsubmit="updateProduct()" enctype='multipart/form-data'>
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" class="form-control" id="product_name" value="<?= $row1['name'] ?>">
                </div>
                <div class="form-group">
                    <label for="product_description">Product Description:</label>
                    <textarea class="form-control" id="product_description"><?= $row1['description'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="product_price">Product Price:</label>
                    <input type="number" class="form-control" id="product_price" value="<?= $row1['price'] ?>">
                </div>
                <div class="form-group">
                    <label for="product_stock_quantity">Stock Quantity:</label>
                    <input type="number" class="form-control" id="product_stock_quantity" value="<?= $row1['stock_quantity'] ?>">
                </div>
                <div class="form-group">
                    <label for="manufacturer_id">Manufacturer:</label>
                    <select class="form-control" id="manufacturer_id">
                        <?php
                        $sqlManufacturers = "SELECT * FROM manufacturers";
                        $resultManufacturers = $conn->query($sqlManufacturers);

                        if ($resultManufacturers->num_rows > 0) {
                            while ($rowManufacturer = $resultManufacturers->fetch_assoc()) {
                                $selectedManufacturer = ($row1['manufacturer_id'] == $rowManufacturer['id']) ? 'selected' : '';
                                echo "<option value='" . $rowManufacturer['id'] . "' $selectedManufacturer>" . $rowManufacturer['name'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="category_id">Category:</label>
                    <select class="form-control" id="category_id">
                        <?php
                        $sqlCategories = "SELECT * FROM categories";
                        $resultCategories = $conn->query($sqlCategories);

                        if ($resultCategories->num_rows > 0) {
                            while ($rowCategory = $resultCategories->fetch_assoc()) {
                                $selectedCategory = ($row1['category_id'] == $rowCategory['id']) ? 'selected' : '';
                                echo "<option value='" . $rowCategory['id'] . "' $selectedCategory>" . $rowCategory['name'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="product_id" value="<?= $row1['id'] ?>" hidden>
                </div>
                <div class="form-group">
                    <button type="submit" style="height:40px" class="btn btn-custom-update">Update Product</button>
                </div>
            </form>
            <?php
        }
    }
    ?>
</div>

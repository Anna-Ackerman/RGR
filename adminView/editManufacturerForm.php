<div class="container p-5">
    <h4>Edit Manufacturer Detail</h4>
    <?php
    include_once "../config/dbconnect.php";
    $ID = $_POST['record'];
    $qry = mysqli_query($conn, "SELECT * FROM manufacturers WHERE id='$ID'");
    $numberOfRow = mysqli_num_rows($qry);
    if ($numberOfRow > 0) {
        while ($row1 = mysqli_fetch_array($qry)) {
            ?>
            <form id="update-Manufacturer" onsubmit="updateManufacturers()" enctype='multipart/form-data'>
                <div class="form-group">
                    <input type="text" class="form-control" id="manufacturer_id" value="<?= $row1['id'] ?>" hidden>
                </div>
                <div class="form-group">
                    <label for="manufacturer_name">Manufacturer Name:</label>
                    <input type="text" class="form-control" id="manufacturer_name" value="<?= $row1['name'] ?>">
                </div>
                <div class="form-group">
                    <label for="manufacturer_country">Country:</label>
                    <input type="text" class="form-control" id="manufacturer_country" value="<?= $row1['country'] ?>">
                </div>
                <div class="form-group">
                    <button type="submit" style="height:40px" class="btn btn-custom-update">Update Manufacturer</button>
                </div>
            </form>
            <?php
        }
    }
    ?>
</div>
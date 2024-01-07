<div>
    <h2>Manufacturers</h2>
    <table class="table">
        <thead>
            <tr>
                <th class="text-center">Manufacturer Name</th>
                <th class="text-center">Country</th>
            </tr>
        </thead>
        <?php
        include_once "../config/dbconnect.php";
        $sql = "SELECT name, country FROM manufacturers";
        $result = $conn->query($sql);
        $count = 1;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <tr>
                    <td><?= $row["name"] ?></td>
                    <td><?= $row["country"] ?></td>
                </tr>
        <?php
                $count++;
            }
        }
        ?>
    </table>
</div>
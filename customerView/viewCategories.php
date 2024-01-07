<div>
    <h2>Categories</h2>
    <table class="table">
        <thead>
            <tr>
                <th class="text-center">Category Name</th>
            </tr>
        </thead>
        <?php
        include_once "../config/dbconnect.php";
        $sql = "SELECT name FROM categories";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <tr>
                    <td><?= $row["name"] ?></td>
                </tr>
        <?php
            }
        }
        ?>
    </table>
</div>

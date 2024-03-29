<div>
  <h2>Categories</h2>
  <table class="table">
    <thead>
      <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Category Name</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
    include_once "../config/dbconnect.php";
    $sql = "SELECT * FROM categories";
    $result = $conn->query($sql);
    $count = 1;
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        ?>
        <tr>
          <td><?= $count ?></td>
          <td><?= $row["name"] ?></td>
          <td><button class="btn btn-custom-edit" style="height:40px"
              onclick="categoryEditForm('<?= $row['id'] ?>')">Edit</button></td>
          <td><button class="btn btn-custom-delete" style="height:40px"
              onclick="categoryDelete('<?= $row['id'] ?>')">Delete</button></td>
        </tr>
        <?php
        $count++;
      }
    }
    ?>
  </table>

<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-custom-add" style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Category
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New Category</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form enctype='multipart/form-data' onsubmit="addCategory()" method="POST">
                    <div class="form-group">
                        <label for="category_name">Category Name:</label>
                        <input type="text" class="form-control" id="category_name" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary" style="height:40px">Add Category</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
            </div>
        </div>
    </div>
</div>

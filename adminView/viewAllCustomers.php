<div>
  <h2>All Customers</h2>
  <table class="table">
    <thead>
      <tr>
        <th class="text-center">ID</th>
        <th class="text-center">First Name</th>
        <th class="text-center">Last Name</th>
        <th class="text-center">Patronymic</th>
        <th class="text-center">Email</th>
        <th class="text-center">Phone</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
    include_once "../config/dbconnect.php";
    $sql = "SELECT * FROM customers";
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
            <?= $row["fname"] ?>
          </td>
          <td>
            <?= $row["lname"] ?>
          </td>
          <td>
            <?= $row["patronymic"] ?>
          </td>
          <td>
            <?= $row["email"] ?>
          </td>
          <td>
            <?= $row["phone"] ?>
          </td>
          <td><button class="btn btn-custom-edit" style="height:40px"
              onclick="editCustomersForm('<?= $row['id'] ?>')">Edit</button></td>
          <td><button class="btn btn-custom-delete" style="height:40px"
              onclick="customerDelete('<?= $row['id'] ?>')">Delete</button></td>
        </tr>
        <?php
        $count++;
      }
    }
    ?>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-custom-add" style="height:40px" data-toggle="modal"
    data-target="#addCustomerModal">
    Add Customer
  </button>
  <!-- Add Customer Modal -->
  <div class="modal fade" id="addCustomerModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add New Customer</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form onsubmit="addCustomer()" method="POST">
            <div class="form-group">
              <label for="fname">First Name:</label>
              <input type="text" class="form-control" id="fname" required>
            </div>
            <div class="form-group">
              <label for="lname">Last Name:</label>
              <input type="text" class="form-control" id="lname" required>
            </div>
            <div class="form-group">
              <label for="patronymic">Patronymic:</label>
              <input type="text" class="form-control" id="patronymic" required>
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="text" class="form-control" id="email" required>
            </div>
            <div class="form-group">
              <label for="phone">Phone:</label>
              <input type="text" class="form-control" id="phone" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" style="height:40px">Add Customer</button>
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

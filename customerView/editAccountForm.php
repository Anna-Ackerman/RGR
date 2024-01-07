<div class="container p-5">

<h4>Edit Customer Detail</h4>
<?php
    include_once "../config/dbconnect.php";
    $id=$_POST['record'];
    $qry=mysqli_query($conn, "SELECT * FROM customers WHERE id='$id'");
    $numberOfRow=mysqli_num_rows($qry);
    if($numberOfRow>0){
        while($row1=mysqli_fetch_array($qry)){
?>
<form id="update-Clients" onsubmit="updateCustomerAccount()" enctype='multipart/form-data'>
    <div class="form-group">
        <input type="text" class="form-control" id="id" value="<?=$row1['id']?>" hidden>
    </div>
    <div class="form-group">
        <label for="name">Customer Name:</label>
        <input type="text" class="form-control" id="fname" value="<?=$row1['fname']?>">
    </div>
    <div class="form-group">
        <label for="surname">Customer Surname:</label>
        <input type="text" class="form-control" id="lname" value="<?=$row1['lname']?>">
    </div>
    <div class="form-group">
        <label for="patronymic">Customer Patronymic:</label>
        <input type="text" class="form-control" id="patronymic" value="<?=$row1['patronymic']?>">
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" class="form-control" id="email" value="<?=$row1['email']?>">
    </div>
    <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="text" class="form-control" id="phone" value="<?=$row1['phone']?>">
    </div>
    <div class="form-group">
        <label for="password">New Password:</label>
        <input type="password" class="form-control" id="password" placeholder="Enter new password">
    </div>
    <div class="form-group">
        <button type="submit" style="height:40px" class="btn btn-custom-update">Update Customer</button>
    </div>
    <?php
            }
        }
    ?>
  </form>

</div>
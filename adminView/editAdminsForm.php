<div class="container p-5">

<h4>Edit Admin Detail</h4>
<?php
    include_once "../config/dbconnect.php";
    $id=$_POST['record'];
    $qry=mysqli_query($conn, "SELECT * FROM admins WHERE id='$id'");
    $numberOfRow=mysqli_num_rows($qry);
    if($numberOfRow>0){
        while($row1=mysqli_fetch_array($qry)){
?>
<form id="update-Admins" onsubmit="updateAdminAccount()" enctype='multipart/form-data'>
    <div class="form-group">
        <input type="text" class="form-control" id="id" value="<?=$row1['id']?>" hidden>
    </div>
    <div class="form-group">
        <label for="name">Admin Name:</label>
        <input type="text" class="form-control" id="name" value="<?=$row1['name']?>">
    </div>
    <div class="form-group">
        <label for="surname">Admin Surname:</label>
        <input type="text" class="form-control" id="surname" value="<?=$row1['surname']?>">
    </div>
    <div class="form-group">
        <label for="patronymic">Admin Patronymic:</label>
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
        <button type="submit" style="height:40px" class="btn btn-custom-update">Update Admin</button>
    </div>
    <?php
            }
        }
    ?>
  </form>

</div>
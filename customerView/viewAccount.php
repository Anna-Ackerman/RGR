<?php
session_start();
?>
<div>
    <h2>Your Account</h2>
    <table class="table">
        <thead>
            <tr>
                <th class="text-center">Username</th>
                <th class="text-center">Email</th>
                <th class="text-center">Phone</th>
                <th class="text-center">Password</th>
                <th class="text-center" colspan="2">Action</th>
            </tr>
        </thead>
        <tr>
            <td><?= $_SESSION['fname'] . ' ' . $_SESSION['lname'] . ' ' . $_SESSION['patronymic'] ?></td>
            <td><?= $_SESSION['email'] ?></td>
            <td><?= $_SESSION['phone'] ?></td>
            <td><?= "********" ?></td> <!-- Replace with the actual encrypted password -->
            <td><button class="btn btn-custom-edit" style="height:40px" onclick="customerAccountEditForm('<?=$_SESSION['id']?>')">Edit</button></td>
            <td><button class="btn btn-custom-delete" style="height:40px" onclick="customerAccountDelete('<?=$_SESSION['id']?>')">Delete</button></td>
        </tr>
    </table>
</div>

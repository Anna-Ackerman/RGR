<?php
session_start();
?>
<div>
    <h2>Admin's Account</h2>
    <table class="table">
        <thead>
            <tr>
                <th class="text-center">Admin's name</th>
                <th class="text-center">Email</th>
                <th class="text-center">Phone</th>
                <th class="text-center">Password</th>
                <th class="text-center" colspan="2">Action</th>
            </tr>
        </thead>
        <tr>
            <td><?= $_SESSION['name'] . ' ' . $_SESSION['surname'] . ' ' . $_SESSION['patronymic'] ?></td>
            <td><?= $_SESSION['email'] ?></td>
            <td><?= $_SESSION['phone'] ?></td>
            <td><?= "********" ?></td> <!-- Replace with the actual encrypted password -->
            <td><button class="btn btn-custom-edit" style="height:40px" onclick="adminAccountEditForm('<?=$_SESSION['id']?>')">Edit</button></td>
            <td><button class="btn btn-custom-delete" style="height:40px" onclick="adminAccountDelete('<?=$_SESSION['id']?>')">Delete</button></td>
        </tr>
    </table>
</div>

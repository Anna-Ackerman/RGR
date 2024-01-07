<?php
include './config/dbconnect.php';
include 'head2.php';
?>

<html>
<head>
    <link rel='stylesheet' href='logStyle.css'>
    <style>.table{font-family: Montserrat, sans-serif;}</style>
    <title>Mh-Ticket</title>
</head>

<div><center><img src="./assets/images/user.png" width="200" height="200"/></center></div>

<h2><center><b>User Sign In</center></b></h2>

<body style="background-color: #FFFFFF;">
    <form method='post' action='authenticate.php'>
        <div>
            <table align="center" class="table">
                <tr>
                    <td><h2><b>Email : </b></h2></td>
                    <td><input type="email" name="email" maxlength='50' required></td>
                </tr>
                <tr>
                    <td><h2><b>Password : </b></h2></td>
                    <td><input type="password" name="password" maxlength='50' required></td>
                </tr>
                <tr>
                    <td colspan='2'><center><button type='submit' style="background-color:#f08026; border-color: #f08026" name='login_submit'><b>Sign In</b></button></center></td>
                </tr>
            </table>
        </div>
    </form>

    <div align="center">
        <h3><a href='register.php' style="color: #6f8ca1"><b>Register</b></a></h3>
        <br>
    </div>

    <center><h3><a href='adminindex.php' style="color: #6f8ca1"><b>Admin Sign In?</b></a></h3></center>
</body>
</html>

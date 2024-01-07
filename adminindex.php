<?php
include './config/dbconnect.php';
include 'head2.php';
?>
<html>
<head>
 <link rel='stylesheet' href='logStyle.css'>
 <style >  .table{  font-family: Montserrat, sans-serif;}
</style>
<title>Mh-Ticket</title>
</head>
<div><center><img src="./assets/images/logo.png" width="200" height="200" /></div>
<br>
<br>
<body style="background-color: F5F1F0;">
	<h1><center><b>Admin Sign In</center></b></h1>

<form method='post' action ='adminauthenticate.php'  >
<div>
<table align="center" class="table">
<tr><td><h2><b>Email : </b></h2></td> <td><input type="email" name="email" maxlength='50'></td></tr>
<tr><td><h2><b> Password : </b></h2></td> <td><input type="password" name="password" maxlength='50'></td></td></tr>
<tr><td colspan='2'><center><button type='Submit' style="background-color:#f08026; border-color:#f08026" name='login_submit' ><b>Sign in </b> </button></center></td></tr></table>


</table>
</form>
<center><h3><a href='sindex.php' style="color: #6f8ca1"><b>User Sign In ?</b></a></h3></center>

</body style="background-color: #FFFFFF">
</html>
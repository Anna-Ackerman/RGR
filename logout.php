<?php
include 'head2.php';

session_start();
?>
<html>
<head>
<link rel='stylesheet' href='logStyle.css'>
 <link rel="shortcut icon" href="logofig.jpg" />
</head>
<body style="background-color: #FFFFFF;">
<?php
session_destroy();
echo '<center><table><tr><td><A href="index.php"><button style="background-color: #f08026; border-color: #f08026">Log in again</button></a></td></tr></table></center>';
?>
</body style="background-color: #FFFFFF;">
</html>
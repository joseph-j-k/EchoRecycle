<?php include("../Assest/Connection/connection.php");
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<h1>Welcome back,  <?php echo $_SESSION["aname"] ?></h1>
<a href="MyProfile.php">My Profile</a>
<a href="Ward.php">Ward</a>
<a href="Ratesetting.php">Rate</a>
<a href="Wastetype.php">Wastetype</a>
<a href="Collectionschedule.php">Collection schedule</a>
<a href="Userdetails.php">User List</a>
<a href="Wastepickerdetails.php">Wastepicker</a>
</body>
</html>
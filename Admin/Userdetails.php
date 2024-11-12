<?php
  include("../Assest/Connection/connection.php");
  include("Head.php");
	  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User List</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f6f9;
    margin: 0;
    padding: 20px;
  }

  h1 {
    text-align: center;
    color: #333;
    font-size: 24px;
    font-weight: bold;
  }

  table {
    width: 90%;
    margin: 20px auto;
    border-collapse: collapse;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  }

  table, th, td {
    border: 1px solid #ddd;
  }

  th, td {
    padding: 12px;
    text-align: left;
    font-size: 14px;
  }

  th {
    background-color: #4CAF50;
    color: white;
  }

  tr:nth-child(even) {
    background-color: #f9f9f9;
  }

  img {
    border-radius: 5px;
  }

  a {
    text-decoration: none;
  }
</style>
</head>
<body>
<h1 align="center">User List</h1>
<table  align="center" border="1">
    <tr>
      <td>#</td>
      <td>Name</td>
      <td>Ward</td> 
      <td>House Name</td>
      <td>House Number</td>
      <td>Gender</td>
      <td>Contact</td>
      <td>Email</td>
      <td>Password</td>
      <td>Aadhar Card</td>
      <td>Photo</td>
        </tr>
  <?php
  $i=0;
  $sel = "select * from tbl_user u inner join tbl_ward r on u.ward_id=r.ward_id";
  $result=mysql_query($sel);
  while($data=mysql_fetch_array($result))
  {
	  $i++;
  ?>
    <tr>
     <td><?php echo $i ?></td>
     <td><?php echo $data["user_name"] ?></td>
     <td><?php echo $data["ward_no"] ?></td>
     <td><?php echo $data["user_housename"] ?></td>
     <td><?php echo $data["user_houseno"] ?></td>
     <td><?php echo $data["user_gender"] ?></td>
     <td><?php echo $data["user_contact"] ?></td>
     <td><?php echo $data["user_email"] ?></td>
     <td><?php echo $data["user_password"] ?></td>
     <td><?php echo $data["user_aadhar"] ?></td>
    <td> <a href="../Assest/File/User/<?php echo $data["user_photo"] ?>">
     <img src="../Assest/File/User/<?php echo $data["user_photo"] ?>" width="75" height="75"/>
     </a></td>
	 </tr>
	 <?php }?>
  </table>
</body>
</html>

<?php include("Foot.php"); ?>
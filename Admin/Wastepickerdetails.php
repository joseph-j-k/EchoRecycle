<?php
  include("../Assest/Connection/connection.php");
   include("Head.php");
  if(isset($_GET["acid"]))
	  {
		  $delQry="update tbl_wastepicker set wastepicker_status='1' where wastepicker_id='".$_GET["acid"]."'";
		  mysql_query($delQry);
		  header("location:Wastepickerdetails.php");
	  }
	  if(isset($_GET["reject"]))
	  {
		  $delQry="update tbl_wastepicker set wastepicker_status='2' where wastepicker_id='".$_GET["reject"]."'";
		  mysql_query($delQry);
		  header("location:Wastepickerdetails.php");
	  }
  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Water Picker Details</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f6f9;
    color: #333;
    margin: 0;
    padding: 20px;
  }

  h3 {
    text-align: center;
    font-size: 24px;
    color: #333;
    font-weight: bold;
    margin-top: 30px;
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

  th {
    background-color: #4CAF50;
    color: white;
    padding: 10px;
    font-size: 14px;
    text-align: center;
  }

  td {
    padding: 12px;
    font-size: 14px;
    text-align: center;
  }

  tr:nth-child(even) {
    background-color: #f9f9f9;
  }

  img {
    border-radius: 5px;
    transition: transform 0.2s;
  }

  img:hover {
    transform: scale(1.1);
  }

  a {
    text-decoration: none;
    color: #4CAF50;
    font-weight: bold;
  }

  a:hover {
    color: #333;
  }

  .actions a {
    margin: 0 5px;
    padding: 5px 10px;
    border: 1px solid #4CAF50;
    border-radius: 5px;
    transition: 0.3s;
  }

  .actions a:hover {
    background-color: #4CAF50;
    color: white;
  }
</style>
</head>
<body>
<h3>WatepickerListNew</h3>
 <table  align="center" border="1">
    <tr>
      <td>#</td>
      <td>Name</td>
      <td>Address</td> 
      <td>Gender</td>
      <td>DOB</td>
      <td>Age</td>
      <td>Contact</td>
      <td>Ward id</td>
      <td>Email</td>
      <td>Password</td>
      <td>Ward id</td>
      <td>Aadhar Card</td>
      <td>License</td>
      <td>photo</td>
  </tr>
  <?php
  $i=0;
  $sel = "select * from tbl_wastepicker  p inner join tbl_ward w on p.ward_id=w.ward_id where p.wastepicker_status='0'";
  $result=mysql_query($sel);
  while($data = mysql_fetch_array($result))
  {
	  $i++;
  ?>
    <tr>
     <td><?php echo $i ?></td>
     <td><?php echo $data["wastepicker_name"] ?></td>
     <td><?php echo $data["wastepicker_address"] ?></td>
     <td><?php echo $data["wastepicker_gender"] ?></td>
     <td><?php echo $data["wastepicker_dob"] ?></td>
     <td><?php echo $data["wastepicker_age"] ?></td>
     <td><?php echo $data["wastepicker_contact"] ?></td>
     <td><?php echo $data["ward_no"] ?></td>
      <td><?php echo $data["wastepicker_email"] ?></td>
      <td><?php echo $data["wastepicker_password"] ?></td>
     <td>
     <a href="../Assest/File/Wastepicker/<?php echo $data["wastepicker_aadhar"] ?>">
     <img src="../Assest/File/Wastepicker/<?php echo $data["wastepicker_aadhar"] ?>" width="75" height="75"/>
     </a>
     </td>
      <td>
     <a href="../Assest/File/Wastepicker/<?php echo $data["wastepicker_license"] ?>">
     <img src="../Assest/File/Wastepicker/<?php echo $data["wastepicker_license"] ?>" width="75" height="75"/>
     </a>
     </td>
     <td>
     <a href="../Assest/File/Wastepicker/<?php echo $data["wastepicker_photo"] ?>">
     <img src="../Assest/File/Wastepicker/<?php echo $data["wastepicker_photo"] ?>" width="75" height="75"/>
     </a>
     </td>
     <td>
    <a href="Wastepickerdetails.php?acid=<?php echo $data["wastepicker_id"]?>">Accept</a>
     <a href="Wastepickerdetails.php?reject=<?php echo $data["wastepicker_id"]?>">Reject</a>
	 </tr>
	 <?php }?>
 </table>
 <h3>Accepted List</h3>
 <table  align="center" border="1">
    <tr>
      <td>#</td>
      <td>Name</td>
      <td>Address</td> 
      <td>Gender</td>
      <td>DOB</td>
      <td>Age</td>
      <td>Contact</td>
      <td>Ward id</td>
      <td>Email</td>
      <td>Password</td>
      <td>Ward id</td>
      <td>Aadhar Card</td>
      <td>License</td>
      <td>photo</td>
  </tr>
  <?php
  $i=0;
  $sel = "select * from tbl_wastepicker  p inner join tbl_ward w on p.ward_id=w.ward_id where p.wastepicker_status='1'";
  $result=mysql_query($sel);
  while($data = mysql_fetch_array($result))
  {
	  $i++;
  ?>
    <tr>
     <td><?php echo $i ?></td>
     <td><?php echo $data["wastepicker_name"] ?></td>
     <td><?php echo $data["wastepicker_address"] ?></td>
     <td><?php echo $data["wastepicker_gender"] ?></td>
     <td><?php echo $data["wastepicker_dob"] ?></td>
     <td><?php echo $data["wastepicker_age"] ?></td>
     <td><?php echo $data["wastepicker_contact"] ?></td>
     <td><?php echo $data["ward_no"] ?></td>
      <td><?php echo $data["wastepicker_email"] ?></td>
      <td><?php echo $data["wastepicker_password"] ?></td>
     <td>
     <a href="../Assest/File/Wastepicker/<?php echo $data["wastepicker_aadhar"] ?>">
     <img src="../Assest/File/Wastepicker/<?php echo $data["wastepicker_aadhar"] ?>" width="75" height="75"/>
     </a>
     </td>
      <td>
     <a href="../Assest/File/Wastepicker/<?php echo $data["wastepicker_license"] ?>">
     <img src="../Assest/File/Wastepicker/<?php echo $data["wastepicker_license"] ?>" width="75" height="75"/>
     </a>
     </td>
     <td>
     <a href="../Assest/File/Wastepicker/<?php echo $data["wastepicker_photo"] ?>">
     <img src="../Assest/File/Wastepicker/<?php echo $data["wastepicker_photo"] ?>" width="75" height="75"/>
     </a>
     </td>
     <td>
     <a href="Wastepickerdetails.php?reject=<?php echo $data["wastepicker_id"]?>">Reject</a>
	 </tr>
	 <?php }?>
 </table>
 <h3>Rejected list</h3>
 <table  align="center" border="1">
    <tr>
      <td>#</td>
      <td>Name</td>
      <td>Address</td> 
      <td>Gender</td>
      <td>DOB</td>
      <td>Age</td>
      <td>Contact</td>
      <td>Ward id</td>
      <td>Email</td>
      <td>Password</td>
      <td>Ward id</td>
      <td>Aadhar Card</td>
      <td>License</td>
      <td>photo</td>
  </tr>
  <?php
  $i=0;
  $sel = "select * from tbl_wastepicker  p inner join tbl_ward w on p.ward_id=w.ward_id where p.wastepicker_status='2'";
  $result=mysql_query($sel);
  while($data = mysql_fetch_array($result))
  {
	  $i++;
  ?>
    <tr>
     <td><?php echo $i ?></td>
     <td><?php echo $data["wastepicker_name"] ?></td>
     <td><?php echo $data["wastepicker_address"] ?></td>
     <td><?php echo $data["wastepicker_gender"] ?></td>
     <td><?php echo $data["wastepicker_dob"] ?></td>
     <td><?php echo $data["wastepicker_age"] ?></td>
     <td><?php echo $data["wastepicker_contact"] ?></td>
     <td><?php echo $data["ward_no"] ?></td>
      <td><?php echo $data["wastepicker_email"] ?></td>
      <td><?php echo $data["wastepicker_password"] ?></td>
     <td>
     <a href="../Assest/File/Wastepicker/<?php echo $data["wastepicker_aadhar"] ?>">
     <img src="../Assest/File/Wastepicker/<?php echo $data["wastepicker_aadhar"] ?>" width="75" height="75"/>
     </a>
     </td>
      <td>
     <a href="../Assest/File/Wastepicker/<?php echo $data["wastepicker_license"] ?>">
     <img src="../Assest/File/Wastepicker/<?php echo $data["wastepicker_license"] ?>" width="75" height="75"/>
     </a>
     </td>
     <td>
     <a href="../Assest/File/Wastepicker/<?php echo $data["wastepicker_photo"] ?>">
     <img src="../Assest/File/Wastepicker/<?php echo $data["wastepicker_photo"] ?>" width="75" height="75"/>
     </a>
     </td>
     <td>
     <a href="Wastepickerdetails.php?acid=<?php echo $data["wastepicker_id"]?>">Accept</a>
	 </tr>
	 <?php }?>
 </table>
</body>
</html>
<?php include("Foot.php"); ?>
<?php
     include("../Assest/Connection/connection.php");
	   session_start();

     include("Head.php");
	  if(isset($_POST["btnsubmit"]))
	  {
		  $insQry="update tbl_wastepicker set  wastepicker_name='".$_POST["txtname"]."',wastepicker_contact='".$_POST["txtcontact"]."',user_email='".$_POST["txtemail"]."' where user_id = '".$_SESSION["uid"]."'";
		  mysql_query($insQry);
	  }
	  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Profile</title>
<<style>
    h1 {
        text-align: center;
        color: #333;
    }
    table {
        width: 50%;
        margin: 60px auto;
        border-collapse: collapse;
        background-color: #fff;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    td {
        padding: 15px;
        border: 1px solid #ddd;
        text-align: left;
        color: #555;
    }
    td:nth-child(even) {
        background-color: #f9f9f9;
    }
    .img {
        border-radius: 10px;
    }
    .form-btn {
        text-decoration: none;
        color: #fff;
        background-color: #28a745;
        margin: 10px;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: transform 0.3s ease, background-color 0.3s ease;
    }
    .form-btn:hover {
        background-color: #218838;
        transform: scale(1.2); /* Adds a scaling effect */
    }
    .button-container {
        text-align: center;
        margin-top: 20px;
    }
</style>
</head>
<body>
<br /><br/> <br/>  
<form id="form1" name="form1" method="post" action="">
<h1 align="center">Edit Profile</h1>
  <?php 
  $sel = "select * from tbl_wastepicker  where wastepicker_id = '".$_SESSION["wid"]."'";
  $result = mysql_query($sel);
  $data = mysql_fetch_array($result);
  ?>
  <table align="center">
    <tr>
      <td>Name</td>
      <td><input type="text" required name="txtcontact" value="<?php echo $data["wastepicker_name"] ?>"/></td>
    </tr>
     <tr>
      <td>Contact</td>
      <td><input type="text" required name="txtcontact" value="<?php echo $data["wastepicker_contact"] ?>"/></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input type="text" required name="txtcontact" value="<?php echo $data["wastepicker_email"] ?>"/></td>
    </tr>
  </table>
  <div class="button-container">
    <input type="submit" name="btnsubmit" id="btnsubmit" value="Edit" class="form-btn"/>
    <input type="reset" name="btnreset" id="btnreset" value="Reset" class="form-btn"/>
</div>
</form>
</body>
</html>

<?php include("Foot.php"); ?>
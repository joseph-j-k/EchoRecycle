<?php
     include("../Assest/Connection/connection.php");
	 session_start();
     include("Head.php");
	 $message="";
	  if(isset($_POST["btnsubmit"]))
         {
			 $sel="select * from tbl_admin where admin_id='".$_SESSION["aid"]."' and admin_password='".$_POST["txtcurrentpass"]."'";
			 $data=mysql_query($sel);
			 if($pass=mysql_fetch_array($data))
			 {
				 $newpassword=$_POST["txtnewpass"];
				 $confirmpassword=$_POST["txtconfirmpass"];
				 if($newpassword==$confirmpassword)
				 {
					 $ins="update tbl_admin set admin_password='".$_POST["txtconfirmpass"]."' where admin_id='".$_SESSION["aid"]."'";
					 mysql_query($ins);
				 }
				 else
				 {
					 $message="Password not same..";
				 }
			 }
			 else
			 {
				 $message="Password not correct..";
	          }
		 }
		 
?>
 
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Password</title>
<style>
    h1 {
        text-align: center;
        color: #333;
    }
    table {
        width: 50%;
        margin: 20px auto;
        border-collapse: collapse;
        background-color: #fff;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
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
<form id="form1" name="form1" method="post" action="">
  <table border="2" align="center">
  <tr>
      <td>Current Password</td>
      <td><input type="text" required name="txtcurrentpass" id="txtcurrentpass"/></td>
    </tr>
    <tr>
      <td>New Password</td>
      <td><input type="text" required name="txtnewpass" id="txtnewpass" id="txtnewpass"/></td>
    </tr>
    <tr>
      <td>Confirm Password</td>
      <td><input type="text" required name="txtconfirmpass" id="txtconfirmpass"></td>
    </tr>
    <tr>
    <td colspan="2" align="center"><?php echo $message?></td>
    </tr>
  </table>
  <div class="button-container">
    <input type="submit" name="btnsubmit" id="btnsubmit" value="Change" class="form-btn"/>
</div>
</form>
</body>
</html>
<?php include("Foot.php"); ?>
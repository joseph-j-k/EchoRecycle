<?php
include('../Assest/Connection/connection.php');
session_start();

if(isset($_POST['btn_save']))
{
	
	$currentPassword = $_POST["txt_password"];
	$newPassword = $_POST["txt_newpassword"];
	$rePassword = $_POST["txt_repassword"];
	
	$sel="select * from tbl_wastepicker where wastepicker_id = '".$_SESSION["wid"]."'";
	$row = mysql_query($sel);

	$data = mysql_fetch_array($row);

	$dbPassword = $data["wastepicker_password"];
		
		if($currentPassword == $dbPassword)
		{
				if($newPassword == $rePassword)
				{
					$up = "update tbl_wastepicker set wastepicker_password = '".$newPassword."' where wastepicker_id = '".$_SESSION["wid"]."'";
					
				
					if(mysql_query($up))
					{
					echo "<script>alert('Updated')</script>";
					}
				}
				else
				{
					echo "<script>alert('Password Missmatch')</script>";
				}
		}
		else
		{
			echo "<script>alert('Incorrect Current Password')</script>";		
		}
}
include("Head.php");
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

<div id="tab" align="center" >
<h1>Change Password</h1>
<br /><br />
<form id="form1" name="form1"  method="post" action="">
  <table>
    <tr align="center">
      <td>Current Password</td>
      <td><label for="txt_password"></label>
      <input type="text" name="txt_password" id="txt_password" required="required" autocomplete="off" /></td>
    </tr>
    <tr align="center">
      <td>New Password</td>
      <td><label for="txt_newpassword"></label>
      <input type="text" name="txt_newpassword" id="txt_newpassword"  required="required" autocomplete="off" /></td>
    </tr>
    <tr align="center">
      <td>Re-Password</td>
      <td><label for="txt_repassword"></label>
      <input type="text" name="txt_repassword" id="txt_repassword"  required="required" autocomplete="off"  /></td>
  </tr>
  </table>
  <div class="button-container">
    <input type="submit" name="btnsubmit" id="btnsubmit" value="Change" class="form-btn"/>
</div>
</form>
</div>
</body>
<?php
include("Foot.php");
?>
</html>
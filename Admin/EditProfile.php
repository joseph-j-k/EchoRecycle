<?php
     include("../Assest/Connection/connection.php");
	 session_start();
     include("Head.php");
	  if(isset($_POST["btnsubmit"]))
	  {
		  $insQry="update tbl_admin set  admin_name='".$_POST["txtname"]."',admin_contact='".$_POST["txtcontact"]."',admin_email='".$_POST["txtemail"]."' where admin_id = '".$_SESSION["aid"]."'";
		  mysql_query($insQry);
          header("Location:MyProfile.php");
	  }
	  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
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
<form id="form1" name="form1" method="post" action="" onsubmit="return validateForm()">
  <?php 
  $sel = "select * from tbl_admin where admin_id = '".$_SESSION["aid"]."'";
  $result = mysql_query($sel);
  $data = mysql_fetch_array($result);
  ?>
  <table border="2" align="center">
    <tr>
      <td>Name</td>
      <td><input type="text" id="txtname" name="txtname" value="<?php echo $data["admin_name"] ?>"/></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><input type="text" id="txtcontact" name="txtcontact" value="<?php echo $data["admin_contact"] ?>"/></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input type="text" id="txtemail" name="txtemail" value="<?php echo $data["admin_email"] ?>"/></td>
    </tr>
  </table>
  <div class="button-container">
    <input type="submit" name="btnsubmit" id="btnsubmit" value="Edit" class="form-btn"/>
    <input type="reset" name="btnreset" id="btnreset" value="Reset" class="form-btn"/>
  </div>
</form>

<script>
  function validateForm() {
    var name = document.getElementById("txtname").value;
    var contact = document.getElementById("txtcontact").value;
    var email = document.getElementById("txtemail").value;

    // Name validation
    if (name == "" || !/^[a-zA-Z\s]+$/.test(name)) {
      alert("Please enter a valid name with only letters and spaces.");
      return false;
    }

    // Contact validation
    if (contact == "" || !/^\d{10}$/.test(contact)) {
      alert("Please enter a valid 10-digit contact number.");
      return false;
    }

    // Email validation
    if (email == "" || !/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/.test(email)) {
      alert("Please enter a valid email address.");
      return false;
    }

    return true; // Proceed with form submission if all fields are valid
  }
</script>

</body>
</html>
<?php include("Foot.php"); ?>
<?php 
include("../Assest/Connection/connection.php");
session_start();
include("Head.php"); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Profile</title>
<style>
    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
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

    /* Style for round profile photo positioned below "My Profile" heading */
    .img {
        width: 150px; /* Adjust size as needed */
        height: 150px;
        border-radius: 50%; /* Makes the image round */
        box-shadow: 0 2px 5px rgba(0,0,0,0.3);
        display: block;
        margin: 0 auto 20px auto; /* Centers the image below the heading */
    }

    /* Updated button styles with transition */
    .form-btn {
    text-decoration: none;
    color: #fff;
    background-color: #28a745; /* Initial green color */
    margin: 10px;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: transform 0.3s ease, background-color 0.3s ease;
      }

     .form-btn:hover {
    background-color: #218838; /* Darker green on hover */
    transform: scale(1.2); /* Adds a scaling effect */
     }

    .form-btn:active {
    background-color: #45a049; /* Lighter green on click */
    transform: scale(1); /* Prevent scaling when clicked */
    }

   .button-container {
    text-align: center;
    margin-top: 30px; /* Spacing from the table */  
       }

</style>
  </head>
<body>
<form id="form1" name="form1" method="post" action="">
<h1 align="center">My Profile</h1>
  <?php 
  $sel = "select * from tbl_user u inner join tbl_ward w on w.ward_id = u.ward_id where u.user_id = '".$_SESSION["uid"]."'";
  $result = mysql_query($sel);
  $data = mysql_fetch_array($result);
  ?>
  <img src="../Assest/File/user/<?php echo $data["user_photo"] ?>" width="400" height="250" class="img"/>
  <table  align="center">
    <tr>
      <td>Name</td>
      <td><?php echo $data["user_name"] ?></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><?php echo $data["user_gender"] ?></td>
    </tr>
    <tr>
      <td>House Name</td>
      <td><?php echo $data["user_housename"] ?></td>
    </tr>
    <tr>
      <td>House Number</td>
      <td><?php echo $data["user_houseno"] ?></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><?php echo $data["user_contact"] ?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php echo $data["user_email"] ?></td>
    </tr>
    <tr>
      <td>Ward Number</td>
      <td><?php echo $data["ward_no"] ?></td>
    </tr>
  </table>
  <div class="button-container">
    <!-- Apply the form-btn class to the buttons -->
    <a href="EditProfile.php" class="form-btn">Edit Profile</a>
    <a href="ChangePassword.php" class="form-btn">Change Password</a>
  </div>

</form>
</body>
</html>

<?php include("Foot.php"); ?>

<?php  
include("../Assest/Connection/connection.php");
ob_start();

session_start();
include("Head.php");
  
 if(isset($_POST["btnsubmit"]))
{ 
  $reply=$_POST["txtreply"];
  $insqry="update tbl_complaint set complaint_reply='$reply',complaint_replydate=curdate(),complaint_status='1' where complaint_id='".$_SESSION["CID"]."'";
  
  mysql_query($insqry);
  header("location:ViewComplaint.php");
  
}


  $selAdmin="select * from tbl_user u inner join tbl_complaint c on c.user_id=u.user_id where complaint_id='".$_SESSION["CID"]."'";
  $dataAdmin=mysql_query($selAdmin);
  $rowAdmin=mysql_fetch_array($dataAdmin);
  
?>
  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ComplaintReply</title>
<style>
/* Body Styling */
body {
    background-color: #e9ecef; /* A lighter background color for contrast */
    font-family: Arial, sans-serif; /* Adding a modern font */
}

/* Main Container */
.container {
    width: 100%;
    max-width: 500px; /* Increased width for better readability */
    background-color: #fff;
    border-radius: 10px; /* Slightly rounder corners */
    box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.1); /* More pronounced shadow */
    padding: 40px; /* Adjusted padding for a balanced look */
    margin: 50px auto; /* Centering the container */
}

/* Header */
.container h1 {
    font-size: 28px; /* Larger title font size */
    color: #333;
    text-align: center;
    margin-bottom: 30px; /* Increased space below title */
}

/* Table Styling */
table {
    width: 100%;
    margin-bottom: 30px; /* Added margin for spacing */
    border-collapse: collapse; 
}

table td {
    padding: 15px; /* Increased padding for better spacing */
    color: #555;
    border-bottom: 1px solid #dee2e6; /* Added borders for clarity */
}

table tr td:first-child {
    font-weight: bold;
    color: #333;
}

/* Last Row Border Removal */
table tr:last-child td {
    border-bottom: none; 
}

/* Textarea Styling */
textarea {
    width: 100%; /* Full width for better usability */
    padding: 12px; /* Adjusted padding */
    font-size: 16px; /* Increased font size for better readability */
    border-radius: 5px; 
    border: 1px solid #ced4da; /* Soft border color */
    resize: vertical; 
    outline: none;
    transition: border-color 0.3s, box-shadow 0.3s; /* Added shadow transition */
}

textarea:focus {
    border-color: #80bdff; /* Changed focus border color */
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.25); /* Soft shadow on focus */
}

/* Button Styling */
.button-group {
    text-align: center;
    margin-top: 20px;
}

.button-group input[type="submit"],
.button-group input[type="reset"] {
    padding: 12px 25px; /* Increased button padding */
    font-size: 16px; 
    font-weight: bold; 
    border-radius: 5px; 
    border: none; 
    cursor: pointer; 
    color: #fff; 
    transition: background-color 0.3s, transform 0.2s; /* Added transform transition */
    margin: 0 10px; 
}

input[type="submit"] {
    background-color: #28a745; /* Green submit button */
}

input[type="submit"]:hover {
    background-color: #218838; 
    transform: translateY(-2px); /* Subtle lift on hover */
}

input[type="reset"] {
    background-color: #dc3545; /* Red cancel button */
}

input[type="reset"]:hover {
    background-color: #c82333; 
    transform: translateY(-2px); /* Subtle lift on hover */
}

</style>
</head>
<body>
    <div class="container">
        <h1>Reply</h1>
        <form id="form1" name="form1" method="post" action="">
            <table>
                <tr>
                    <td>Title</td>
                    <td><?php echo $rowAdmin["complaint_title"] ?></td>
                </tr>
                <tr>
                    <td>Complaint</td>
                    <td><?php echo $rowAdmin["complaint_message"] ?></td>
                </tr>
                <tr>
                    <td>Date</td>
                    <td><?php echo $rowAdmin["complaint_date"] ?></td>
                </tr>
                <tr>
                    <td>Posted By</td>
                    <td><?php echo $rowAdmin["user_name"] ?></td>
                </tr>
                <tr>
                    <td>Reply</td>
                    <td><textarea name="txtreply" id="txtreply" rows="4" placeholder="Enter your reply..."></textarea></td>
                </tr>
            </table>
            <div class="button-group">
                <input type="submit" name="btnsubmit" value="Submit">
                <input type="reset" name="btnreset" value="Cancel">
            </div>
        </form>
    </div>
</body>
</html>

<?php include("Foot.php"); ?>

<?php
ob_end_flush(); // End output buffering and send output to the browser
?>
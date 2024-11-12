<?php include("../Assest/Connection/connection.php");
ob_start();
session_start();

include("Head.php");

if(isset($_GET["delID"]))
{
        	   $_SESSION["CID"]=$_GET["delID"];
			   header("location:ComplaintReply.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Complaint</title>
 <style>

        h3 {
            text-align: center;
            color: #333;
            font-size: 24px;
            margin-top: 20px;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #009CFF;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px 15px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #009CFF;
            color: #ffffff;
            text-transform: uppercase;
            font-weight: normal;
        }

        td {
            font-size: 14px;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .a {
            color: #4CAF50;
            text-decoration: none;
        }

        .a:hover {
            text-decoration: underline;
        }
        
        .centered {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>

<body>
<br /><br /> <br /> <br /> 
<h3>NewComplaints</h3>
 <table align="center">
    <tr>
        <th>SNo</th>
        <th>User Name</th>
        <th>Title</th>
        <th>Complaint</th>
        <th>Date</th>
        <th>Action</th>
    </tr>
    <?php 
	$i=0;
	$sel = "select * from tbl_user u inner join tbl_complaint c on c.user_id=u.user_id where c.complaint_status='0'";
	$result = mysql_query($sel);
	while($data = mysql_fetch_array($result))
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data["user_name"]?></td>
      <td><?php echo $data["complaint_title"]?></td>
      <td><?php echo $data["complaint_message"]?></td>
      <td><?php echo $data["complaint_date"]?></td>
      <td><a href="ViewComplaint.php?delID=<?php echo $data["complaint_id"]?>" class="a">Reply</a></td>
    </tr>
    <?php } ?>
  </table>
<h3>SolvedComplaint</h3>
 <table border="1" align="center">
    <tr>
        <th>SNo</th>
        <th>User Name</th>
        <th>Title</th>
        <th>Complaint</th>
        <th>PostDate</th>
        <th>Reply</th>
        <th>ReplyDate</th>
        
    </tr>
    <?php 
	$i=0;
	$sel = "select * from tbl_user u inner join tbl_complaint c on c.user_id=u.user_id where c.complaint_status='1'";
	$result = mysql_query($sel);
	while($data = mysql_fetch_array($result))
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data["user_name"]?></td>
      <td><?php echo $data["complaint_title"]?></td>
      <td><?php echo $data["complaint_message"]?></td>
      <td><?php echo $data["complaint_date"]?></td>
      <td><?php echo $data["complaint_reply"]?></td>
      <td><?php echo $data["complaint_replydate"]?></td>
      
    </tr>
    <?php } ?>
  </table>
</body>
</html>

<?php include("Foot.php"); ?>   

<?php
ob_end_flush(); // End output buffering and send output to the browser
?>
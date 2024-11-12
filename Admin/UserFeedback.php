<?php include("../Assest/Connection/Connection.php");
include("Head.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Feedback</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
    }

    table {
        width: 80%;
        margin: auto;
        border-collapse: collapse;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    th, td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #007bff;
        color: white;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    h1 {
        text-align: center;
        color: #333;
    }

    form {
        margin-top: 20px;
    }
</style>
</head>

<body>
  <br /> <br /> <br /> <br />
<h1>User Feedback</h1>
<form>
 <table>
    <tr>
      <th>#</th>
      <th>User Name</th>
      <th>Feedback</th>
      <th>Date</th>
    </tr>
    <?php 
	$i=0;
	$sel = "select * from tbl_user u inner join tbl_feedback f on f.user_id = u.user_id";
	$result = mysql_query($sel);
	while($data = mysql_fetch_array($result))
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data["user_name"]?></td>
      <td><?php echo $data["feedback_message"]?></td>
      <td><?php echo $data["feedback_date"]?></td>
    </tr>
    <?php } ?>
  </table>
  </form>
</body>
</html>

<?php include("Foot.php"); ?>   

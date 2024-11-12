<?php 
include("../Assest/Connection/connection.php");
session_start();
include("Head.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ViewHead</title>
      <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        /* Table Container */
        .table-container {
            width:600px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        /* Table Styling */
        table {
            width: 800px;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        /* Action Link */
        a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            color: #0056b3;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <table align="center" style="margin-top:250px">
    <tr>
      <th>SNo</th>
      <th>Ward</th>
      <th>User</th>
      <th>Action</th>
      </tr>
       <?php 
        $i = 0;
		$selQry = "SELECT * FROM tbl_collectionhead c 
		INNER JOIN tbl_ward w ON w.ward_id = c.ward_id 
		INNER JOIN tbl_user u ON u.user_id = c.user_id ";
		 $result = mysql_query($selQry);
        while($data = mysql_fetch_array($result)) {
            $i++;
			 ?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data['ward_no'] ?></td>
      <td><?php echo $data['user_name'] ?></td>
       
       <td>
            <a href="ViewDetails.php?headid=<?php echo $data["collectionhead_id"] ?>">View</a>
        </td>
        </tr>
    <?php } ?>
    </table>
</body>
</html>

<?php include("Foot.php"); ?>
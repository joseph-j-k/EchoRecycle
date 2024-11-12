<?php

include("../Assest/Connection/connection.php");
session_start(); 

include("Head.php");

if(isset($_POST['btnsubmit'])) {
	$wardId = $_POST['selward'];
  $userId = $_POST['seluser'];
	$insertHeadQry = "INSERT INTO tbl_collectionhead(ward_id, user_id,  collectionhead_date, wastepicker_id)
                      VALUES ('".$wardId."', '".$userId."', CURDATE(), '".$_SESSION["wid"]."')";
    
    if(mysql_query($insertHeadQry))
    {
      ?>
      <script>
        alert('Collection Head Data Submitted Successfully!');
        </script>
        <?php
    }
    
    
}


if (isset($_GET["headid"])) {
	$_SESSION["headid"]=$_GET["headid"];
   header("location:Collectiondetails.php");
   exit();
}
	?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Waste Collection Head</title>
<style>

    h1 {
        text-align: center;
        color: #333;
        margin: 20px 0;
    }

    table {
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        background-color: #fff;
    }

    th, td {
        padding: 12px;
        text-align: left;
        border: 1px solid #ddd;
    }

    th {
    background-color: #28a745; /* Change blue to green */
    color: white;
     }
    

    tr:hover {
        background-color: #f1f1f1;
    }

    select {
        width: 100%;
        padding: 8px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    input[type="submit"] {
    background-color: #28a745; /* Green background for the submit button */
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    }

   input[type="submit"]:hover {
    background-color: #218838; /* Darker green on hover */
     }

</style>
</head>

<body>
<h1 align="center">Waste Collection Head</h1>  
<?php
$select = "SELECT * FROM  tbl_user u INNER JOIN tbl_ward w ON  w.ward_id = u.ward_id WHERE u.user_id = '".$_GET["collctionheadid"]."'";
$resultsel = mysql_query($select);
$datasel = mysql_fetch_array($resultsel);
?>
<form id="form1" name="form1" method="post">
  <table width="200" border="1" align="center">
    <tbody>
      <tr>
        <td>Ward</td>
        <td>
          <input type = "hidden" name="selward" value="<?php echo $datasel["ward_id"] ?>"  />
          <input type = "text"  value="<?php echo $datasel["ward_no"] ?>"  readonly/>
        </td>  
            </tr>
      <tr>
        <td>User</td>
        <td>
          <input type = "hidden" name="seluser" value="<?php echo $datasel["user_id"] ?>"  />
          <input type = "text"  value="<?php echo $datasel["user_name"] ?>"  readonly/>
        </td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit"></td>
      </tr>
    </tbody>
  </table>
  <br>
  <br>
  <table align="center" width="200" border="1">
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
		INNER JOIN tbl_user u ON u.user_id = c.user_id WHERE wastepicker_id='".$_SESSION["wid"]."'";
		 $result = mysql_query($selQry);
        while($data = mysql_fetch_array($result)) {
            $i++;
			 ?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data['ward_no'] ?></td>
      <td><?php echo $data['user_name'] ?></td>
       
       <td>
            <a href="Collectiondetails.php?headid=<?php echo $data["collectionhead_id"] ?>">View</a>
        </td>
        </tr>
    <?php } ?>
    </table>
</form>
</body>
</html>
<?php include("Foot.php"); ?>
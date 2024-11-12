<?php
include("../Assest/Connection/connection.php");
include("Head.php");
if(isset($_POST["btnsubmit"]))
{
	$photo=$_FILES["fileimage"]["name"];
	$temp=$_FILES["fileimage"]["tmp_name"];
	move_uploaded_file($temp,"../Assest/File/Wastetype/".$photo);
	$insQry="insert into tbl_wastetype(wastetype_name,wastetype_image)values('".$_POST["txtwastetype"]."','$photo')";
	mysql_query($insQry);
	}
	if(isset($_GET["did"]))
	  {
		  $delQry="delete from tbl_wastetype where wastetype_id='".$_GET["did"]."'";
		  mysql_query($delQry);
	  }
		  
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Product Name</title>
<style>
  h1 {
    text-align: center;
    color: #444;
    font-size: 24px;
    margin-bottom: 20px;
  }

  .form {
    max-width: 500px;
    margin: 0 auto;
    padding: 20px;
    background-color: #ffffff;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }

  table, th, td {
    padding: 8px;
    text-align: center;
  }

  th {
    background-color: #4CAF50;
    color: white;
    font-weight: bold;
  }

  tr:nth-child(even) {
    background-color: #f2f2f2;
  }


  input[type="text"], input[type="file"] {
    width: 90%;
    padding: 8px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 4px;
    display: block;
    margin: 10px auto;
  }

  input[type="submit"], input[type="reset"] {
    padding: 10px 20px;
    font-size: 14px;
    color: #fff;
    background-color: #4CAF50;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
    margin: 10px 5px;
  }

  input[type="submit"]:hover, input[type="reset"]:hover {
    background-color: #45a049;
  }

  .a {
    color: #4CAF50;
    text-decoration: none;
    font-weight: bold;
  }

  .a:hover {
    color: #333;
  }
</style>
</head>
<body>
 <br /><br />
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1" class="form">
<h1 align="center">Wastetype</h1>
  <table align="center">
    <tr>
      <td width="86">Waste Type</td>
      <td width="218"><label for="txtwastetype"></label>
      <input type="text" name="txtwastetype" id="txtwastetype" /></td>
    </tr>
    <tr>
      <td>Image</td>
      <td><label for="fileimage"></label>
      <input type="file" name="fileimage" id="fileimage" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
      <input type="reset" name="btnreset" id="btnreset" value="Reset" /></td>
    </tr>
  </table>
  </br>
  <table  align="center">
    <tr>
      <td>#</td>
      <td>WasteType Name</td>
      <td>Image</td>
      <td>Action</td>
  </tr>
  <?php
  $i=0;
  $sel = "select * from tbl_wastetype";
  $result=mysql_query($sel);
  while($data=mysql_fetch_array($result))
  {
	  $i++;
  ?>
    <tr>
     <td><?php echo $i ?></td>
     <td><?php echo $data["wastetype_name"] ?></td>
     <td><?php echo $data["wastetype_image"] ?></td>
     <td>
     <a href="Wastetype.php?did=<?php echo $data["wastetype_id"]?>" class="a">Delete</a></td>
	 </tr>
	 <?php }?>
  </table>
</form>
 <br /><br />
</body>
</html>
<?php include("Foot.php"); ?>

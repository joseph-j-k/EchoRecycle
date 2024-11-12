<?php
     include("../Assest/Connection/connection.php");
     include("Head.php");
	  if(isset($_POST["btnsubmit"]))
	  {
		  $insQry="insert into tbl_unit(unit_qty)values('".$_POST["txtunitquantity"]."')";
		  mysql_query($insQry);
	  }
	  if(isset($_GET["did"]))
	  {
		  $delQry="delete from tbl_unit where unit_id='".$_GET["did"]."'";
		  mysql_query($delQry);
	  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Unit</title>
<style>
  h1 {
    text-align: center;
    font-size: 24px;
    color: #333;
  }

  .form {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #ffffff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
  }

  table {
    width: 100%;
    margin: 20px auto;
    border-collapse: collapse;
  }


  th, td {
    padding: 12px;
    font-size: 14px;
    text-align: center;
  }

  th {
    background-color: #4CAF50;
    color: white;
    font-weight: bold;
  }

  tr:nth-child(even) {
    background-color: #f9f9f9;
  }



  input[type="text"], input[type="submit"], input[type="reset"] {
    padding: 8px;
    font-size: 14px;
    border: 1px solid #ddd;
    border-radius: 5px;
  }

  input[type="submit"], input[type="reset"] {
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s;
    margin-top: 10px;
  }

  input[type="submit"]:hover, input[type="reset"]:hover {
    background-color: #45a049;
  }

  .a {
    text-decoration: none;
    color: #4CAF50;
    font-weight: bold;
  }

  .a:hover {
    color: #333;
  }
</style>
</head>

<body>
<br /><br />    
<form id="form1" name="form1" method="post" action="" class="form">
<h1 align="center">Unit</h1>
  <table align="center">
    <tr>
      <td style="font-weight:bolder; font-size:20px; font-color:black;">Unit</td>
      <td><label for="txtunitquantity"></label>
      <input type="text" required name="txtunitquantity" id="txtunitquantity" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
      <input type="reset" name="btnreset" id="btnreset" value="Reset" /></td>
    </tr>
  </table>
  <br/>
  <br/>
  <table  align="center">
    <tr>
      <td>#</td>
      <td>Unit</td>
      <td>Action</td>
  </tr>
  <?php
  $i=0;
  $sel = "select * from tbl_unit";
  $result=mysql_query($sel);
  while($data=mysql_fetch_array($result))
  {
	  $i++;
  ?>
    <tr>
     <td><?php echo $i ?></td>
     <td><?php echo $data["unit_qty"] ?></td>
     <td>
     <a href="Unit.php" class="a">Edit</a>
     <a href="Unit.php?did=<?php echo $data["unit_id"]?>" class="a">Delete</a>
	 </tr>
	 <?php }?>
  </table>
</form>
<br /><br />  
</body>
</html>
<?php include("Foot.php"); ?>
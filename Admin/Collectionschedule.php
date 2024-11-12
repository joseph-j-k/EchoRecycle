<?php
      include("../Assest/Connection/connection.php");
       include("Head.php");
	  if(isset($_POST["btnsubmit"]))
	  {
		  $insQry="insert into tbl_schedule(schedule_date,wastepicker_id,ward_id)values('".$_POST["dat"]."','".$_POST["selcollectorname"]."','".$_POST["selwardnumber"]."')";
		  mysql_query($insQry);
	  }
	  if(isset($_GET["did"]))
	  {
		  $delQry="delete from tbl_schedule where schedule_id='".$_GET["did"]."'";
		  mysql_query($delQry);
	  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Collectionschedule</title>
<style>

  h1 {
    text-align: center;
    color: #333;
    font-size: 24px;
    margin-bottom: 20px;
  }

  .form {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #ffffff;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
  }

  table {
    width: 100%;
    margin: 20px auto;
    border-collapse: collapse;
  }

  th, td {
    padding: 12px;
    text-align: center;
    font-size: 14px;
  }

  th {
    background-color: #4CAF50;
    color: white;
    font-weight: bold;
  }

  tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  input[type="text"], input[type="date"], select {
    width: 90%;
    padding: 8px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }

  input[type="submit"], input[type="reset"] {
    padding: 10px 15px;
    font-size: 14px;
    color: #ffffff;
    background-color: #4CAF50;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
    margin: 5px;
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
<form id="form1" name="form1" method="post" action="" class="form">
<h1 align="center">Collection Schedule</h1>
  <table align="center">
    <tr>
      <td width="108">Schedule Date</td>
      <td><input type="date" name="dat" id="dat"/></td>
    </tr>
    <tr>
      <td>Waste Collector Name</td>
      <td><label for="selcollectorname"></label>
        <select name="selcollectorname" id="selcollectorname">
         <?php
		$select = "select * from tbl_wastepicker";
		$result = mysql_query($select);
		while($data = mysql_fetch_array($result))
		{
		?>
        <option value="<?php echo $data["wastepicker_id"]?>"><?php echo $data["wastepicker_name"]?></option>
        <?php } ?>
      </select></td>
    </tr>
    <tr>
      <td>Ward Number</td>
      <td><label for="selwardnumber"></label>
        <select name="selwardnumber" id="selwardnumber">
        <option>----Select---</option>
        <?php
		$select = "select * from tbl_ward";
		$result = mysql_query($select);
		while($data = mysql_fetch_array($result))
		{
		?>
        <option value="<?php echo $data["ward_id"]?>"><?php echo $data["ward_no"]?></option>
        <?php } ?>
      </select></td>
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
      <td>Schedule date</td>
      <td>Waste Collector name</td> 
      <td>Ward Number</td>
      <td>Action</td>
  </tr>
  <?php
  $i=0;
  $sel = "select * from tbl_schedule p inner join tbl_wastepicker w on p.wastepicker_id=w.wastepicker_id inner join tbl_ward c on p.ward_id=c.ward_id";
  $result=mysql_query($sel);
  while($data=mysql_fetch_array($result))
  {
	  $i++;
  ?>
    <tr>
     <td><?php echo $i ?></td>
     <td><?php echo $data["schedule_date"] ?></td>
     <td><?php echo $data["wastepicker_name"] ?></td>
     <td><?php echo $data["ward_no"] ?></td>
     <td>
     <a href="Collectionschedule.php" class="a">Edit</a>
     <a href="Collectionschedule.php?did=<?php echo $data["schedule_id"]?>" class="a">Delete</a>
	 </tr>
	 <?php }?>
  </table>
</form>
<br /><br />
</body>
</html>
<?php include("Foot.php"); ?>
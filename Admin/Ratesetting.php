<?php

      include("../Assest/Connection/connection.php");
	  include("Head.php");
$eid ="";
 $ewastetype = "";
$eamount= "";
 $message ="";

	  if(isset($_POST["btnsubmit"]))
	  {
	  $Wastetype = $_POST["selwastetype"];
	  $Amount = $_POST["txtamount"];
    $hid = $_POST["hid"];

    if ($hid != null) {
        // If $hid is set, perform the update
        $update = "UPDATE tbl_rate SET wastetype_id='$Wastetype',rate_amount='$Amount' WHERE rate_id='$hid'";
        mysql_query($update);
        $message = "Ward details updated successfully.";
    } else {
         $insQry="insert into tbl_rate(wastetype_id,rate_amount)values ('$Wastetype','$Amount')";
		  mysql_query($insQry);
        $message = "New ward added successfully.";
    }
}	
	  
if (isset($_GET["did"])) {
    $delQry = "DELETE FROM tbl_rate WHERE rate_id='" . $_GET["did"] . "'";
    mysql_query($delQry);
}
	  
if (isset($_GET["eid"])) {
    $sel = "SELECT * FROM tbl_rate WHERE rate_id='" . $_GET["eid"] . "'";
    $result1 = mysql_query($sel);
    if ($data = mysql_fetch_array($result1)) {
        $eid = $data["rate_id"];
        $ewastetype = $data["wastetype_id"];
		$eamount= $data["rate_amount"];
    }
}
	 ?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rate setting</title>
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

  input[type="text"], select, input[type="submit"], input[type="reset"] {
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
<?php if ($message) { echo "<p align='center' style='color:green;'>$message</p>"; } ?>
<br /><br />  
<form id="form1" name="form1" method="post" action="" class="form">
<h1 align="center">Rate Setting</h1>
  <table align="center">
    <tr>
      <td width="70">Waste Type</td>
      <input type="hidden" name="hid" id="hid" value="<?php echo $eid ?>" />
      <td width="144"><label for="selwastetype"></label>
        <select name="selwastetype" required id="selwastetype" value="<?php echo $ewastetype ?>">
         <?php
		$select = "select * from tbl_wastetype";
		$result = mysql_query($select);
		while($data = mysql_fetch_array($result))
		{
		?>
        <option value="<?php echo $data["wastetype_id"]?>" <?php if ($data["wastetype_id"] == $ewastetype) echo "selected"; ?>>
                <?php echo $data["wastetype_name"] ?>
            </option>
        <?php } ?>
      </select></td>
    </tr>
    <tr>
      <td>Amount</td>
      <td><label for="txtamount"></label>
      <input type="text" name="txtamount" id="txtamount" required value="<?php echo $eamount ?>"/></td>
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
      <td>Waste Type</td>
      <td>Amount</td>
      <td>Action</td>
  </tr>
  <?php
  $i=0;
  $sel = "select * from tbl_rate p inner join tbl_wastetype w on p.wastetype_id=w.wastetype_id";
  $result=mysql_query($sel);
  while($data=mysql_fetch_array($result))
  {
	  $i++;
  ?>
    <tr>
     <td><?php echo $i ?></td>
     <td><?php echo $data["wastetype_name"] ?></td>
     <td><?php echo $data["rate_amount"] ?></td>
     <td>
     <a href="Ratesetting.php?eid=<?php echo $data["rate_id"] ?>" class="a">Edit</a>
     <a href="Ratesetting.php?did=<?php echo $data["rate_id"]?>" class="a">Delete</a>
	 </tr>
	 <?php }?>
  </table>
</form>
<br /><br />
</body>
</html>
<?php include("Foot.php"); ?>
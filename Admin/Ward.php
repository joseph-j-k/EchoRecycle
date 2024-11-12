<?php
include("../Assest/Connection/connection.php");
include("Head.php");
$eid = $eno = "";
$message = "";

if (isset($_POST["btnsubmit"])) {
    $No = $_POST["txtwardnumber"];
    $hid = $_POST["hid"];

    if ($hid != null) {
        // If $hid is set, perform the update
        $update = "UPDATE tbl_ward SET ward_no='$No' WHERE ward_id='$hid'";
        mysql_query($update);
        $message = "Ward details updated successfully.";
    } else {
        // If $hid is not set, perform the insert
        $insQry = "INSERT INTO tbl_ward (ward_no) VALUES ('$No')";
        mysql_query($insQry);
        $message = "New ward added successfully.";
    }
}

if (isset($_GET["did"])) {
    $delQry = "DELETE FROM tbl_ward WHERE ward_id='" . $_GET["did"] . "'";
    mysql_query($delQry);
}


if (isset($_GET["eid"])) {
    $sel = "SELECT * FROM tbl_ward WHERE ward_id='" . $_GET["eid"] . "'";
    $result1 = mysql_query($sel);
    if ($data = mysql_fetch_array($result1)) {
        $eid = $data["ward_id"];
        $eno = $data["ward_no"];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Ward Form</title>
<style>

  h1 {
    text-align: center;
    font-size: 24px;
    color: #333;
    margin-top: 20px;
  }

  p {
    text-align: center;
    font-size: 16px;
    color: green;
  }

  .form {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
  }

  table {
    width: 100%;
    margin: 20px auto;
    border-collapse: collapse;
  }

  table, th, td {
    border: 1px solid #ddd;
  }

  th, td {
    padding: 12px;
    text-align: left;
    font-size: 14px;
  }

  th {
    background-color: #4CAF50;
    color: white;
    font-weight: bold;
    text-align: center;
  }

  tr:nth-child(even) {
    background-color: #f9f9f9;
  }

  tr:hover {
    background-color: #f1f1f1;
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
    cursor: pointer;
    border: none;
    transition: 0.3s;
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
<br /> <br />
<form id="form1" name="form1" method="post" action="" class="form">
    <h1 align="center">Ward Form</h1>
    <table align="center" border="1">
        <tr>
            <td>Ward Number</td>
            <td>
                <input type="hidden" name="hid" id="hid" value="<?php echo $eid ?>" />
                <input type="text" required name="txtwardnumber" id="txtwardnumber" value="<?php echo $eno ?>" />
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
                <input type="reset" name="btnreset" id="btnreset" value="Reset" />
            </td>
        </tr>
    </table>
    </br>
   <table align="center" border="1">
    <tr>
        <td>#</td>
        <td>Ward Number</td>
        <td>Action</td>
    </tr>
    <?php
    $i = 0;
    $sel = "SELECT * FROM tbl_ward";
    $result = mysql_query($sel);
    while ($data = mysql_fetch_array($result)) {
        $i++;
    ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $data["ward_no"] ?></td>
        <td>
            <a href="Ward.php?eid=<?php echo $data["ward_id"] ?>" class="a">Edit</a>
            <a href="Ward.php?did=<?php echo $data["ward_id"] ?>" class="a">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>
</form>
<br /> <br />
</body>
</html>
<?php include("Foot.php"); ?>
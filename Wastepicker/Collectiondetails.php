<?php
include("../Assest/Connection/connection.php");
session_start();
$headid = isset($_GET['headid']) ? $_GET['headid'] : '';


include("Head.php");

if(isset($_POST["btnsubmit"])) {
    $detailsid = $_POST["txthid"];

    echo $insQry = "INSERT INTO tbl_collectiondetails(wastetype_id, unit_id, collectiondetails_qty, rate_id, collectionhead_id, collection_date) 
                   VALUES ('".$_POST["selwastetype"]."', '".$_POST["selunit"]."', '".$_POST["txtqty"]."', '".$_POST["selrate"]."', '".$detailsid."', CURDATE())";
    if(mysql_query($insQry)) {
    ?>
    <script>
        alert("Inserted");
        location.href='Collectiondetails.php?headid=<?php echo $detailsid;?>';
    </script>
    <?php 
    }
}

$select = "SELECT * FROM tbl_collectiondetails";
$result = mysql_query($select);
$row = mysql_fetch_array($result);

if(isset($_GET["m"])) {
    $delqry="DELETE FROM tbl_collectiondetails WHERE collectiondetails_id = '".$_GET["m"]."'";
    if(mysql_query($delqry)) {
    ?>
    <script>
        alert("Deleted");
        location.href='Collectiondetails.php?hid=<?php echo $_GET["headid"];?>';
    </script>
    <?php
    }
}




?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Waste Collection Details</title>
<style>
    /* General Styling */
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
        background-color: #007BFF;
        color: white;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    select, input[type="text"] {
        width: 100%;
        padding: 8px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    input[type="submit"] {
        background-color: #28a745;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    input[type="submit"]:hover {
        background-color: #218838;
    }

    /* Summary Section */
    .summary-container {
        width: 80%;
        margin: 30px auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        text-align: center;
    }

    .total-amount {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 20px;
        color: #333;
    }

    .total-amount span {
        font-size: 22px;
        color: #28a745;
    }

    .invoice-link {
        margin-top: 20px;
    }

    .invoice-button {
        padding: 12px 20px;
        background-color: #007BFF;
        color: white;
        font-size: 16px;
        text-decoration: none;
        border-radius: 4px;
        display: inline-block;
    }

    .invoice-button:hover {
        background-color: #0056b3;
    }

    .invoice-button:focus {
        outline: none;
    }
</style>
</head>

<body>
<h1>Waste Collection Details</h1>  
<form id="form1" name="form1" method="post">
  <input type="hidden" name="txthid" value="<?php echo $_GET['headid']; ?>" />
  
  <table align="center" width="200" border="1">
    <tr>
      <td>Waste Type</td>
      <td><select name="selwastetype" id="selwastetype" onChange="getrate(this.value)">
          <option>----Select---</option>
          <?php
          $select = "SELECT * FROM tbl_wastetype";
          $result = mysql_query($select);
          while($data = mysql_fetch_array($result)) {
          ?>
          <option value="<?php echo $data['wastetype_id']?>"><?php echo $data['wastetype_name']?></option>
          <?php } ?>
        </select></td>
    </tr>
    <tr>
      <td>Rate</td>
      <td><select name="selrate" id="selrate">
          <option>----Select---</option>
        </select></td>
    </tr>
    <tr>
      <td>Unit</td>
      <td><select name="selunit" id="selunit">
          <option>----Select---</option>
          <?php
          $select = "SELECT * FROM tbl_unit";
          $result = mysql_query($select);
          while($data = mysql_fetch_array($result)) {
          ?>
          <option value="<?php echo $data['unit_id']?>"><?php echo $data['unit_qty']?></option>
          <?php } ?>
        </select></td>
    </tr>
    <tr>
      <td>Quantity</td>
      <td><input type="text" name="txtqty" id="txtqty" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" /></td>
    </tr>
  </table>
</form>

<!-- Table for Collection Details -->
<div class="table-container">
    <table>
        <tr>
            <th>SNo</th>
            <th>Wastetype</th>
            <th>Rate</th>
            <th>Unit</th>
            <th>Quantity</th>
            <th>Total Amount</th>
            <th>Action</th>
        </tr>
        <?php 
        $i = 0;
        $total_amount_all = 0;
        $selQry = "SELECT * FROM tbl_collectiondetails d 
        INNER JOIN tbl_wastetype w ON d.wastetype_id = w.wastetype_id 
        INNER JOIN tbl_rate r ON r.rate_id = d.rate_id
        INNER JOIN tbl_unit u ON u.unit_id = d.unit_id 
        INNER JOIN tbl_collectionhead h on h.collectionhead_id = d.collectionhead_id 
        WHERE h.collectionhead_id='".$_GET["headid"]."'";
        $result = mysql_query($selQry);
        while($data = mysql_fetch_array($result)) {
            $i++;
            $total_amount = $data['rate_amount'] * $data['collectiondetails_qty'];
            $total_amount_all += $total_amount;
        ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $data['wastetype_name'] ?></td>
            <td><?php echo $data['rate_amount'] ?></td>
            <td><?php echo $data['unit_qty'] ?></td>
            <td><?php echo $data['collectiondetails_qty'] ?></td>
            <td><?php echo $total_amount ?></td>
            <td>
                <a href="Collectiondetails.php?m=<?php echo $data["collectiondetails_id"]; ?>&hid=<?php echo $headid; ?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>

<!-- Total Amount Section -->
<div class="summary-container">
    <div class="total-amount">
        <p><strong>Total Amount for All Products: </strong><span><?php echo $total_amount_all; ?></span></p>
    </div>
</div>

<script src="../Assest/JQ/jQuery.js"></script> 
<script>
function getrate(rid) {
    $.ajax({
        url: "../Assest/AjaxPages/AjaxRateType.php?rid=" + rid,
        success: function(html) {
            $("#selrate").html(html);
        }    
    });
}
</script>

</body>
</html>

<?php include("Foot.php"); ?>

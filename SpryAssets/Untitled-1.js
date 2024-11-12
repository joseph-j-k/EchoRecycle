<?php

include("../Assest/Connection/connection.php");
session_start(); 

// Fetch the latest user_id
$fetchQry = "SELECT MAX(user_id) as max_id FROM  tbl_user";
$result = mysql_query($fetchQry);
$row =  mysql_fetch_array($result);
$userId = $row['max_id'] ? $row['max_id'] + 1 : 1;  // If no user, start from 1

// Generate OP number (1000 + primary key of patient)
$billNumber = 1000 + $userId;

// When the add button is clicked, insert values into tbl_collectiondetails
if(isset($_POST["btnadd"]))
{

    $insQry = "INSERT INTO tbl_collectiondetails(wastetype_id, unit_id, collectiondetails_qty, rate_id) 
               VALUES ('".$_POST["selwastetype"]."', '".$_POST["selunit"]."', '".$_POST["txtqty"]."', '".$_POST["selrate"]."')";
    mysql_query($insQry);
}


// When the submit button is clicked, insert values into tbl_collectionhead
if(isset($_POST['btnsubmit'])) {
    $wardId = $_POST['selward'];
    $userId = $_POST['seluser'];
    $bill = $_POST["txtbill"];
    $date = $_POST['txtdate'];
    $grandTotal = $_POST['txttotal'];

    // Insert into tbl_collectionhead
    $insertHeadQry = "INSERT INTO tbl_collectionhead(ward_id, user_id, collectionhead_billno, collectionhead_date, collectionhead_totalamount, wastepicker_id)
                      VALUES ('$wardId', '$userId', '$bill', '$date', '$grandTotal', '".$_SESSION["wid"]."')";
    mysql_query($insertHeadQry);
    
    echo "Collection Head Data Submitted Successfully!";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Waste Collection Details</title>
    <meta charset="utf-8" />
</head>
<body>
<form id="form1" method="post">
    <h1 align="center">Waste Collection Details</h1>
    <table align="center" width="200" border="1">
        <!-- First table for ward, user, bill no, and date -->
        <tr>
            <td>Ward</td>
            <td>
                <select name="selward" id="selward" onchange="getuser(this.value)">
                    <option>----Select---</option>
                    <?php
                    $select = "SELECT * FROM tbl_ward";
                    $result = mysql_query($select);
                    while($data = mysql_fetch_array($result)) {
                    ?>
                        <option value="<?php echo $data['ward_id']?>"><?php echo $data['ward_no']?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>User</td>
            <td>
                <select name="seluser" id="seluser">
                    <option>----Select---</option>
                    <?php
                    $select = "SELECT * FROM tbl_user";
                    $result = mysql_query($select);
                    while($data = mysql_fetch_array($result)) {
                    ?>
                        <option value="<?php echo $data['user_id']?>"><?php echo $data['user_name']?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Bill No</td>
            <td><input type="text" name="txtbill" id="txtbill" readonly value="<?php echo $billNumber; ?>"/></td>
        </tr>
        <tr>
            <td>Date</td>
            <td><input type="date" name="txtdate" id="txtdate" /></td>
        </tr>
    </table>

    <br /><br />

    <!-- collection Details -->
    <!-- Second table for waste type, unit, quantity -->
    <table align="center" width="200" border="1">
    <tr>
            <td>Rate</td>
            <td>
                <select name="selrate" id="selrate" onchange="getwasteType(this.value)">
                    <option>----Select---</option>
                    <?php
                    $select = "SELECT * FROM tbl_rate ";
                    $result = mysql_query($select);
                    while($data = mysql_fetch_array($result)) {
                    ?>
                        <option value="<?php echo $data['rate_id']?>"><?php echo $data['rate_amount']?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Waste Type</td>
            <td>
                <select name="selwastetype" id="selwastetype">
                    <option>----Select---</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Unit</td>
            <td>
                <select name="selunit" id="selunit">
                    <option>----Select---</option>
                    <?php
                    $select = "SELECT * FROM tbl_unit";
                    $result = mysql_query($select);
                    while($data = mysql_fetch_array($result)) {
                    ?>
                        <option value="<?php echo $data['unit_id']?>"><?php echo $data['unit_quantity']?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Quantity</td>
            <td><input type="text" name="txtqty" id="txtqty" /></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="btnadd" id="btnadd" value="Add" />
            </td>
        </tr>
    </table>

    <br /><br />

    <!-- Bottom table to display totals -->
    <table align="center" width="200" border="1">
        <tr>
            <th>SNo</th>
            <th>Waste Type</th>
            <th>Unit</th>
            <th>Quantity</th>
            <th>Rate</th>
            <th>Total</th>
        </tr>
        <?php 
        $i = 0;
        $grandTotal = 0; 
        $selQry = "SELECT * FROM tbl_collectiondetails c 
                   INNER JOIN tbl_wastetype w ON w.wastetype_id = c.wastetype_id 
                   INNER JOIN tbl_unit u ON u.unit_id = c.unit_id 
                   INNER JOIN tbl_rate r ON r.wastetype_id = c.wastetype_id AND r.unit_id = c.wastetype_id"; 
        $result = mysql_query($selQry);
        while($data = mysql_fetch_array($result)) {
            $i++;
            $qty = $data['collectiondetails_qty'];
            $rate = $data['rate_amount'];
            $total = $qty * $rate; 
            $grandTotal += $total;
        ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $data['wastetype_name'] ?></td>
            <td><?php echo $data['unit_quantity'] ?></td>
            <td><?php echo $data['collectiondetails_qty'] ?></td>
            <td><?php echo $rate ?></td>
            <td><?php echo $total ?></td>
        </tr>
        <?php } ?>
        <tr>
            <td colspan="6" align="right">
                <label>Total</label>
                <input type="text" name="txttotal" id="txttotal" value="<?php echo $grandTotal; ?>" readonly />
            </td>
        </tr>
        <tr>
            <td colspan="6" align="right">
                <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
            </td>
        </tr>
    </table>
</form>

<script src="../Assest/JQ/jQuery.js"></script> 
<script>
function getuser(wid) {
    $.ajax({
        url: "../Assest/AjaxPages/AjaxUser.php?wid=" + wid,
        success: function(html) {
            $("#seluser").html(html);
        }    
    });
}


function getwasteType(tid) {
    $.ajax({
        url: "../Assest/AjaxPages/AjaxWateType.php?tid=" + tid,
        success: function(html) {
            $("#selwastetype").html(html);
        }    
    });
}
</script>
</body>
</html>
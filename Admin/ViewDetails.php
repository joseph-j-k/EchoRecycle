<?php 
include("../Assest/Connection/connection.php");
session_start(); 
$headid = isset($_GET['headid']) ? $_GET['headid'] : '';
include("Head.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collection Details</title>
    <style>
        /* Reset styling */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            background-color: #f3f4f6;
            color: #333;
        }

        h1 {
            margin-bottom: 20px;
            font-size: 1.5rem;
            color: #007bff;
        }

        .table-container {
            width: 90%;
            max-width: 800px;
            margin-bottom: 20px;
            overflow-x: auto;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #eaf1ff;
        }

        .summary-container {
            width: 90%;
            max-width: 800px;
            margin-top: 20px;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
        }

        .total-amount p {
            font-size: 1.2rem;
            color: #333;
        }

        .invoice-link {
            margin-top: 15px;
        }

        .invoice-button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .invoice-button:hover {
            background-color: #0056b3;
        }

        .invoice-link span {
            color: #28a745;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <!-- Table for Collection Details -->
    <div class="table-container" style="margin-top:200px; margin-left:140px">
        <table>
            <tr>
                <th>SNo</th>
                <th>Waste Type</th>
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
                    <a href="Collectiondetails.php?m=<?php echo $data["collectiondetails_id"]; ?>&hid=<?php echo $headid; ?>" style="color: red;">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </table>

    <!-- Total Amount Section -->
    <div class="summary-container">
        <div class="total-amount">
            <p><strong>Total Amount for All Products: </strong><span><?php echo $total_amount_all; ?></span></p>
        </div>

        <!-- Prepare Invoice Section -->
        <div class="invoice-link">
            <?php 
            $select1 = "select * from  tbl_collectionhead";
            $result1  = mysql_query($select1);
            $data1 = mysql_fetch_array($result1);
            $status = $data1["collection_status"];
            if($status == 0)
            {
            ?>
            <a href="Invoice.php?total_amount=<?php echo urlencode($total_amount_all); ?>&hid=<?php echo $_GET['headid']; ?>" class="invoice-button">Prepare Invoice for Total Amount</a>
            <?php 
            }
            else{
                echo "<span>Already Paid</span>";
            }
            ?>
        </div>
    </div>
        </div>
</body>
</html>

<?php include("Foot.php"); ?>
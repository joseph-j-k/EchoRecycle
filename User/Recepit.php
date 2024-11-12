<?php 
include("../Assest/Connection/connection.php");
session_start(); 
include("Head.php");

$headid = $_GET["hid"];
$total_amount = isset($_GET["total_amount"]) ? $_GET["total_amount"] : 0;

$select1 = "SELECT d.*, t.wastetype_name, u.unit_qty, r.rate_amount, 
           (r.rate_amount * d.collectiondetails_qty) AS total_amount, usr.user_name 
    FROM tbl_collectiondetails d 
    INNER JOIN tbl_wastetype t ON t.wastetype_id = d.wastetype_id 
    INNER JOIN tbl_unit u ON u.unit_id = d.unit_id 
    INNER JOIN tbl_rate r ON r.rate_id = d.rate_id 
    INNER JOIN tbl_collectionhead h ON h.collectionhead_id = d.collectionhead_id 
    INNER JOIN tbl_user usr ON usr.user_id = h.user_id  
    WHERE usr.user_id='".$_SESSION["uid"]."'"; 

$result1 = mysql_query($select1);
$total = 0;

$select3 = "select * from tbl_collectionhead h inner join tbl_wastepicker w ON w.wastepicker_id = h.wastepicker_id inner join  tbl_collectiondetails d on h.collectionhead_id = d.collectionhead_id";
$result3 = mysql_query($select3);
$data3 = mysql_fetch_array($result3);
$wastepickerName = $data3["wastepicker_name"];
$date = $data3["collection_date"];
$invoice = $data3["collectiondetails_id"] + 1000;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f9f9f9;
            margin-top: 30px;
            height: auto;
        }
        .receipt-box {
            max-width: 850px;
            margin: auto;
            padding: 12px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            font-size: 14px;
            line-height: 1.4;
        }
        .receipt-header h1 {
            font-size: 2.5rem;
            color: #28a745;
            margin-bottom: 10px;
        }
        .receipt-summary th,
        .receipt-summary td {
            text-align: right;
        }
        .total {
           font-size: 1.2rem;
           color: #28a745;
        }
    </style>
</head>
<body>

    <div class="receipt-box" style="margin-top:50px">
        <div class="receipt-header text-center">
            <h1>Receipt</h1>
            <p><strong>EcoRecycle</strong><br>123 Green Avenue Sector 12<br>Idukky, Kerala, 560102</p>
            <p>Date: <?php echo $date ?></p>
            <p>WasterPicker: <?php echo $wastepickerName ?></p>
            <p>Receipt #: <?php echo $invoice ?></p>
        </div>

        <div class="receipt-details">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Waste Type</th>
                        <th>Rate</th>
                        <th>Unit</th>
                        <th>Quantity</th>
                        <th>Total Amount</th>
                    </tr> 
                </thead>
                <tbody>
                    <?php 
                    $i=0;
                    while($data = mysql_fetch_array($result1))
                    {
                        $i++;
                        $total += $data["total_amount"];
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $data["wastetype_name"]; ?></td>
                        <td><?php echo $data["rate_amount"]; ?></td>
                        <td><?php echo $data["unit_qty"]; ?></td>
                        <td><?php echo $data["collectiondetails_qty"]; ?></td>
                         <td><?php echo number_format($data["total_amount"], 2); ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="receipt-summary">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Subtotal</th>
                        <td><?php echo number_format($total, 2); ?></td>
                    </tr>
                    <tr>
                        <th>Tax (10%)</th>
                        <?php $taxAmount = $total * 0.10; ?>
                        <td><?php echo number_format($taxAmount, 2); ?></td>
                    </tr>
                    <tr class="total">
                        <th>Total Paid (Including Tax)</th>
                        <?php $grandTotal = $total - $taxAmount; ?>
                        <td>
                            <?php echo number_format($grandTotal, 2); ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="text-center mt-4">
            <p>Thank you for your business!</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php include("Foot.php"); ?>

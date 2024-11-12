<?php 
ob_start();
include('../Asset/Connection/Connection.php');
session_start();
$userid = $_SESSION['uid'];
$finalrate = 0;

$selqry = "select * from tbl_packagebooking pa inner join tbl_newuser u on u.user_id = pa.user_id inner join tbl_package p on p.package_id = pa.package_id  where u.user_id ='".$userid."'";
$result1 = mysql_query($selqry); 
$data1 = mysql_fetch_array($result1);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Invoice</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #f3f6fb;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .invoice-box {
            background: #fff;
            padding: 25px;
            max-width: 700px;
            width: 100%;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            color: #333;
        }

        header {
            text-align: center;
            padding: 15px 0;
            background-color: #0056b3;
            color: #fff;
            border-radius: 8px 8px 0 0;
        }

        .company-logo {
            font-size: 1.8em;
            font-weight: bold;
        }

        .company-info {
            text-align: center;
            font-size: 0.9em;
            color: #e1ecf4;
            margin-top: 5px;
        }

        .bill-info {
            display: flex;
            flex-direction: column;
            gap: 10px;
            padding: 20px 0;
            border-bottom: 2px solid #f1f4f9;
        }

        .bill-info h3 {
            margin-bottom: 8px;
            font-size: 1.1em;
            color: #0056b3;
        }

        .item-table table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        .item-table th, .item-table td {
            padding: 12px;
            text-align: left;
        }

        .item-table th {
            background-color: #f5f9ff;
            color: #333;
            border-top: 2px solid #e3e7ed;
            border-bottom: 2px solid #e3e7ed;
            font-size: 0.95em;
        }

        .item-table tbody tr:hover {
            background-color: #f1f4f9;
            transition: background-color 0.3s ease;
        }

        .total-section {
            text-align: right;
            padding: 15px 0;
            border-top: 2px solid #f1f4f9;
            font-size: 1em;
            color: #0056b3;
            font-weight: bold;
        }

        .grand-total {
            font-size: 1.2em;
            color: #d93025;
            padding-top: 8px;
        }

        .notes {
            font-size: 0.9em;
            color: #666;
            padding: 10px 0;
            border-top: 2px solid #f1f4f9;
        }

        footer {
            text-align: center;
            color: #666;
            font-size: 0.9em;
            padding: 15px 0;
            background-color: #f5f9ff;
            border-radius: 0 0 8px 8px;
            margin-top: 20px;
        }

        @media (max-width: 768px) {
            .bill-info {
                flex-direction: column;
                text-align: left;
            }
        }

        .actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 15px;
        }

        .actions .button {
            background-color: #0056b3;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.9em;
            transition: background-color 0.3s ease;
        }

        .actions .button:hover {
            background-color: #003f8a;
        }
    </style>
</head>
<body>
<form id="form1" name="form1" method="post" action="">       
<?php 
$selqry = "select * from  tbl_package p inner join tbl_district d on d.district_id = p.district_id";
$result2 = mysql_query($selqry); 
$data2 = mysql_fetch_array($result2);

if (isset($_POST["btn_pay"])) {
    $amount = $_POST['finalrate'];
    $selQry = "SELECT MAX(booking_id) AS id FROM tbl_packagebooking pa INNER JOIN tbl_package p ON p.package_id = pa.package_id";
    $result3 = mysql_query($selQry); 
    $row = mysql_fetch_array($result3);
    
    $bookingId = $row['id']; 
    header("Location: Payment.php?rate=" . urlencode($amount) . "&bid=" . urlencode($bookingId));
    exit; // Make sure to exit after header redirection
}
?>
<div class="invoice-box">
    <header>
        <div class="company-logo">Travel Agency</div>
        <div class="company-info">
            <p>456 Agency Blvd, City, Country</p>
            <p>Email: contact@travelagency.com | Phone: (555) 555-5555</p>
        </div>
    </header>

    <section class="bill-info">
        <div class="bill-to">
            <h3>Client Information</h3>
            <p>Client Name</p>
            <p>123 Client St, City, Country</p>
            <p>Email: client@example.com | Phone: (555) 555-5555</p>
        </div>
        <div class="invoice-details">
            <p><strong>Booking #:</strong> 100123</p>
            <p><strong>Date of Issue:</strong> 2024-10-31</p>
            <p><strong>Travel Dates:</strong> 2024-11-15 to 2024-11-22</p>
            <p><strong>Destination:</strong> Paris, France</p>
        </div>
    </section>

    <section class="item-table">
        <table>
            <thead>
                <tr>
                    <th>Package</th>
                    <th>District</th>
                    <th>Booking&nbsp;to&nbsp;date</th>
                    <th>Guide</th>
                    <th>Coustomer</th>
                    <th>Persons</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $data1["package_name"] ?></td>
                    <td><?php echo $data2["district_name"] ?></td>
                    <td><?php echo $data1["booking_to_date"] ?></td>
                    <td><?php echo $data1["guide_status"] ?></td>
                    <td><?php echo $data1["user_name"] ?></td>
                    <td><?php echo $data1["person_count"] ?></td>
                    <td><?php echo $data2["package_rate"] * $_GET["count"] ?></td>
                </tr>
            </tbody>
        </table>
    </section>

    <section class="total-section">
        <?php 
            $count = isset($_GET["count"]) ? intval($_GET["count"]) : 0; // Ensure count is an integer
            $package_rate = isset($data2["package_rate"]) ? floatval($data2["package_rate"]) : 0; // Convert to float

            $total = $package_rate * $count;
            $tax = $total * (10 / 100);
            $finalrate = $total + $tax; // Total amount including tax
        ?>
        <p><strong>Subtotal:</strong> <?php echo number_format($total, 2); ?></p>
        <p><strong>Tax (10%):</strong> <?php echo number_format($tax, 2); ?></p>
        <p class="grand-total"><strong>Total:</strong> <?php echo number_format($finalrate, 2); ?></p>
    </section>

    <section class="notes">
        <p><strong>Payment Terms:</strong> Payment is due within 30 days of the issue date. Late payments may incur additional fees.</p>
    </section>

    <footer>
        <p>Thank you for booking with us! Have a wonderful trip!</p>
    </footer>

    <div class="actions">
        <input type="hidden" name="finalrate" value="<?php echo $finalrate; ?>" />
        <input type="submit" name="btn_pay" id="btn_pay" value="Pay Now" class="button"/>
    </div>
</div>
  </form>
</body>

</html>

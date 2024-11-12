<?php 
include("../Assest/Connection/connection.php");
session_start(); 

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
    WHERE d.collectionhead_id = '$headid'"; 

$result1 = mysql_query($select1);
$total = 0;


$selqry = "select * from   tbl_collectionhead where collectionhead_id = '$headid'";
$result2 = mysql_query($selqry); 
$data2 = mysql_fetch_array($result2);

$envid = $data2["collectionhead_id"];
$_SESSION['envid'] = $envid;

if(isset($_POST["btnpay"]))
{
         $payment = $_POST["txtpay"];

         $update = "UPDATE tbl_collectiondetails SET total_amount = '$payment' WHERE collectionhead_id = '$headid'";
         $updatedId = $row['collectiondetails_id'];
        if (mysql_query($update)) {
            header("Location: Payment.php?total=" . urlencode($payment));
            exit;
        } 
        
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        /* Body and fonts */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f9f9f9;
            margin-top: 30px;
            height: auto;
        }

        /* Loader style */
        .loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8) url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/img/spinner.gif') no-repeat center center;
            z-index: 9999;
            animation: fadeInLoader 0.5s ease-in-out;
        }

        @keyframes fadeInLoader {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        /* Invoice Box with Slide-In Effect */
        .invoice-box {
            max-width: 850px; /* Set to fit within a typical page width */
            height: auto; /* Allow automatic height adjustment */
            margin: auto;
            padding: 12px; /* Reduced padding */
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            font-size: 14px; /* Reduced font size */
            line-height: 1.4;
        }

        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        @keyframes slideIn {
            0% { transform: translateY(50px); }
            100% { transform: translateY(0); }
        }

        .invoice-header {
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 15px;
            margin-bottom: 20px;
            opacity: 0;
            animation: fadeInHeader 1.5s ease-in forwards;
        }

        @keyframes fadeInHeader {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        .invoice-header h1 {
            font-size: 2.5rem;
            color: #007bff;
            margin-bottom: 10px;
        }

        .invoice-header .date {
            text-align: right;
            font-size: 1rem;
            color: #888;
        }

        /* Table Styles with Fade-In Animation */
        .invoice-details th,
        .invoice-summary th {
            background-color: #f7f7f7;
             padding: 8px; /* Reduced padding */
            font-size: 14px;
            text-align: left;
            font-weight: 600;
        }

        .invoice-details td,
        .invoice-summary td {
            padding: 8px; /* Reduced padding */
            font-size: 14px;
        }

        .invoice-details tr:hover {
            background-color: #f1f1f1;
            transform: scale(1.02);
            transition: transform 0.3s ease-in-out;
        }

        /* Table Animation for rows */
        .invoice-details td {
            opacity: 0;
            animation: fadeInTable 0.5s ease-out forwards;
        }

        .invoice-details tr:nth-child(1) td { animation-delay: 0.2s; }
        .invoice-details tr:nth-child(2) td { animation-delay: 0.4s; }
        .invoice-details tr:nth-child(3) td { animation-delay: 0.6s; }

        @keyframes fadeInTable {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        /* Buttons */
        .btn-primary, .btn-secondary {
            padding: 12px 24px;
            font-size: 1.1rem;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            color: white;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            transform: translateY(-2px) scale(1.1);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #495057;
            transform: translateY(-2px) scale(1.1);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Table Summary with Slide-In Effect */
        .invoice-summary {
            opacity: 0;
            transform: translateX(-50px); /* Start from the left */
            animation: slideInSummary 1s ease-out forwards, fadeIn 1.5s ease-in forwards;
        }

        @keyframes slideInSummary {
            0% { transform: translateX(-50px); }
            100% { transform: translateX(0); }
        }

        /* Total Amount Styling */
        .total {
           font-size: 1.2rem;
           color: #28a745;
        }

        .invoice-summary th,
        .invoice-summary td {
            text-align: right;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .invoice-box {
                 padding: 10px;
                 font-size: 12px; /* Smaller font size on mobile */
            }

            .invoice-header h1 {
                font-size: 1.75rem;
            }

            .invoice-header .date {
                font-size: 0.9rem;
            }

            .invoice-details th,
            .invoice-summary th {
                font-size: 0.875rem;
            }

            .invoice-details td,
            .invoice-summary td {
                font-size: 0.875rem;
            }

            .btn-primary, .btn-secondary {
                font-size: 1rem;
                padding: 10px 20px;
            }
        }

        /* Action Button Alignment */
        .text-end {
            text-align: right;
        }

        .invoice-summary td {
            font-size: 1.25rem;
        }

        .invoice-summary th {
            font-size: 1rem;
        }

        .total {
            font-size: 1.25rem;
            color: #28a745;
        }
    </style>
</head>
<body>

    <!-- Loader -->
    <div class="loader"></div>

    <div class="invoice-box">
        <div class="invoice-header">
            <div class="row">
                <div class="col-12 col-md-6">
                    <h1>Invoice</h1>
                    <p><strong>EcoRecycle</strong><br>123 Green Avenue Sector 12
                    <br>Idukky, Kerala, 560102</p>
                </div>
                <?php 
                 $select = "select * from tbl_collectiondetails";
                 $resultsel = mysql_query($select);
                 $datasel = mysql_fetch_array($resultsel);
                 $invoice = $datasel["collectiondetails_id"] + 100;
                 $issuedDate = $datasel["collection_date"];

                ?>
                <div class="col-12 col-md-6 text-md-end">
                    <p class="date">Date: <?php echo $issuedDate ?></p>
                    <p>Invoice #: <?php echo $invoice ?></p>
                </div>
            </div>
        </div>

        <div class="invoice-details">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User</th>
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
                        <td><?php echo $data["user_name"]; ?></td>
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

        <div class="invoice-summary">
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
                        <th>Total (Including Tax)</th>
                        <?php $grandTotal = $total - $taxAmount; ?>
                        <td>
                            <?php echo number_format($grandTotal, 2); ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="text-center">
        </div>

        <!-- Action Buttons -->
        <div class="text-end mt-4">
        <form method="POST">
            <input type="hidden" name="txtpay" value="<?php echo $grandTotal; ?>"/>
            <button class="btn-primary" id="download-pdf" type="button">Download PDF</button>
            <button class="btn-secondary" type="submit" name="btnpay">Pay</button>
        </form>
    </div>

    <!-- Bootstrap 5 JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- html2pdf.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

    <script>
        // Wait for the page content to load completely, then remove the loader
        window.onload = function() {
            document.querySelector('.loader').style.display = 'none';
            document.querySelector('.invoice-box').style.opacity = '1';
        };

        // Download PDF button functionality using html2pdf
        document.getElementById('download-pdf').addEventListener('click', function () {
            const invoiceElement = document.querySelector('.invoice-box');

            const opt = {
                margin:       1,
                filename:     'invoice.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { dpi: 192, letterRendering: true },
                jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
            };

            html2pdf().from(invoiceElement).set(opt).save();
        });
    </script>

</body>
</html>

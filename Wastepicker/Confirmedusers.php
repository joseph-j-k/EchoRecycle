<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmed Schedules</title>
    <style>
        /* Center the table */
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }

        /* Table headers */
        th {
            background-color: #007bff;
            color: #ffffff;
            padding: 10px;
            font-weight: bold;
            text-align: center;
        }

        /* Table cells */
        td {
            padding: 10px;
            text-align: center;
            border: 1px solid #dddddd;
            color: #333333;
        }

        /* Row striping */
        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Hover effect on table rows */
        tbody tr:hover {
            background-color: #e9ecef;
        }

        /* Styling for the no data message */
        p {
            font-size: 1.2em;
            color: #28a745;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<?php
include("../Assest/Connection/connection.php");
session_start();
include("Head.php");

// Fetch the current waste picker details
$selpicker = "SELECT * FROM tbl_wastepicker WHERE wastepicker_id = '" . $_SESSION["wid"] . "'";
$resultpicker = mysql_query($selpicker);
$datapicker = mysql_fetch_array($resultpicker);

// Display the confirmed schedules with detailed user information
$sql = "SELECT * FROM tbl_user u 
        INNER JOIN tbl_schedule s ON u.ward_id = s.ward_id  inner join tbl_ward w on w.ward_id=u.ward_id 
        WHERE s.wastepicker_id = '" . $_SESSION["wid"] . "' AND  u.user_status = 1";

$result = mysql_query($sql);
if (mysql_num_rows($result) > 0) {
    ?>
    <br /><br /><br /><br />
    <table border="1" align="center">
        <thead>
            <tr>
                <th>User ID</th>
                <th>User Name</th>
                <th>House Name</th>
                <th>House Number</th>
                <th>Contact</th>
                <th>Schedule Date</th>
                <th>Ward Number</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
		$i = 0;
		?>
            <?php while ($row = mysql_fetch_array($result)) {
				$i++;
				 ?>
            <tr>
                 <td><?php echo $i ?></td>
                <td><?php echo $row['user_name']; ?></td>
                <td><?php echo $row['user_housename']; ?></td>
                <td><?php echo $row['user_houseno']; ?></td>
                <td><?php echo $row['user_contact']; ?></td>
                <td><?php echo $row['schedule_date']; ?></td>
                <td><?php echo $row['ward_no']; ?></td>
                <td>
                    <a href="Collectionhead.php?collctionheadid=<?php echo $row['user_id']; ?>">Collection Head</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <br /><br />
    <?php
} else {
    echo "<p style='color: green;'>No confirmed schedules for this ward yet.</p>";
}
?>

</body>
</html>

<?php include("Foot.php"); ?>
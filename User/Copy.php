<?php
include("../Assest/Connection/connection.php");
session_start();

// Fetch the current user details
$seluse = "SELECT * FROM tbl_user WHERE user_id = '" . $_SESSION["uid"] . "'";
$resultuser = mysql_query($seluse);
$datauser = mysql_fetch_array($resultuser);

if (isset($_POST['confirm'])) {
    // Update the user's status to 1 in the database (confirmation)
    $updateStatus = "UPDATE tbl_user SET user_status = 1 WHERE user_id = '" . $_SESSION["uid"] . "'";
    mysql_query($updateStatus);

    // Store the confirmed schedule in session for the waste picker to view
    $_SESSION['confirmed_schedule'] = array(
        'user_id' => $_SESSION["uid"],
        'user_name' => $datauser['user_name'],
        'user_housename' => $datauser['user_housename'],
        'user_houseno' => $datauser['user_houseno'],
        'user_contact' => $datauser['user_contact'],
        'schedule_date' => $_POST['schedule_date'],
        'wastepicker_name' => $_POST['wastepicker_name'],
        'ward_no' => $_POST['ward_no']
    );
    echo "<script>alert('Schedule Confirmed!');</script>";
}

// Get the schedule for the user
$sel = "SELECT * FROM tbl_schedule s 
        INNER JOIN tbl_wastepicker w ON s.wastepicker_id = w.wastepicker_id 
        INNER JOIN tbl_ward t ON s.ward_id = t.ward_id 
        WHERE t.ward_id = '" . $datauser['ward_id'] . "'";
$result = mysql_query($sel);
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>User Schedule</title>
    <style>
        /* Basic styling for page layout */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Centering and styling form */
        form {
            width: 80%;
            max-width: 800px;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Styling for table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        thead {
            background-color: #007bff;
            color: #ffffff;
        }

        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #eaf3ff;
        }

        /* Button styling */
        button[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 8px 16px;
            cursor: pointer;
            font-size: 14px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #218838;
        }

        /* Styling for confirmed message */
        p {
            font-weight: bold;
            color: #28a745;
        }

        /* Mobile responsive adjustments */
        @media (max-width: 600px) {
            th, td {
                padding: 8px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <br><br>
    <form method="post">
        <table align="center" border="1">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Schedule Date</td>
                    <td>Waste Collector Name</td>
                    <td>Ward Number</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                if (mysql_num_rows($result) > 0) {
                    // Display schedules if they exist
                    while ($data = mysql_fetch_array($result)) {
                        $i++;
                ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td>
                        <input type="hidden" name="schedule_date" value="<?php echo $data['schedule_date']; ?>" />
                        <?php echo $data["schedule_date"] ?>
                    </td>
                    <td>
                        <input type="hidden" name="wastepicker_name" value="<?php echo $data['wastepicker_name']; ?>" />
                        <?php echo $data["wastepicker_name"] ?>
                    </td>
                    <td>
                        <input type="hidden" name="ward_no" value="<?php echo $data['ward_no']; ?>" />
                        <?php echo $data["ward_no"] ?>
                    </td>
                    <td>
                        <?php if ($datauser['user_status'] == 0) { ?>
                            <button type="submit" name="confirm">Confirm</button>
                        <?php } else { ?>
                            <p>Confirmed</p>
                        <?php } ?>
                    </td>
                </tr>
                <?php
                    }
                } else {
                    // Display message if no schedules are available
                    echo "<tr><td colspan='5' align='center'>No schedules available at the moment.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </form>
</body>
</html>
<?php
    include("../Assest/Connection/connection.php");
    $eid = $ename = $econtact = $eemail = $epassword = "";

    if(isset($_POST["btnsubmit"])) {
        $name = $_POST["txtname"];
        $email = $_POST["txtemail"];
        $contact = $_POST["txtcontact"];
        $password = $_POST["txtpassword"];
        $hid = $_POST["hid"];

        if($hid != null) {
            $update = "UPDATE tbl_admin SET admin_name='$name', admin_contact='$contact', admin_email='$email', admin_password='$password' WHERE admin_id='$hid'";
            mysql_query($update);
        } else {
            $insQry = "INSERT INTO tbl_admin (admin_name, admin_contact, admin_email, admin_password) VALUES ('$name', '$contact', '$email', '$password')";
            mysql_query($insQry);
        }
    }

    if(isset($_GET["did"])) {
        $delQry = "DELETE FROM tbl_admin WHERE admin_id='" . $_GET["did"] . "'";
        mysql_query($delQry);
    }
    if(isset($_GET["eid"])) {
        $sel = "SELECT * FROM tbl_admin WHERE admin_id='" . $_GET["eid"] . "'";
        $result1 = mysql_query($sel);
        if($data = mysql_fetch_array($result1)) {
            $eid = $data["admin_id"];
            $ename = $data["admin_name"];
            $econtact = $data["admin_contact"];
            $eemail = $data["admin_email"];
            $epassword = $data["admin_password"];
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Registration</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
    <h1 align="center">Admin Registration</h1>
    <table align="center" border="1">
        <tr>
            <td width="50">Name</td>
            <td width="156">
                <input type="hidden" name="hid" id="hid" value="<?php echo $eid ?>" />
                <input type="text" name="txtname" id="txtname" value="<?php echo $ename ?>" />
            </td>
        </tr>
        <tr>
            <td>Contact</td>
            <td><input type="text" name="txtcontact" id="txtcontact" value="<?php echo $econtact ?>" /></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="txtemail" id="txtemail" value="<?php echo $eemail ?>" /></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="text" name="txtpassword" id="txtpassword" value="<?php echo $epassword ?>" /></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
                <input type="reset" name="txtreset" id="txtcancel" value="Reset" />
            </td>
        </tr>
    </table>
    <br>
    <br>
    <table align="center" border="1">
    <tr>
        <td>#</td>
        <td>Name</td>
        <td>Contact</td>
        <td>Email</td>
        <td>Password</td>
        <td>Action</td>
    </tr>
    <?php
    $i = 0;
    $sel = "SELECT * FROM tbl_admin";
    $result = mysql_query($sel);
    while($data = mysql_fetch_array($result)) {
        $i++;
    ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $data["admin_name"] ?></td>
        <td><?php echo $data["admin_contact"] ?></td>
        <td><?php echo $data["admin_email"] ?></td>
        <td><?php echo $data["admin_password"] ?></td>
        <td>
            <a href="Adminregistration.php?action=form&eid=<?php echo $data["admin_id"] ?>">Edit</a>
            <a href="Adminregistration.php?action=list&did=<?php echo $data["admin_id"] ?>">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>
<br />
</form>
</body>
</html>

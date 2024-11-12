<?php 
include("../Assest/Connection/connection.php");
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Waste Types</title>
</head>

<body>
<h1 align="center">Waste Types</h1>

<?php 
// Query to get waste types along with their rate
$query = "SELECT w.wastetype_name, w.wastetype_image, r.rate_amount 
          FROM tbl_wastetype w
          LEFT JOIN tbl_rate r ON w.wastetype_id = r.wastetype_id";
$result = mysql_query($query);

while ($data = mysql_fetch_array($result)) {
?>
  <form id="form1" name="form1" method="post" action="">
    <!-- Waste Type Name as Heading -->
    <h2 align="center"><?php echo htmlspecialchars($data["wastetype_name"]); ?></h2>

    <table border="2" align="center">
      <!-- Waste Type Image -->
      <tr>
        <td colspan="2" align="center">
          <img src="../Assest/File/Wastetype/<?php echo htmlspecialchars($data["wastetype_image"]); ?>" width="400" height="250" alt="<?php echo htmlspecialchars($data["wastetype_name"]); ?>" />
        </td>
      </tr>
      <!-- Price -->
      <tr>
        <td>Price</td>
        <td><?php echo htmlspecialchars($data["rate_amount"]); ?></td>
      </tr>
    </table>
    <br/><br/>
  </form>
<?php
}
?>

</body>
</html>

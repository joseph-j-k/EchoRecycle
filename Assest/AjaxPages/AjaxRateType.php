<?php include("../Connection/connection.php");?>
<option value="">Select rate</option>
<?php
$selQry= "select * from tbl_rate where wastetype_id = '".$_GET['rid']."'";
$result = mysql_query($selQry);
while($row = mysql_fetch_array($result))
{
	?>
    <option value="<?php echo $row['rate_id']?>"><?php echo $row['rate_amount']?></option>
    <?php 
	} 
	?>
<?php include("../Connection/connection.php");?>
<option value="">Select Name</option>
<?php
$selQry= "select * from tbl_user where ward_id = '".$_GET['userid']."'";
$result = mysql_query($selQry); 
while($row = mysql_fetch_array($result))
{
	?>
    <option value="<?php echo $row['user_id']?>"><?php echo $row['user_name']?></option>
    <?php 
	} 
	?>
<?php
session_start();
include("../Assest/Connection/connection.php");
if(isset($_POST["btn_submit"]))
{
  
  $content=$_POST["txt_content"];
  $insqry="insert into tbl_feedback(feedback_message, user_id, feedback_date)values('".$content."','".$_SESSION["uid"]."',curdate())";   
  if(mysql_query($insqry))
{
  echo "<script>
        alert('Inserted');
        window.location='Feedback.php';
        </script>";
?>

<script>
alert('Inserted');
location.href='Feedback.php';
</script>
<?php  
}
else
{
?>

<?php
}
}

?>

<?php include("Head.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Feedback</title>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: white;
    margin: 0;
    padding: 20px;
     }

    h1 {
    color: #333;
    text-align: center;
    margin-bottom: 20px;
     }

    table {
    width: 80%;
    margin: 20px auto;
    border-collapse: collapse;
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      }

    th, td {
    padding: 15px;
    text-align: center;
    border-bottom: 1px solid #ddd;
      }

   th {
    background-color: #28a745;  /* Light Green */
    color: white;
      }

   /* Style for the Submit button (light green) */
   #btn_submit {
    background-color: #28a745;  /* Light green */
    color: white;
    border: none;
    padding: 12px 24px;
    cursor: pointer;
    border-radius: 25px;
    font-size: 16px;
    transition: background-color 0.3s ease, transform 0.3s ease; /* Added transition */
      }

/* Hover effect for Submit button */
  #btn_submit:hover {
    background-color: #218838;  /* Darker green */
    transform: translateY(-2px); /* Lift effect */
      }

/* Style for the Cancel button (red) */
  #btn_reset {
    background-color: #dc3545;  /* Red */
    color: white;
    border: none;
    padding: 12px 24px;
    cursor: pointer;
    border-radius: 25px;
    font-size: 16px;
    transition: background-color 0.3s ease, transform 0.3s ease; /* Added transition */
      }

/* Hover effect for Cancel button */
   #btn_reset:hover {
    background-color: #c82333;  /* Darker red */
    transform: translateY(-2px); /* Lift effect */
      }


   textarea {
    width: 90%;
    height: 100px;
    background-color: #D2D6CA;
    color: black;
    border: 1px solid #444;
    border-radius: 5px;
    resize: none;
    padding: 10px;
    font-size: 16px;
     }

   textarea:focus {
    outline: none;
    border: 1px solid #28a745; /* Light Green focus border */
      }

  @media (max-width: 768px) {
    table {
        width: 95%;
      }

    input[type="submit"], input[type="reset"] {
        width: 100%;
        margin-bottom: 10px;
        }

    textarea {
        width: 100%;
      }
  }

</style>
</head>

<body>
<br /><br /><br /><br />
<form id="form1" name="form1" method="post" action="">
  <table align="center"  cellpadding="10">
    <tr align="center">
      <td>Feedback</td>
      <td><label for="txt_content"></label>
        <textarea required name="txt_content" id="txt_content" cols="45" rows="5"></textarea></td>
    </tr>
    <tr align="center">
    <td colspan="2">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
        <input type="reset" name="btn_reset" id="btn_reset" value="Cancel" />
    </td>
</tr>
  </table>
  <br />
  <br />
  <table align="center">
    <tr align="center">
      <td>Sl.No</td>
      <td>Name</td>
      <td>Date</td>
      <td>Content</td>
    </tr>
    <?php 
	$selqry="select * from tbl_feedback f inner join tbl_user u on u.user_id = f.user_id where u.user_id = '".$_SESSION["uid"]."'";
	$result = mysql_query($selqry);
	$i=0;
	while($row = mysql_fetch_array($result))
	{
		$i++;
		?>
    <tr align="center">
      <td><?php echo $i;?></td>
      <td><?php echo $row["user_name"] ?></td>
      <td><?php echo $row["feedback_date"] ?></td>
      <td><?php echo $row["feedback_message"] ?></td>
    </tr>
    <?php
	}
	
	?>
  </table>
</form>
</body>
</html>

<?php include("Foot.php"); ?>
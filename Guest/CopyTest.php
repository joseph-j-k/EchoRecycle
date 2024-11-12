<?php 
include("../Assest/Connection/connection.php");
session_start();
include("Head.php");
$message="";
?>
<?php 
if(isset($_POST["btn_login"]))
{
	
	$email = $_POST["txt_email"];
	$password = $_POST["txt_password"];
	
	 $selUser = "select * from tbl_user where user_email = '".$email."' and  user_password ='".$password."'";
	$result1 = mysql_query($selUser);
	
   $selWastePicker = "select * from tbl_wastepicker where wastepicker_email = '".$email."' and  wastepicker_password ='".$password."'";
	$result2 = mysql_query( $selWastePicker); 
	
   $seladmin = "select * from tbl_admin where admin_email = '".$email."' and admin_password ='".$password."'";
	$result3 = mysql_query( $seladmin); 
		 
		 
	if($dataUser = mysql_fetch_array($result1))
	{
			$_SESSION["uid"] = $dataUser["user_id"];
			$_SESSION["uname"] = $dataUser["user_name"];
			header("Location:../User/HomePage.php");
		
		
		}
		
		
	else if($dataWastePicker = mysql_fetch_array($result2))
	{
			$_SESSION["wid"] = $dataWastePicker["wastepicker_id"];
			$_SESSION["wname"] = $dataWastePicker["wastepicker_name"];
			header("Location:../WastePicker/HomePage.php");
		
		
		}
		
	 else if($datadmin = mysql_fetch_array($result3))
	{
			$_SESSION["aid"] = $datadmin["admin_id"];
			$_SESSION["aname"] = $datadmin["admin_name"];
			header("Location:../Admin/Dashboard.php");
		
		
		}
		else
		{
			$message="Invalid login ...!!";
		}
	
	
}

?>



<?php 
// Database queries to fetch user details
$select5 = "SELECT * FROM tbl_admin";
$result5 = mysql_query($select5);
$data5 = mysql_fetch_array($result5);
$adminEmail = $data5["admin_email"];
$adminPassword = $data5["admin_password"];

$select6 = "SELECT * FROM tbl_user";
$result6 = mysql_query($select6);
$data6 = mysql_fetch_array($result6);
$userEmail = $data6["user_email"];
$userPassword = $data6["user_password"];

$select7 = "SELECT * FROM tbl_wastepicker";
$result7 = mysql_query($select7);
$data7 = mysql_fetch_array($result7);
$wastepickerEmail = $data7["wastepicker_email"];
$wastepickerPassword = $data7["wastepicker_password"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .feedback {
            font-size: 14px;
            margin-top: 5px;
        }
        .feedback.invalid {
            color: red;
        }
        .feedback.valid {
            color: green;
        }
    </style>

    <script>
        // Ensure these PHP variables are passed correctly
        var adminEmail = "<?php echo $adminEmail; ?>";
        var adminPassword = "<?php echo $adminPassword; ?>";
        var userEmail = "<?php echo $userEmail; ?>";
        var userPassword = "<?php echo $userPassword; ?>";
        var wastepickerEmail = "<?php echo $wastepickerEmail; ?>";
        var wastepickerPassword = "<?php echo $wastepickerPassword; ?>";

        // Function to validate email and password during typing
        function checkEmailAndPassword() {
            const enteredEmail = document.getElementById("txt_email").value;
            const enteredPassword = document.getElementById("txt_password").value;
            const emailFeedback = document.getElementById("emailFeedback");
            const passwordFeedback = document.getElementById("passwordFeedback");

            // Reset feedback messages
            emailFeedback.textContent = "";
            passwordFeedback.textContent = "";

            // Validate email
            if (enteredEmail !== adminEmail && enteredEmail !== userEmail && enteredEmail !== wastepickerEmail) {
                emailFeedback.textContent = "Incorrect email.";
                emailFeedback.className = "feedback invalid";
            } else {
                emailFeedback.textContent = "Email is correct.";
                emailFeedback.className = "feedback valid";
            }

            // Validate password only if email is correct
            if (enteredEmail === adminEmail && enteredPassword !== adminPassword) {
                passwordFeedback.textContent = "Incorrect password.";
                passwordFeedback.className = "feedback invalid";
            } else if (enteredEmail === userEmail && enteredPassword !== userPassword) {
                passwordFeedback.textContent = "Incorrect password.";
                passwordFeedback.className = "feedback invalid";
            } else if (enteredEmail === wastepickerEmail && enteredPassword !== wastepickerPassword) {
                passwordFeedback.textContent = "Incorrect password.";
                passwordFeedback.className = "feedback invalid";
            } else if ((enteredEmail === adminEmail && enteredPassword === adminPassword) || 
                       (enteredEmail === userEmail && enteredPassword === userPassword) || 
                       (enteredEmail === wastepickerEmail && enteredPassword === wastepickerPassword)) {
                passwordFeedback.textContent = "Correct password.";
                passwordFeedback.className = "feedback valid";
            }
        }

        // Attach event listeners to the email and password fields
        window.onload = function() {
            document.getElementById("txt_email").addEventListener("input", checkEmailAndPassword);
            document.getElementById("txt_password").addEventListener("input", checkEmailAndPassword);
        }
    </script>

</head>
<body class="bg-gray-100">

<div class="h-96 flex items-center justify-center from-purple-400 via-pink-500 to-red-500" style="margin-top:100px">
  <div class="relative animate-fade-in animate-slide-in">
    <div class="absolute -top-2 -left-2 -right-2 -bottom-2 rounded-lg bg-gradient-to-r from-purple-400 via-pink-500 to-red-500 shadow-lg animate-pulse"></div>
    <div id="form-container" class="bg-white p-16 rounded-lg shadow-2xl w-80 relative z-10 transform transition duration-500 ease-in-out">
      <h2 id="form-title" class="text-center text-3xl font-bold mb-10 text-gray-800">Login</h2>
      <?php if ($message != "") { ?>
        <div class="text-center text-red-500 mb-4"><?php echo $message; ?></div>
      <?php } ?>
      <form class="space-y-5" name="form1" method="post" action="">
        <input class="w-full h-12 border border-gray-800 px-3 rounded-lg" placeholder="Email" name="txt_email" id="txt_email" type="text" required />
        <div id="emailFeedback"></div> 
        <input class="w-full h-12 border border-gray-800 px-3 rounded-lg" placeholder="Password" name="txt_password" id="txt_password" type="password" required minlength="6" />
        <div id="passwordFeedback"></div>
        <button class="w-full h-12 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="btn_login" id="btn_login">Login</button>
        <a class="text-blue-500 hover:text-blue-800 text-sm" href="#">Forgot Password?</a>
      </form>
    </div>
  </div>
</div>

<br /><br />
</body>
</html>

<?php include("Foot.php"); ?>   

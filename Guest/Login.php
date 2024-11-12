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
			
            if ($dataWastePicker['wastepicker_status'] == 2) {
                echo "<script>alert('You have been Rejected.');</script>";
            } else if ($dataWastePicker['wastepicker_status'] == 0) {
                echo "<script>alert('Your shop is Pending approval.');</script>";
            } else {
                $_SESSION["wid"] = $dataWastePicker["wastepicker_id"];
			    $_SESSION["wname"] = $dataWastePicker["wastepicker_name"];
                header("Location:../WastePicker/HomePage.php");
                exit;
            }
		
		
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
        @keyframes professionalFadeIn {
    0% {
        transform: translateY(20px) scale(0.98);
        opacity: 0;
    }
    60% {
        transform: translateY(-5px) scale(1.01);
        opacity: 0.8;
    }
    100% {
        transform: translateY(0) scale(1);
        opacity: 1;
    }
}

/* Apply the subtle animation */
 #login-container {
    padding: 30px 50px;
    border-radius: 12px;
    animation: professionalFadeIn 1s ease-out; /* Smooth scaling and sliding effect */
}

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
    document.addEventListener("DOMContentLoaded", function() {
        const emailInput = document.getElementById('txt_email');
        const passwordInput = document.getElementById('txt_password');
        const emailFeedback = document.getElementById('emailFeedback');
        const passwordFeedback = document.getElementById('passwordFeedback');
        
        // Email validation feedback
        emailInput.addEventListener('input', function() {
            const emailValue = emailInput.value;
            if (emailValue === "") {
                emailFeedback.textContent = "";
                emailFeedback.classList.remove('valid', 'invalid');
            } else if (!validateEmail(emailValue)) {
                emailFeedback.textContent = "Please enter a valid email address.";
                emailFeedback.classList.remove('valid');
                emailFeedback.classList.add('invalid');
            } else {
                emailFeedback.textContent = "Valid email.";
                emailFeedback.classList.remove('invalid');
                emailFeedback.classList.add('valid');
            }
        });
        
        // Password validation feedback
        passwordInput.addEventListener('input', function() {
            const passwordValue = passwordInput.value;
            if (passwordValue === "") {
                passwordFeedback.textContent = "";
                passwordFeedback.classList.remove('valid', 'invalid');
            } else if (passwordValue.length < 6) {
                passwordFeedback.textContent = "Password must be at least 6 characters.";
                passwordFeedback.classList.remove('valid');
                passwordFeedback.classList.add('invalid');
            } else {
                passwordFeedback.textContent = "Password length is sufficient.";
                passwordFeedback.classList.remove('invalid');
                passwordFeedback.classList.add('valid');
            }
        });

        // Function to validate email format
        function validateEmail(email) {
            const regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            return regex.test(email);
        }
    });
</script>

</head>
<body class="bg-gray-100 ">

<div class="h-96 flex items-center justify-center from-purple-400 via-pink-500 to-red-500" style="margin-top:100px" id="login-container">
  <div class="relative animate-fade-in animate-slide-in">
    <div class="absolute -top-2 -left-2 -right-2 -bottom-2 rounded-lg bg-gradient-to-r from-purple-400 via-pink-500 to-red-500 shadow-lg animate-pulse"></div>
    <div id="form-container" class="bg-white p-16 rounded-lg shadow-2xl w-80 relative z-10 transform transition duration-500 ease-in-out">
      <h2 id="form-title" class="text-center text-3xl font-bold mb-10 text-gray-800">Login</h2>
      <?php if ($message != "") { ?>
        <div class="text-center text-red-500 mb-4"><?php echo $message; ?></div>
      <?php } ?>
      <form class="space-y-5" name="form1" method="post" action="">
        <input class="w-full h-12 border border-gray-800 px-3 rounded-lg" placeholder="Email" name="txt_email" id="txt_email" type="text" required />
        <div id="emailFeedback" class="feedback"></div> 
        <input class="w-full h-12 border border-gray-800 px-3 rounded-lg" placeholder="Password" name="txt_password" id="txt_password" type="password" required minlength="6" />
        <div id="passwordFeedback" class="feedback"></div>
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

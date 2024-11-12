<?php 
include("../Assest/Connection/connection.php");		
include("Head.php");

if (isset($_POST["btnsubmit"])) {
    $name = $_POST["txt_name"]; 
    $houseName = $_POST["txthouse"];
    $housenumber = $_POST["txthousenumber"];
    $gender = $_POST["Gender"];
    $contact = $_POST["txtcontact"];
    $email = $_POST["txtemail"];
    $password = $_POST["txtpass"];
    $confpassword = $_POST["txtconfirmpass"];
    $aadhar = $_POST["txtaadhar"];

    $photo = $_FILES["filephoto"]["name"];
    $temp = $_FILES["filephoto"]["tmp_name"];
    move_uploaded_file($temp, "../Assest/File/user/".$photo);

    $ward = $_POST["selward"];

    if ($password == $confpassword) {
        $insQry = "insert into tbl_user(user_name, user_housename, user_houseno, user_gender, user_contact, user_email, user_password, user_aadhar, user_photo, ward_id) values('$name', '$houseName', '$housenumber', '$gender', '$contact', '$email', '$password', '$aadhar', '$photo', '$ward')";
        if (mysql_query($insQry)) {
            echo "<script>alert('User Registered'); window.location='Login.php';</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>User Registration</title>
<style>
/* Subtle scale, slide, and fade animation */
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
.registration-container {
    background-color: #ffffff;
    padding: 30px 50px;
    border-radius: 12px;
    box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1); /* Softer shadow */
    width: 100%;
    max-width: 700px;
    animation: professionalFadeIn 1s ease-out; /* Smooth scaling and sliding effect */
}




    h1 {
        text-align: center;
        color: #333;
        font-weight: 300;
        margin-bottom: 30px;
    }
    td {
        padding: 15px;
    }
    /* Subtle focus effect for input fields */
input[type="text"], input[type="email"], input[type="password"], select, input[type="file"] {
    width: 100%;
    padding: 12px;
    border-radius: 6px;
    border: 1px solid #ccc;
    margin-top: 5px;
    font-size: 16px;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus, select:focus, input[type="file"]:focus {
    border-color: #4CAF50;
    box-shadow: 0px 4px 8px rgba(76, 175, 80, 0.2); /* Light green glow */
}

/* Hover effect for form container */
.registration-container:hover {
    box-shadow: 0px 6px 24px rgba(0, 0, 0, 0.15); /* Slightly intensified shadow */
}

    .feedback {
        font-size: 0.9em;
        color: #666;
        margin-top: 5px;
    }
    .valid { color: #4CAF50; }
    .invalid { color: #f44336; }
    .submit-btn, .reset-btn {
    background-color: #4CAF50; /* Green background */
    color: white; /* White text */
    font-size: 16px; /* Font size */
    padding: 12px 24px; /* Padding */
    border: none; /* No border */
    border-radius: 8px; /* Rounded corners */
    cursor: pointer; /* Pointer cursor */
    transition: background-color 0.3s ease, transform 0.2s ease; /* Smooth transitions */
    animation: fadeIn 0.5s ease-out; /* Animation on load */
}

.submit-btn:hover, .reset-btn:hover {
    background-color: #45a049; /* Darker green when hovered */
    transform: translateY(-5px); /* Slight lift effect */
    animation: hoverEffect 0.3s ease-out; /* Animation on hover */
}

.submit-btn:active, .reset-btn:active {
    background-color: #388e3c; /* Even darker green on click */
    transform: translateY(1px); /* Slightly pressed effect */
    animation: activeEffect 0.1s ease-in; /* Animation on click */
}

/* Reset button styles */
.reset-btn {
    background-color: #f44336; /* Red background */
}

.reset-btn:hover {
    background-color: #e53935; /* Darker red when hovered */
}

/* Animation for button load */
@keyframes fadeIn {
    0% {
        opacity: 0;
        transform: scale(0.8);
    }
    100% {
        opacity: 1;
        transform: scale(1);
    }
}

/* Animation for button hover effect */
@keyframes hoverEffect {
    0% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-5px); /* Lift effect */
    }
    100% {
        transform: translateY(0);
    }
}

/* Animation for button active effect */
@keyframes activeEffect {
    0% {
        transform: translateY(-2px);
    }
    50% {
        transform: translateY(1px); /* Pressed effect */
    }
    100% {
        transform: translateY(-2px);
    }
}

</style>
<script type="text/javascript">
    function validateName() {
        const name = document.getElementById("txt_name").value;
        const nameFeedback = document.getElementById("nameFeedback");
        
        if (name.length >= 3) {
            nameFeedback.textContent = "Valid name.";
            nameFeedback.className = "feedback valid";
            return true;
        } else {
            nameFeedback.textContent = "Name must be at least 3 characters.";
            nameFeedback.className = "feedback invalid";
            return false;
        }
    }

    function validateHouseName() {
        const houseName = document.getElementById("txthouse").value;
        const houseNameFeedback = document.getElementById("houseNameFeedback");

        if (houseName.length >= 3) {
            houseNameFeedback.textContent = "Valid house name.";
            houseNameFeedback.className = "feedback valid";
            return true;
        } else {
            houseNameFeedback.textContent = "House name must be at least 3 characters.";
            houseNameFeedback.className = "feedback invalid";
            return false;
        }
    }

    function validateHouseNumber() {
        const houseNumber = document.getElementById("txthousenumber").value;
        const houseNumberFeedback = document.getElementById("houseNumberFeedback");
        const houseNumberPattern = /^[a-zA-Z0-9]+$/;

        if (houseNumberPattern.test(houseNumber)) {
            houseNumberFeedback.textContent = "Valid house number.";
            houseNumberFeedback.className = "feedback valid";
            return true;
        } else {
            houseNumberFeedback.textContent = "House number must contain only letters and numbers.";
            houseNumberFeedback.className = "feedback invalid";
            return false;
        }
    }

    function validateContactNumber() {
        const contact = document.getElementById("txtcontact").value;
        const contactFeedback = document.getElementById("contactFeedback");
        const contactPattern = /^[0-9]{10}$/;

        if (contactPattern.test(contact)) {
            contactFeedback.textContent = "Valid contact number.";
            contactFeedback.className = "feedback valid";
            return true;
        } else {
            contactFeedback.textContent = "Contact number must be 10 digits.";
            contactFeedback.className = "feedback invalid";
            return false;
        }
    }

    function validateEmailFormat() {
        const email = document.getElementById("txtemail").value;
        const emailFeedback = document.getElementById("emailFeedback");
        const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

        if (emailPattern.test(email)) {
            emailFeedback.textContent = "Valid email.";
            emailFeedback.className = "feedback valid";
            return true;
        } else {
            emailFeedback.textContent = "Invalid email format.";
            emailFeedback.className = "feedback invalid";
            return false;
        }
    }

        function checkPasswordStrength() {
        const password = document.getElementById("txtpass").value;
        const passwordFeedback = document.getElementById("passwordFeedback");
        const pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

        if (pattern.test(password)) {
            passwordFeedback.textContent = "Strong password.";
            passwordFeedback.className = "feedback valid";
            return true;
        } else {
            passwordFeedback.textContent = "Password must be at least 8 characters, include uppercase, lowercase, number, and special character.";
            passwordFeedback.className = "feedback invalid";
            return false;
        }
    }

    function validateConfirmPassword() {
        const password = document.getElementById("txtpass").value;
        const confirmPassword = document.getElementById("txtconfirmpass").value;
        const confirmPasswordFeedback = document.getElementById("confirmPasswordFeedback");

        if (password === confirmPassword) {
            confirmPasswordFeedback.textContent = "Passwords match.";
            confirmPasswordFeedback.className = "feedback valid";
            return true;
        } else {
            confirmPasswordFeedback.textContent = "Passwords do not match.";
            confirmPasswordFeedback.className = "feedback invalid";
            return false;
        }
    }

    function validateAadharNumber() {
        const aadhar = document.getElementById("txtaadhar").value;
        const aadharFeedback = document.getElementById("aadharFeedback");
        const aadharPattern = /^[0-9]{12}$/;

        if (aadharPattern.test(aadhar)) {
            aadharFeedback.textContent = "Valid Aadhar number.";
            aadharFeedback.className = "feedback valid";
            return true;
        } else {
            aadharFeedback.textContent = "Aadhar number must be 12 digits.";
            aadharFeedback.className = "feedback invalid";
            return false;
        }
    }

    function validatePhoto() {
        const photo = document.getElementById("filephoto");
        const photoFeedback = document.getElementById("photoFeedback");
        const file = photo.files[0];

        if (file) {
            const validTypes = ["image/jpeg", "image/png", "image/gif"];
            if (!validTypes.includes(file.type)) {
                photoFeedback.textContent = "Only JPEG, PNG, and GIF formats are allowed.";
                photoFeedback.className = "feedback invalid";
                return false;
            }

            if (file.size > 2 * 1024 * 1024) { // 2MB size limit
                photoFeedback.textContent = "File size must be less than 2MB.";
                photoFeedback.className = "feedback invalid";
                return false;
            }

            photoFeedback.textContent = "Valid photo.";
            photoFeedback.className = "feedback valid";
            return true;
        } else {
            photoFeedback.textContent = "Please select a photo.";
            photoFeedback.className = "feedback invalid";
            return false;
        }
    }

    function validateForm() {
        return (
            validateName() &&
            validateHouseName() &&
            validateHouseNumber() &&
            validateContactNumber() &&
            validateEmailFormat() &&
            checkPasswordStrength() &&
            validateConfirmPassword() &&
            validateAadharNumber() &&
            validatePhoto()
        );
    }
</script>
</head>
<body>
 <br> 
<div class="registration-container" style="margin-left:350px">
    <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
        <h1>User Registration</h1>
        <table>
            <tr>
                <td>Name</td>
                <td>
                    <input type="text" name="txt_name" id="txt_name"  required oninput="validateName()"/>
                    <span id="nameFeedback" class="feedback"></span>
                </td>
            </tr>
            <tr>
                <td>Ward</td>
                <td>
                    <select name="selward" id="selward" required>
                        <option value="">---Select---</option>
                        <?php 
                        $select = "select * from tbl_ward";
                        $result = mysql_query($select);
                        while($data = mysql_fetch_array($result)) {
                        ?>
                        <option value="<?php echo $data["ward_id"]?>"><?php echo $data["ward_no"]?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <!-- Repeat the rest of your input fields similarly -->
              <tr>
      <td>House Name</td>
      <td>
        <input type="text" name="txthouse" id="txthouse" required oninput="validateHouseName()"/>
        <span id="houseNameFeedback" class="feedback"></span>
      </td>
    </tr>
    <tr>
      <td>House Number</td>
      <td>
        <input type="text" name="txthousenumber" id="txthousenumber" required oninput="validateHouseNumber()"/>
        <span id="houseNumberFeedback" class="feedback"></span>
      </td>
    </tr>
    <tr>
      <td>Gender</td>
      <td>
        <input type="radio" name="Gender" value="Male" id="Gender" required checked/> Male
        <br />
        <input type="radio" name="Gender" value="Female" id="Gender" /> Female
        <br />
        <input type="radio" name="Gender" value="Prefer not to say" id="Gender" /> Prefer not to say
      </td>
    </tr>
    <tr>
      <td>Contact</td>
      <td>
        <input type="text" name="txtcontact" id="txtcontact" required pattern="[0-9]{10}" oninput="validateContactNumber()" />
        <span id="contactFeedback" class="feedback"></span>
      </td>
    </tr>
    <tr>
      <td>Email</td>
      <td>
        <input type="email" name="txtemail" id="txtemail" required oninput="validateEmailFormat()"/>
        <span id="emailFeedback" class="feedback"></span>
      </td>
    </tr>
    <tr>
      <td>Password</td>
      <td>
        <input type="password" name="txtpass" id="txtpass" required minlength="6" oninput="checkPasswordStrength()" />
        <span id="passwordFeedback" class="feedback"></span>
      </td>
    </tr>
    <tr>
      <td>Confirm Password</td>
      <td>
        <input type="password" name="txtconfirmpass" id="txtconfirmpass" required minlength="6" oninput="validateConfirmPassword()" />
        <span id="confirmPasswordFeedback" class="feedback"></span>
      </td>
    </tr>
    <tr>
      <td>Aadhar No</td>
      <td>
        <input type="text" name="txtaadhar" id="txtaadhar" required pattern="[0-9]{12}" oninput="validateAadharNumber()" />
        <span id="aadharFeedback" class="feedback"></span>
      </td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><label for="filephoto"></label>
      <input type="file" name="filephoto" id="filephoto" required onchange="validatePhoto()"/>
      <span id="photoFeedback" class="feedback"></span>
    </td>
    </tr>
            <tr>
                <td colspan="2" class="terms">
                    <input type="checkbox" name="check1" id="check1" /> I&nbsp;accept&nbsp;all&nbsp;the&nbsp;terms&nbsp;and&nbsp;conditions
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" class="submit-btn" />
                    <input type="reset" value="Reset" class="reset-btn" />
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>

<?php include("Foot.php"); ?>

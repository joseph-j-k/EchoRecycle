<?php
include("../Assest/Connection/connection.php");
include("Head.php");

if (isset($_POST["btnsubmit"])) {
    $photo1 = $_FILES["fileaadhar"]["name"];
    $temp1 = $_FILES["fileaadhar"]["tmp_name"];
    move_uploaded_file($temp1, "../Assest/File/Wastepicker/" . $photo1);
    $photo2 = $_FILES["filelicense"]["name"];
    $temp2 = $_FILES["filelicense"]["tmp_name"];
    move_uploaded_file($temp2, "../Assest/File/Wastepicker/" . $photo2);
    $photo3 = $_FILES["filephoto"]["name"];
    $temp3 = $_FILES["filephoto"]["tmp_name"];
    move_uploaded_file($temp3, "../Assest/File/Wastepicker/" . $photo3);
    $insQry = "insert into tbl_wastepicker(wastepicker_name,wastepicker_address,wastepicker_gender,wastepicker_dob,wastepicker_age,wastepicker_contact,ward_id,wastepicker_email,wastepicker_password,wastepicker_aadhar,wastepicker_license,wastepicker_photo) values ('" . $_POST["txtname"] . "','" . $_POST["txtaddress"] . "','" . $_POST["Gender"] . "','" . $_POST["dat"] . "','" . $_POST["txtage"] . "','" . $_POST["txtcontact"] . "','" . $_POST["selward"] . "','" . $_POST["txtemail"] . "','" . $_POST["txtpassword"] . "','$photo1','$photo2','$photo3')";
    if(mysql_query($insQry))
    {
      echo "<script>alert('WasterPicker Registered'); window.location='Login.php';</script>";
    }
}
if (isset($_GET["did"])) {
    $delQry = "delete from tbl_wastepicker where wastepicker_id='" . $_GET["did"] . "'";
    mysql_query($delQry);
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Waste Picker Registration</title>
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

    /* Make the feedback span appear inline */
    .feedback {
        display: inline-block;
        margin-left: 10px;
        font-size: 14px;
    }

    .feedback.valid {
        color: green;
    }

    .feedback.invalid {
        color: red;
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
        const name = document.getElementById("txtname").value;
        const nameFeedback = document.getElementById("houseNameFeedback");
        
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

    function validateAddress() {
        const address = document.getElementById("txtaddress").value;
        const addressFeedback = document.getElementById("addressFeedback");

        if (address.length >= 3) {
            addressFeedback.textContent = "Valid address length.";
            addressFeedback.className = "feedback valid";
            return true;
        } else {
            addressFeedback.textContent = "Address must be at least 3 characters.";
            addressFeedback.className = "feedback invalid";
            return false;
        }
    }

    function validateAgeNumber() {
        const ageNumber = document.getElementById("txtage").value;
        const ageNumberFeedback = document.getElementById("ageNumberFeedback");
        const ageNumberPattern = /^[a-zA-Z0-9]+$/;

        if (ageNumberPattern.test(ageNumber)) {
            ageNumberFeedback.textContent = "Valid age.";
            ageNumberFeedback.className = "feedback valid";
            return true;
        } else {
            ageNumberFeedback.textContent = "Age must contain only numbers.";
            ageNumberFeedback.className = "feedback invalid";
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
        const password = document.getElementById("txtpassword").value;
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

    function validateAdharPhoto() {
        const photo = document.getElementById("fileaadhar");
        const photoFeedback = document.getElementById("photoAdharFeedback");
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

            photoFeedback.textContent = "Valid proof.";
            photoFeedback.className = "feedback valid";
            return true;
        } else {
            photoFeedback.textContent = "Please select a photo.";
            photoFeedback.className = "feedback invalid";
            return false;
        }
    }


    function validateLicensePhoto() {
        const photo = document.getElementById("filelicense");
        const photoFeedback = document.getElementById("photoLicenseFeedback");
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

            photoFeedback.textContent = "Valid license.";
            photoFeedback.className = "feedback valid";
            return true;
        } else {
            photoFeedback.textContent = "Please select a photo.";
            photoFeedback.className = "feedback invalid";
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
            validateAddress() &&
            ageNumberFeedback() &&
            validateContactNumber() &&
            validateEmailFormat() &&
            checkPasswordStrength() &&
            validateAdharPhoto() &&
            validateLicensePhoto() &&
            validatePhoto()
        );
    }
</script>
</head>

<body>
    <div class="registration-container" style="margin-left:350px">
        <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit="return validateForm()">
            <h1>Waste Picker Registration</h1>
            <table>
                <tr>
                    <td>Name</td>
                    <td>
                        <input type="text" name="txtname" id="txtname" required oninput="validateName()"/>
                        <span id="houseNameFeedback" class="feedback"></span>
                    </td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>
                        <textarea name="txtaddress" id="txtaddress" cols="45" rows="5" required oninput="validateAddress()"></textarea>
                        <span id="addressFeedback" class="feedback"></span>
                </td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>
                        <label><input type="radio" name="Gender" value="male" id="Gender_0"  required checked/> Male</label><br />
                        <label><input type="radio" name="Gender" value="female" id="Gender_1" /> Female</label><br />
                        <label><input type="radio" name="Gender" value="other" id="Gender_2" /> Other</label><br /><br />
                    </td>
                </tr>
                <tr>
                    <td>DOB</td>
                    <td><input type="date" name="dat" id="dat" /></td>
                </tr>
                <tr>
                    <td>Age</td>
                    <td>
                        <input type="text" name="txtage" id="txtage" required oninput="validateAgeNumber()"/>
                        <span id="ageNumberFeedback" class="feedback"></span>
                    </td>
                </tr>
                <tr>
                    <td>Contact</td>
                    <td>
                    <input type="text" name="txtcontact" id="txtcontact" required oninput="validateContactNumber()"/>
                    <span id="contactFeedback" class="feedback"></span>
                </td>
                </tr>
                <tr>
                    <td>Ward Number</td>
                    <td>
                        <select name="selward" id="selward" required>
                            <option>----Select---</option>
                            <?php
                            $select = "select * from tbl_ward";
                            $result = mysql_query($select);
                            while ($data = mysql_fetch_array($result)) {
                            ?>
                                <option value="<?php echo $data["ward_id"] ?>"><?php echo $data["ward_no"] ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <input type="text" name="txtemail" id="txtemail" oninput="validateEmailFormat()()"/>
                        <span id="emailFeedback" class="feedback"></span>
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>
                        <input type="text" name="txtpassword" id="txtpassword" required minlength="6" oninput="checkPasswordStrength()"/>
                        <span id="passwordFeedback" class="feedback"></span>
                </td>
                </tr>
                <tr>
                    <td>Aadhar card</td>
                    <td>
                        <input type="file" name="fileaadhar" id="fileaadhar" required onchange="validateAdharPhoto()"/>
                         <span id="photoAdharFeedback" class="feedback"></span>
                </td>
                </tr>
                <tr>
                    <td>License</td>
                    <td><input type="file" name="filelicense" id="filelicense" required onchange="validateLicensePhoto()"/>
                    <span id="photoLicenseFeedback" class="feedback"></span>
                </td>
                </tr>
                <tr>
                    <td>Photo</td>
                    <td><input type="file" name="filephoto" id="filephoto" required onchange="validatePhoto()"/>
                    <span id="photoFeedback" class="feedback"></span>
                </td>
                </tr>
                <tr>
                    <td colspan="2" align="center"  style="text-align: center;">
                        <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" class="submit-btn"/>
                        <input type="reset" name="btnreset" id="btnreset" value="Reset" class="reset-btn"/>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
<?php include("Foot.php"); ?>

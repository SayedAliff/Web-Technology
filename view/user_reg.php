<<<<<<< HEAD
<?php
include '../control/user_reg_control.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <link rel="stylesheet" type="text/css" href="../css/khanStyle.css">
</head>
<body>
    <h1>User Registration</h1>
    <form  method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Full Name:</td>
                <td>
                    <input type="text" name="Ufullname" id="full_name">
                    <span class="error" style="color:red;"><?php echo $UfullnameError; ?></span> 
                </td>
            </tr>
            <tr>
                <td>Email:</td>
                <td>
                    <input type="email" name="Uemail" id="email">
                    <span class="error" style="color:red;"><?php echo $UemailError; ?></span> 
                </td>
            </tr>
            <tr>
                <td>User Name</td>
                <td>
                    <input type="text" name="Uusername" id="username">
                    <span class="error" style="color:red;"><?php echo $UusernameError; ?></span> 
                </td>
            </tr>
            <tr>
                <td>Password:</td>
                <td>
                    <input type="password" name="Upassword" id="password">
                    <span class="error" style="color:red;"><?php echo $UpasswordError; ?></span>
                </td>
            </tr>
            <tr>
                <td>Phone Number:</td>
                <td>
                    <input type="text" name="Uphone" id="phone" >
                    <span class="error" style="color:red;"><?php echo $UphoneError; ?></span> 
                </td>
            </tr>
            <tr>
                <td>Address:</td>
                <td>
                    <input type="text" id="address" name="Uaddress" >
                    <span class="error" style="color:red;"><?php echo $UaddressError; ?></span>
                </td>
            </tr>
            <tr>
                <td>Date of Birth:</td>
                <td>
                    <input type="date" name="Ubirthday" id="dob">
                    <span class="error" style="color:red;"><?php echo $UbirthdayError; ?></span>
                </td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td>
                    <input type="radio" name="Ugender" value="Male"> Male
                    <input type="radio" name="Ugender" value="Female"> Female
                    <input type="radio" name="Ugender" value="Other" > Other
                    <br>
                    <span class="error" style="color:red;"><?php echo $UgenderError; ?></span>
                </td>
            </tr>
            <tr>
                <td>Choose Your Photo:</td>
                <td>
                    <input type="file" name="Ufiles" id="profile">
                    <span class="error" style="color:red;"><?php echo $UfilesError; ?></span>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="button-container">
                    <input type="submit" class="button register" name="submit" value="Register">
                </td>
            </tr>
            <tr>
                <td><a href="http://localhost/springwt/view/user_home.php" class="link">Go to home page</a></td>
            </tr>
        </table>
    </form>
</body>
</html>
=======
<?php
include '../control/user_action.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <link rel="stylesheet" type="text/css" href="../css/khanStyle.css">
</head>
<body>
    <h1>User Registration</h1>
    <form  method="post" onsubmit="return validateForm()" >
        <table>
            <tr>
                <td>Full Name:</td>
                <td>
                    <input type="text" name="full_name" id="full_name">
                    <span id="full_name_error" class="error" style="color:red;"><?php echo $fullNameError; ?></span> 
                </td>
            </tr>
            <tr>
                <td>Email:</td>
                <td>
                    <input type="email" name="email" id="email">
                    <span id="email_error" class="error" style="color:red;"><?php echo $emailError; ?></span> 
                </td>
            </tr>
            <tr>
                <td>Password:</td>
                <td>
                    <input type="password" name="password" id="password">
                    <span id="password_error" class="error" style="color:red;"><?php echo $passwordError; ?></span>
                </td>
            </tr>
            <tr>
                <td>Confirm Password:</td>
                <td>
                    <input type="password" name="confirm_password" id="confirm_password">
                    <span id="confirm_password_error" class="error" style="color:red;"><?php echo $confirmPasswordError; ?></span> 
                </td>
            </tr>
            <tr>
                <td>Phone Number:</td>
                <td>
                    <input type="text" name="phone" id="phone" >
                    <span id="phone_error" class="error" style="color:red;"><?php echo $phoneError; ?></span> 
                </td>
            </tr>
            <tr>
                <td>Address:</td>
                <td>
                    <input type="text" id="address" name="address" >
                    <span id="address_error" class="error" style="color:red;"><?php echo $addressError; ?></span>
                </td>
            </tr>
            <tr>
                <td>Date of Birth:</td>
                <td>
                    <input type="date" name="dob" id="dob">
                    <span id="dob_error" class="error" style="color:red;"><?php echo $dobError; ?></span>
                </td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td>
                    <input type="radio" name="gender" value="Male"> Male
                    <input type="radio" name="gender" value="Female"> Female
                    <input type="radio" name="gender" value="Other" > Other
                    <br>
                    <span id="gender_error" class="error" style="color:red;"><?php echo $genderError; ?></span>
                </td>
            </tr>
            <tr>
                <td>Choose Your Photo:</td>
                <td>
                    <input type="file" name="profile" id="profile">
                    <span id="profile_error" class="error" style="color:red;"><?php echo $photoError; ?></span>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="button-container">
                    <input type="submit" class="button register" name="submit" value="Register">
                </td>
            </tr>
        </table>
    </form>
    <script src="../js/khan.js"></script>
</body>
</html>
>>>>>>> e96a7fed9d763c0f382934df2261b770b813e710

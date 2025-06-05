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
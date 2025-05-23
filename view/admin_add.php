<?php
include '../control/admin_add_control.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>E-Pharmacy Admin Registration</title>
    <link rel="stylesheet" type="text/css" href="../css/admin-style.css">
    <link rel="icon" type="image/x-icon" href="../image/favicon.ico">
</head>
<body>
    <h1> E-Pharmacy </h1>
    <hr>     
    <h2> Add Admins </h2>

    <form  method="post" enctype="multipart/form-data">
        <table align="center">
        <tr>
             <td>Username:</td>
             <td>
              <input type="text" name="Ausername" id="Ausername">
              <span style="color:red;"><?php echo $usernameError; ?></span>
            </td>
        </tr>

        <tr>
            <td>Password:</td>
            <td>
                <input type="password" name="Apassword" id="Apassword">
                <span style="color:red;"><?php echo $passwordError; ?></span>
            </td>
        </tr>

            <tr>
                <td><h4> Personal Informations </h4></td>
            </tr>

            <tr>
                <td>Full Name: </td>
                <td>
                <input type="text" id="Afullname" name="Afullname">
                <span id="fname-error" style="color:red;"><?php echo $fnameError; ?></span>
                </td>
            </tr>

            <tr>
                <td>Date of birth: </td> 
                <td>
                    <input type="date" id="Abirthday" name="Abirthday">
                    <span id="dob-error" style="color:red;"><?php echo $birthError; ?></span>
                </td>
            </tr>

            <tr>
                <td>Select a gender: </td> 
                <td>
                    <input type="radio" name="Agender" value="male">Male
                    <input type="radio" name="Agender" value="female">Female
                    <input type="radio" name="Agender" value="Other">Other
                    <br>
                    <span id="gender-error" style="color:red;"><?php echo $genderError; ?></span>
                </td>
            </tr>

            <tr>
                <td> Phone Number: </td>
                <td> 
                    <input type="tel" id="Aphone" name="Aphone" placeholder="+880-1* **** **** "> 
                    <span style="color:red;"><?php echo $phoneError; ?></span>
                </td>
            </tr>

            <tr>
                <td>Address: </td> 
                <td>
                    <input type="text" id="Aaddress" name="Aaddress">
                    <span style="color:red;"><?php echo $addressError; ?></span>
                </td>
            </tr>

            <tr>  
                <td>Email Address: </td>
                <td> 
                    <input type="email" id="Aemail" name="Aemail">
                    <span id="email-error" style="color:red;"><?php echo $emailError; ?></span>
                </td>
            </tr>    

            <tr>
                <td> Upload Your Image: </td>
                <td> 
                    <input type="file" id="Afiles" name="Afiles">
                </td>
            </tr>

            <tr>
                <td><h4> Education </h4></td>
            </tr>

            <tr>
                <td>Degree: </td>
                <td> 
                    <input type="text" name="Adegree">
                </td>
            </tr>

            <tr>
                <td>Institute: </td>
                <td> 
                    <input type="text" name="Ainstitute">
                </td>
            </tr>

            <tr>
                <td>Passing year: </td>
                <td> 
                    <input type="text" name="Apassing_year">
                </td>  
            </tr>

            <tr>
                <td>
                    <input type="reset" class="btn reset" value="Reset">
                    <input type="submit" class="btn submit" name="submit" value="Submit">
                </td>
            </tr>

            <tr>
                <td><a href="../view/admin_dashboard.php" class="link">Go to Dashboard</a></td>
            </tr>

            <tr>
                <td colspan="2" style="color:red;"><?php echo $errMsg; ?></td>
            </tr>
        </table>
    </form>
    <br>
    <img src="../image/actionpage.jpg" width="100%" height="100%">
    <br>
    <footer style="text-align:center; color:#666;">
        2025 E-Pharmacy. All rights reserved.
    </footer>
    
</body>
</html>
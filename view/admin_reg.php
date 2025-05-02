
<?php
include '../control/action.php';
?>


<!DOCTYPE html>
<html>
<head>
    <title>E-Pharmacy admin reg</title>
    <link rel="stylesheet" type="text/css" href="../css/alif-style.css">
    <link rel="icon" type="image/x-icon" href="../image/favicon.ico">
</head>
<body>
    <h1> E-Pharmacy </h1>
    <hr>     
    <h2> Admin Registration </h2>

    <form  method="post" onsubmit="return validate()">
        <table align="center">

            <tr>
                <td><h4> Personal Informations </h4></td>
            </tr>

            <tr>
                <td>Full Name: </td>
                <td>
                <input type="text" id="fname" name="fullname">
                <span id="fname-error" style="color:red;"><?php echo $fnameError; ?></span>
                </td>
            </tr>

            <tr>
                <td>Date of birth: </td> 
                <td>
                    <input type="date" id="dob" name="birthday">
                    <span id="dob-error" style="color:red;"><?php echo $birthError; ?></span>
                </td>
            </tr>

            <tr>
                <td>Select a gender: </td> 
                <td>
                    <input type="radio" name="gender" value="male">Male
                    <input type="radio" name="gender" value="female">Female
                    <input type="radio" name="gender" value="Other">Other
                    <br>
                    <span id="gender-error" style="color:red;"><?php echo $genderError; ?></span>
                </td>
            </tr>

            <tr>
                <td> Phone Number: </td>
                <td> 
                    <input type="tel" id="phone" name="phone" placeholder="+880-1* **** **** "> 
                    <span style="color:red;"><?php echo $phoneError; ?></span>
                </td>
            </tr>

            <tr>
                <td>Address: </td> 
                <td>
                    <input type="text" id="address" name="address">
                    <span style="color:red;"><?php echo $addressError; ?></span>
                </td>
            </tr>

            <tr>  
                <td>Email Address: </td>
                <td> 
                    <input type="email" id="email" name="email">
                    <span id="email-error" style="color:red;"></span>
                    <span style="color:red;"><?php echo $emailError; ?></span>
                </td>
            </tr>    

            <tr>
                <td> Upload Your Image: </td>
                <td> 
                    <input type="file" id="image" name="images">
                    <span id="image-error" style="color:red;"></span>
                </td>
            </tr>

            <tr>
                <td><h4> Education </h4></td>
            </tr>

            <tr>
                <td>Degree: </td>
                <td> 
                    <input type="text" name="degree ">
                </td>
            </tr>

            <tr>
                <td>Institute: </td>
                <td> 
                    <input type="text" name="institute ">
                </td>
            </tr>

            <tr>
                <td>Passing year: </td>
                <td> 
                    <input type="text" name="year ">
                </td>  
            </tr>

            <tr>
                <td><h4>Skills</h4></td>
            </tr>

            <tr>
                <td>
                    <input type="checkbox" name="check1" value="Inventory Management">Inventory
                    <input type="checkbox" name="check2" value="Customer Service">Customer Support
                    <input type="checkbox" name="check3" value="Regulatory Compliance">Compliance
                    <input type="checkbox" name="check4" value="E-Commerce.">E-Com 
                </td>
            </tr>

            <tr>
                <td>
                    <input type="reset" class="btn reset" value="Reset">
                    <input type="submit" class="btn submit" name="submit" value="Submit">
                </td>
            </tr>

            <tr>
                <td><a href="http://localhost/springwt/view/home.php" class="link">Go to home page</a></td>
            </tr>

        </table>
    </form>
    <script src="../js/alifjs.js"></script>
</body>
</html>
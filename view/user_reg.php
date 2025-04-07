<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <link rel="stylesheet" type="text/css" href="../css/khanStyle.css">
</head>
<body>
    <h1>User Registration</h1>
    <form action="user_action.php" method="post">
        <table>
            <tr>
                <td id="F_Text">Full Name:</td>
                <td id="I_Text"><input type="text" name="full_name"></td>
            </tr>
            <tr>
                <td id="F_Text">Email:</td>
                <td id="I_Text"><input type="email" name="email"></td>
            </tr>
            <tr>
                <td id="F_Text">Password:</td>
                <td id="I_Text"><input type="password" name="password"></td>
            </tr>
            <tr>
                <td id="F_Text">Confirm Password:</td>
                <td id="I_Text"><input type="password" name="confirm_password"></td>
            </tr>
            <tr>
                <td id="F_Text">Phone Number:</td>
                <td id="I_Text"><input type="text" name="phone"></td>
            </tr>
            <tr>
                <td id="F_Text">Address:</td>
                <td id="I_Text"><textarea name="address"></textarea></td>
            </tr>
            <tr>
                <td id="F_Text">Date of Birth:</td>
                <td id="I_Text"><input type="date" name="dob"></td>
            </tr>
            <tr>
                <td id="F_Text">Gender:</td>
                <td id="I_Text">
                    <input type="radio" id="gender1" name="gender" value="Male"> Male
                    <input type="radio" id="gender2" name="gender" value="Female"> Female
                    <input type="radio" id="gender3" name="gender" value="Other"> Other
                </td>
            </tr>
            <tr>
                <td id="F_Text">Choose Your Photo:</td>
                <td id="I_Text"><input type="file" name="profile"></td>
            </tr>
            <tr>
                <td colspan="2" class="button-container">
                    <input id="submitButton" type="submit" class="button register" value="Register">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
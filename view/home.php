<?php
include '../control/admin_login_control.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>E-Pharmacy</title>
    <link rel="stylesheet" type="text/css" href="../css/admin-style.css">
    <link rel="icon" type="image/x-icon" href="../image/favicon.ico">
</head>
<body>
      <h1> E-Pharmacy </h1>
      <hr>
      <form method="POST" id="loginForm" >
        <table align="center">
            <tr>
                <td>Username:</td>
                <td><input type="text" name="Ausername"></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type="password" name="Apassword"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="submit" value="Login"></td>
            </tr>
            <tr>
              
                <td><a href="http://localhost/springwt/view/admin_reg.php" class="link">Click for the Admin Registration </a></td>
              </tr>
          
                <td><a href="http://localhost/springwt/view/user_reg.php" class="link">Click for the User Registration </a></td>
              
            </tr>
        </table>
      </form>
      <script src="../js/admin.js"></script>
</body>
</html>
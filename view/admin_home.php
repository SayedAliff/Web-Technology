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
              
                <td><a href="http://localhost/springwt/view/admin_reg.php" class="link">Click for Admin Registration </a></td>
              </tr>
            <tr>
                <td><a href="http://localhost/springwt/view/home.php" class="link">Go to home page</a></td>
            </tr>
        </table>
        <footer style="text-align:center; color:#666;">
              2025 E-Pharmacy. All rights reserved.
            </footer>
      </form>
</body>
</html>
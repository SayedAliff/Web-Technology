<?php
include '../control/admin_login_control.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>E-Pharmacy</title>
    <link rel="stylesheet" type="text/css" href="../css/home.css">
    <link rel="icon" type="image/x-icon" href="../image/favicon.ico">
</head>
<body>
      <h1> E-Pharmacy </h1>
      <hr>
      <form method="POST" id="loginForm" >
        <table align="center">
            <tr>
                <td><a href="http://localhost/springwt/view/admin_home.php" class="link">View for Admins</a></td>
              </tr>
                <td><a href="http://localhost/springwt/view/user_home.php" class="link">View For Users </a></td>
            </tr>
        </table>
        <footer style="text-align:center; color:#666;">
              2025 E-Pharmacy. All rights reserved.
            </footer>
      </form>
</body>
</html>
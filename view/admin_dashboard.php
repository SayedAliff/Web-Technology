<?php
include '../control/admin_dashboard_control.php';

?>

<!DOCTYPE html>
<html>
<head>
    <title>E-Pharmacy admin reg</title>
    <link rel="stylesheet" type="text/css" href="../css/admin-style.css">
    <link rel="icon" type="image/x-icon" href="../image/favicon.ico">
</head>
<body>
        <h1> E-Pharmacy </h1>
        <hr>
        <br>
        <br>
        <br>
        <br>
        <h1> <p id="id"> Welcome to your Profile   !!!!! </p> </h1>
   
        <table id='showTable'>
        <tr>
            <th> Full Name</th>
            <th> Birth Date</th>
            <th> Email</th>
            <th> Gender</th>
            <th> Address</th>
            <th> Mobile Number</th>
            <th> User Name</th>
            <th> Degree</th>
            <th> Institute Name</th>
            <th> Passing Year</th>
          
        </tr>
        <tr>
            <td><?php echo $Afullname ?></td>
            <td><?php echo $Abirthday ?></td>
            <td><?php echo $Aemail ?></td>
            <td><?php echo $Agender ?></td>
            <td><?php echo $Aaddress ?></td>
            <td><?php echo $Aphone ?></td>
            <td><?php echo $Ausername ?></td>
            <td><?php echo $Adegree ?></td>
            <td><?php echo $Ainstitute ?></td>
            <td><?php echo $Apassing_year ?></td>
        </tr>
    </table>
        <br><br><br>

        <img src="../image/actionpage.jpg" width="100%" height="100%">
        
            2025 E-Pharmacy. All rights reserved.
        <br>
        <br>
       <h2><a href="http://localhost/springwt/view/home.php" class="link">Go to home page </a></h2>
       
        

</body>
</html>
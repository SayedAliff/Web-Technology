<?php
include '../control/admin_dashboard_control.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>E-Pharmacy Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../css/admin-style.css">
    <link rel="icon" type="image/x-icon" href="../image/favicon.ico">
</head>
<body>
    <h1>E-Pharmacy Admin Dashboard</h1>
    <hr>
    <br><br><br>
<?php
$profilePic = !empty($Afile) ? "../uploads/" . htmlspecialchars($Afile) : "../image/default-profile.png";
?>
    <div>
        <img src="<?php echo $profilePic; ?>" alt="Profile Picture" width="100" height="100" style="vertical-align:middle; border-radius:70%; margin-right:20px;">
        <b><?php echo htmlspecialchars($Afullname); ?>,<br><br><?php echo htmlspecialchars($Ausername); ?>, Welcome to your Profile !!!!!</br>
    </div>
    
    <br><br>
    <h1>Admins List</h1>
    <table id="showTable" border="1" cellpadding="5">
        <tr>
            <th>Full Name</th>
            <th>Birth Date</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Mobile Number</th>
            <th>User Name</th>
            <th>Degree</th>
            <th>Institute Name</th>
            <th>Passing Year</th>
            <th>Picture</th>
            <th>Action</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($allAdmins)) { ?>
            <tr>
                <td><?php echo $row['Afullname']; ?></td>
                <td><?php echo $row['Abirthday']; ?></td>
                <td><?php echo $row['Aemail']; ?></td>
                <td><?php echo $row['Agender']; ?></td>
                <td><?php echo $row['Aaddress']; ?></td>
                <td><?php echo $row['Aphone']; ?></td>
                <td><?php echo $row['Ausername']; ?></td>
                <td><?php echo $row['Adegree']; ?></td>
                <td><?php echo $row['Ainstitute']; ?></td>
                <td><?php echo $row['Apassing_year']; ?></td>
                <td>
                    <?php if (!empty($row['Afiles'])): ?>
                        <img src="../uploads/<?php echo htmlspecialchars($row['Afiles']); ?>" width="40" height="40" style="border-radius:50%;">
                    <?php else: ?>
                        <img src="../image/default-profile.png" width="40" height="40" style="border-radius:50%;">
                    <?php endif; ?>
                </td>
                <td>
                    <a href="../view/admin_edit.php?id=<?php echo $row['Aid']; ?>">Edit</a> |
                    <a href="../control/admin_delete_control.php?id=<?php echo $row['Aid']; ?>" onclick="return confirm('Are you sure you want to delete?');">Delete</a>
                </td>
            </tr>
        <?php } ?>

             <a href="../view/admin_add.php" class="btn submit">Add New Admin</a>
             <br><br><br>
    </table>

    <br><br>
    <img src="../image/actionpage.jpg" width="100%" height="100%">
    <br>
    <footer style="text-align:center; color:#666;">
        2025 E-Pharmacy. All rights reserved.
    </footer>
    <br>
    <h3><a href="../control/admin_logout_control.php" class="btn reset"> logout </a></h3>
</body>
</html>
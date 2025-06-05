<?php
include '../control/user_dashboard_control.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>E-Pharmacy User Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../css/KhanStyle.css">
    <link rel="icon" type="image/x-icon" href="../image/favicon.ico">
</head>
<body>
    <h1>E-Pharmacy User Dashboard</h1>

    <br><br><br><br><br><br><br>
    <?php
    $profilePic = (!empty($row['Ufiles']) && file_exists($_SERVER['DOCUMENT_ROOT']."/springwt/user_uploads/".$row['Ufiles']))
        ? "../user_uploads/" . htmlspecialchars($row['Ufiles'])
        : "../image/default-profile.png";
    ?>
    <div>
        <img src="<?php echo $profilePic; ?>" alt="Profile Picture" width="100" height="100" style="vertical-align:middle; border-radius:70%; margin-right:20px;">
        <b><?php echo htmlspecialchars($row['Ufullname']); ?>,<br><br><?php echo htmlspecialchars($row['Uusername']); ?>, Welcome to your Profile !!!!!</b>
    </div>
    <br><br>
    <?php if (!empty($successMsg)): ?>
        <span style="color:green;"><?php echo htmlspecialchars($successMsg); ?></span>
    <?php endif; ?>
    <?php if (!empty($errorMsg)): ?>
        <span style="color:red;"><?php echo htmlspecialchars($errorMsg); ?></span>
    <?php endif; ?>
    <br>
    <h2>Edit Your Profile</h2>
    <form method="post" enctype="multipart/form-data">
        <table>
            <tr><td>Full Name:</td><td><input type="text" name="Ufullname" value="<?php echo htmlspecialchars($row['Ufullname']); ?>" required></td></tr>
            <tr><td>Birth Date:</td><td><input type="date" name="Ubirthday" value="<?php echo htmlspecialchars($row['Ubirthday']); ?>" required></td></tr>
            <tr><td>Gender:</td>
                <td>
                    <select name="Ugender" required>
                        <option value="">Select</option>
                        <option value="Male" <?php if($row['Ugender']=="Male") echo "selected"; ?>>Male</option>
                        <option value="Female" <?php if($row['Ugender']=="Female") echo "selected"; ?>>Female</option>
                        <option value="Other" <?php if($row['Ugender']=="Other") echo "selected"; ?>>Other</option>
                    </select>
                </td>
            </tr>
            <tr><td>Mobile Number:</td><td><input type="text" name="Uphone" value="<?php echo htmlspecialchars($row['Uphone']); ?>" required></td></tr>
            <tr><td>Address:</td><td><input type="text" name="Uaddress" value="<?php echo htmlspecialchars($row['Uaddress']); ?>" required></td></tr>
            <tr><td>Email:</td><td><input type="email" name="Uemail" value="<?php echo htmlspecialchars($row['Uemail']); ?>" required></td></tr>
            <tr><td>Profile Picture:</td>
                <td>
                    <input type="file" name="Ufiles">
                    <img src="<?php echo $profilePic; ?>" width="40" height="40" style="border-radius:50%;">
                </td>
            </tr>
            <tr>
                <td>New Password:</td>
                <td><input type="password" name="new_password" placeholder="Leave blank to keep old"></td>
            </tr>
        </table>
        <input type="submit" value="Update Profile" class="btn submit">
    </form>
    <br><br>
    <h2>Users List (Read Only)</h2>
    <table id="showTable" border="1" cellpadding="5">
        <tr>
            <th>Full Name</th>
            <th>Birth Date</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Mobile Number</th>
            <th>User Name</th>
            <th>Picture</th>
        </tr>
        <?php while($userRow = mysqli_fetch_assoc($allUsers)) {
            $pic = (!empty($userRow['Ufiles']) && file_exists($_SERVER['DOCUMENT_ROOT']."/springwt/user_uploads/".$userRow['Ufiles']))
                ? "../user_uploads/" . htmlspecialchars($userRow['Ufiles'])
                : "../image/default-profile.png";
        ?>
            <tr>
                <td><?php echo htmlspecialchars($userRow['Ufullname']); ?></td>
                <td><?php echo htmlspecialchars($userRow['Ubirthday']); ?></td>
                <td><?php echo htmlspecialchars($userRow['Uemail']); ?></td>
                <td><?php echo htmlspecialchars($userRow['Ugender']); ?></td>
                <td><?php echo htmlspecialchars($userRow['Uaddress']); ?></td>
                <td><?php echo htmlspecialchars($userRow['Uphone']); ?></td>
                <td><?php echo htmlspecialchars($userRow['Uusername']); ?></td>
                <td>
                    <img src="<?php echo $pic; ?>" width="40" height="40" style="border-radius:50%;">
                </td>
            </tr>
        <?php } ?>
    </table>
    <footer style="text-align:center; color:#666;">
        2025 E-Pharmacy. All rights reserved.
    </footer>
    <br>
    <h3><a href="../control/user_logout_control.php" class="btn reset"> logout </a></h3>
</body>
</html>
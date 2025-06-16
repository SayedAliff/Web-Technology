<?php
session_start();
include "../model/user_db.php";

$errorMsg = "";

if (isset($_REQUEST['submit'])) {
    $conn = createCon();
    $res = checkUserLogin($conn, $_REQUEST['Uusername'], $_REQUEST['Upassword']);

    if ($res && mysqli_num_rows($res) > 0) {
        $_SESSION['user'] = $_REQUEST['Uusername'];
        header("Location: ../view/user_dashboard.php");
        exit();
    } else {
        $errorMsg = "Invalid username or password";
        echo $errorMsg;
    }

    closeCon($conn);
}
?>
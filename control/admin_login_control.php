<?php
session_start();
include "../model/admin_db.php";

if(isset($_REQUEST['submit'])) {
    $conn = createCon();
    $res = checkLogin($conn, $_REQUEST['Ausername'], $_REQUEST['Apassword']);
    
    if(mysqli_num_rows($res) > 0) {
        $_SESSION['admin'] = $_REQUEST['Ausername'];
        header("Location: ../view/admin_dashboard.php");
        exit(); 
    } else {
        echo "Invalid username or password";
    }

    closeCon($conn);
}

?>

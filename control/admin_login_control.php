<?php
include "../model/admindb.php";

if(isset($_REQUEST['submit'])) {
    $conn = createCon();
    $res = checkLogin($conn, $_REQUEST['username'], $_REQUEST['password']);
    
    if(mysqli_num_rows($res) > 0) {
        header("Location: ../view/admin_profile.php");
        exit(); 
    } else {
        echo "Invalid username or password";
    }

    closeCon($conn);
}
?>

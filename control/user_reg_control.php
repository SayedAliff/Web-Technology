<?php
// সব error variable initialize (যা যা ফর্মে ইউজ হতে পারে)
$UfullnameError = "";
$UbirthdayError = "";
$UbirthError = "";
$UgenderError = "";
$UphoneError = "";
$UaddressError = "";
$UemailError = "";
$UusernameError = "";
$UpasswordError = "";
$UfilesError = "";
$UphotoError = "";
$errMsg = "";

// Database functions include
include "../model/user_db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = createCon();
    $Uusername = $_POST['Uusername'];
    $Ufullname = $_POST['Ufullname'];
    $Ubirthday = $_POST['Ubirthday'];
    $Ugender = $_POST['Ugender'];
    $Uphone = $_POST['Uphone'];
    $Uaddress = $_POST['Uaddress'];
    $Uemail = $_POST['Uemail'];
    $Ufiles = ""; // handle file upload if needed
    $Upassword = $_POST['Upassword'];

    // Username check
    if (getUserByUsername($conn, $Uusername)) {
        $errMsg = "Username already exists!";
    }
    // Registration
    elseif (insertUserData($conn, $Ufullname, $Ubirthday, $Ugender, $Uphone, $Uaddress, $Uemail, $Uusername, $Upassword, $Ufiles)) {
        header("Location: ../view/user_home.php");
        exit();
    } else {
        $errMsg = "Registration failed!";
    }
    closeCon($conn);
}
?>
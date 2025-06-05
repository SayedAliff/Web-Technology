<?php


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
    $Ufiles = "";
    $Upassword = $_POST['Upassword'];
 

    if (getUserByUsername($conn, $Uusername)) {

        $errMsg = "Username already exists!";
    }

    elseif (insertUserData($conn, $Ufullname, $Ubirthday, $Ugender, $Uphone, $Uaddress, $Uemail, $Uusername, $Upassword, $Ufiles)) {

        header("Location: ../view/user_home.php");

        exit();

    } else {

        $errMsg = "Registration failed!";
    }

    closeCon($conn);

}

?>
 
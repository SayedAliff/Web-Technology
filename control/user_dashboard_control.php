<?php
session_start();
include "../model/user_db.php";

if (!isset($_SESSION['user'])) {
    header("Location: ../view/user_home.php");
    exit();
}

$conn = createCon();
$Uusername = $_SESSION['user'];
$row = getUserByUsername($conn, $Uusername);
$allUsers = getAllUsers($conn);

$successMsg = $errorMsg = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Ufullname = $_POST['Ufullname'];
    $Ubirthday = $_POST['Ubirthday'];
    $Ugender = isset($_POST['Ugender']) ? $_POST['Ugender'] : '';
    $Uphone = $_POST['Uphone'];
    $Uaddress = $_POST['Uaddress'];
    $Uemail = $_POST['Uemail'];
    $Ufiles = $row['Ufiles'];
    if (isset($_FILES["Ufiles"]) && $_FILES["Ufiles"]["error"] === 0 && !empty($_FILES["Ufiles"]["name"])) {
        $Ufiles = preg_replace('/[^A-Za-z0-9_\-\.]/', '', basename($_FILES["Ufiles"]["name"]));
        $uploadDir = $_SERVER['DOCUMENT_ROOT']."/springwt/user_uploads/";
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $targetFile = $uploadDir . $Ufiles;
        if (!move_uploaded_file($_FILES["Ufiles"]["tmp_name"], $targetFile)) {
            $errorMsg = "File upload failed! Error code: " . $_FILES["Ufiles"]["error"];
        }
    }
    $newPassword = "";
    if (!empty($_POST['new_password'])) {
        $newPassword = $_POST['new_password'];
    }
    if (
        updateOwnDetails($conn, $Uusername, $Ufullname, $Ubirthday, $Ugender, $Uphone, $Uaddress, $Uemail, $Ufiles, $newPassword)
    ) {
        $successMsg = "Profile updated successfully!";
        $row = getUserByUsername($conn, $Uusername);
    } else {
        $errorMsg = "Update failed. Please try again.";
    }
}

closeCon($conn);
?>
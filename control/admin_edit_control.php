<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../view/admin_home.php");
    exit();
}
include "../model/admin_db.php";


$fnameError = $birthError = $genderError = $phoneError = $addressError = $emailError = $usernameError = $passwordError = "";
$errMsg = "";

$conn = createCon();
$Aid = $_GET['id'];
$row = getAdminById($conn, $Aid);
if (!$row) {
    closeCon($conn);
    echo "Admin not found!";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Ausername = $_POST['Ausername'];
    $Apassword = $_POST['Apassword'];
    $Afullname = $_POST['Afullname'];
    $Abirthday = $_POST['Abirthday'];
    $Agender = isset($_POST['Agender']) ? $_POST['Agender'] : '';
    $Aphone = $_POST['Aphone'];
    $Aaddress = $_POST['Aaddress'];
    $Aemail = $_POST['Aemail'];
    $Adegree = $_POST['Adegree'];
    $Ainstitute = $_POST['Ainstitute'];
    $Apassing_year = $_POST['Apassing_year'];


    $Afiles = $row['Afiles'];
    if (isset($_FILES["Afiles"]) && $_FILES["Afiles"]["error"] == 0) {
        $Afiles = basename($_FILES["Afiles"]["name"]);
    }


    if (
        updateAdmin($conn, $Aid, $Afullname, $Abirthday, $Agender, $Aphone, $Aaddress, $Aemail, $Adegree, $Ainstitute, $Apassing_year, $Afiles)
    ) {
        if (!empty($Afiles) && isset($_FILES["Afiles"]) && $_FILES["Afiles"]["error"] == 0) {
            $uploadDir = $_SERVER['DOCUMENT_ROOT']."/springwt/uploads/";
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $targetFile = $uploadDir . $Afiles;
            move_uploaded_file($_FILES["Afiles"]["tmp_name"], $targetFile);
        }
        closeCon($conn);
        header("Location: ../view/admin_dashboard.php");
        exit();
    } else {
        $errMsg = "Update failed. Please try again.";
    }
}
closeCon($conn);
?>
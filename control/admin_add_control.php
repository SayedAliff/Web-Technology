<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: home.php");
    exit();
}
include "../model/admin_db.php";

$errMsg = "";
// Error variables for demo (normally set from validation logic)
$usernameError = $passwordError = $fnameError = $birthError = $genderError = $phoneError = $addressError = $emailError = "";

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

    // File optional
    $Afiles = "";
    if (isset($_FILES["Afiles"]) && $_FILES["Afiles"]["error"] == 0) {
        $Afiles = basename($_FILES["Afiles"]["name"]);
    }

    $conn = createCon();
    $sql = "INSERT INTO admins (Afullname, Abirthday, Agender, Aphone, Aaddress, Aemail, Ausername, Apassword, Adegree, Ainstitute, Apassing_year, Afiles) 
    VALUES ('$Afullname', '$Abirthday', '$Agender', '$Aphone', '$Aaddress', '$Aemail', '$Ausername', '$Apassword', '$Adegree', '$Ainstitute', '$Apassing_year','$Afiles')";
    if (mysqli_query($conn, $sql)) {
        if (!empty($Afiles)) {
            $uploadDir = $_SERVER['DOCUMENT_ROOT']."/springwt/uploads/";
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $targetFile = $uploadDir . $Afiles;
            move_uploaded_file($_FILES["Afiles"]["tmp_name"], $targetFile);
        }
        closeCon($conn);
        header("Location: admin_dashboard.php");
        exit();
    } else {
        $errMsg = "Registration not complete. Please try again.";
    }
    closeCon($conn);
}
?>
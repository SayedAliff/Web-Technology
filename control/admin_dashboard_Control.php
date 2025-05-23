<?php
include "../model/admin_db.php";
session_start();

$Afullname = $Abirthday = $Aemail = $Agender = $Aaddress = $Aphone = $Ausername = $Adegree = $Ainstitute = $Apassing_year = "";

if (!isset($_SESSION['admin'])) {
    header("Location: ../view/admin_login.php");
    exit();
} else {
    $Ausername = $_SESSION['admin'];
}

$conn = createCon();
$row = getAdminByUsername($conn, $Ausername); // ✅ use new function

if ($row) {
    $Afullname = $row['Afullname'];
    $Abirthday = $row['Abirthday'];
    $Aemail = $row['Aemail'];
    $Agender = $row['Agender'];
    $Aaddress = $row['Aaddress'];
    $Aphone = $row['Aphone'];
    $Ausername = $row['Ausername'];
    $Adegree = $row['Adegree'];
    $Ainstitute = $row['Ainstitute'];
    $Apassing_year = $row['Apassing_year'];
}

closeCon($conn);

?>

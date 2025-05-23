<?php
include "../model/admin_db.php";
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: ../view/home.php");
    exit();
}

$conn = createCon();

$Ausername = $_SESSION['admin'];
$row = getAdminByUsername($conn, $Ausername);

$allAdmins = getAllAdmins($conn);

$Afullname = $Afile = "";
if ($row) {
    $Afullname = $row['Afullname'];
    $Afile = $row['Afiles'];
}

closeCon($conn);

?>
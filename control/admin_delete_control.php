<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../view/home.php");
    exit();
}
include "../model/admin_db.php";
$conn = createCon();

$Aid = $_GET['id'];
if ($Aid) {
    deleteAdmin($conn, $Aid);
}
closeCon($conn);
header("Location: ../view/admin_dashboard.php");
exit();
?>
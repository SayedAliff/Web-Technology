<?php
include "../model/admindb.php";

$AfullnameError = $AbirthError = $AgenderError = $AphoneError = $AaddressError = $AemailError = $AusernameError = $ApasswordError = $AimageError = "";
$hasError = 0;
$AimageName = "";

if (isset($_REQUEST['submit'])) {

    if (empty($_REQUEST["Afullname"])) {
        $AfullnameError = "Full Name is required";
        $hasError = 1;
    }

    if (empty($_REQUEST["Abirthday"])) {
        $AbirthError = "Date of Birth is required";
        $hasError = 1;
    }

    if (empty($_REQUEST["Agender"])) {
        $AgenderError = "Select your gender";
        $hasError = 1;
    }

    if (empty($_REQUEST["Aphone"])) {
        $AphoneError = "Phone is required";
        $hasError = 1;
    }

    if (empty($_REQUEST["Aaddress"])) {
        $AaddressError = "Address is required";
        $hasError = 1;
    }

    if (empty($_REQUEST["Aemail"])) {
        $AemailError = "Email is required";
        $hasError = 1;
    }

    if (empty($_REQUEST["Ausername"])) {
        $AusernameError = "Username is required";
        $hasError = 1;
    }

    if (empty($_REQUEST["Apassword"])) {
        $ApasswordError = "Password is required";
        $hasError = 1;
    }

    if (!isset($_FILES["Aimages"]) || $_FILES["Aimages"]["error"] != 0) {
        $AimageError = "Invalid image file";
        $hasError = 1;
    } else {
        $AimageName = basename($_FILES["Aimages"]["name"]);
    }

    if ($hasError == 0) {
        $conn = createCon();
        if (insertData(
            $conn,
            $_REQUEST["Afullname"],
            $_REQUEST["Abirthday"],
            $_REQUEST["Agender"],
            $_REQUEST["Aphone"],
            $_REQUEST["Aaddress"],
            $_REQUEST["Aemail"],
            $_REQUEST["Ausername"],
            $_REQUEST["Apassword"],
            $_REQUEST["Adegree"],
            $_REQUEST["Ainstitute"],
            $_REQUEST["Apassing_year"],
            $AimageName
        )) {
            $uploadDir = $_SERVER['DOCUMENT_ROOT'] . "/springwt/uploads/";
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $targetFile = $uploadDir . $AimageName;
            if (move_uploaded_file($_FILES["Aimages"]["tmp_name"], $targetFile)) {
                header("Location: ../view/home.php");
                exit();
            }

        } else {
            $message = mysqli_error($conn);
        }
        closeCon($conn);
    }
}
?>

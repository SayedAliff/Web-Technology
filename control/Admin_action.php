<?php
include "../model/admindb.php";

$fnameError = $birthError = $genderError = $phoneError = $addressError = $emailError = $usernameError = $passwordError = $imageError = "";
$hasError = 0;
$imageName = "";

if (isset($_REQUEST['submit'])) {

    if (empty($_REQUEST["fullname"])) {
        $fnameError = "Full Name is required";
        $hasError = 1;
    }

    if (empty($_REQUEST["birthday"])) {
        $birthError = "Date of Birth is required";
        $hasError = 1;
    }

    if (empty($_REQUEST["gender"])) {
        $genderError = "Select your gender";
        $hasError = 1;
    }

    if (empty($_REQUEST["phone"])) {
        $phoneError = "Phone is required";
        $hasError = 1;
    }

    if (empty($_REQUEST["address"])) {
        $addressError = "Address is required";
        $hasError = 1;
    }

    if (empty($_REQUEST["email"])) {
        $emailError = "Email is required";
        $hasError = 1;
    }

    if (empty($_REQUEST["username"])) {
        $usernameError = "Username is required";
        $hasError = 1;
    }

    if (empty($_REQUEST["password"])) {
        $passwordError = "Password is required";
        $hasError = 1;
    }

    if (!isset($_FILES["images"]) || $_FILES["images"]["error"] != 0) {
        $imageError = "Invalid image file";
        $hasError = 1;
    } else {
        $imageName = basename($_FILES["images"]["name"]);
    }

    if ($hasError == 0) {
        $conn = createCon();
        if (insertData(
            $conn,
            $_REQUEST["fullname"],
            $_REQUEST["birthday"],
            $_REQUEST["gender"],
            $_REQUEST["phone"],
            $_REQUEST["address"],
            $_REQUEST["email"],
            $_REQUEST["username"],
            $_REQUEST["password"],
            $_REQUEST["degree"],
            $_REQUEST["institute"],
            $_REQUEST["passing_year"],
            $imageName
        )) {
            
            $uploadDir = $_SERVER['DOCUMENT_ROOT'] . "/springwt/uploads/";
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $targetFile = $uploadDir . $imageName;
            if (move_uploaded_file($_FILES["images"]["tmp_name"], $targetFile)) {
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

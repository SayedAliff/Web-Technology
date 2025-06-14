<?php
$fullNameError = $emailError = $passwordError = $confirmPasswordError = $phoneError = $addressError = $dobError = $genderError = $photoError= "";

if (isset($_REQUEST['submit'])) {

    if (empty($_REQUEST["full_name"])) {
        $fullNameError = "Full Name is required";
    } else {
        echo $_REQUEST["full_name"] . "<br>";
    }

    if (empty($_REQUEST["email"])) {
        $emailError = "Email is required";
    } else {
        echo $_REQUEST["email"] . "<br>";
    }

    if (empty($_REQUEST["password"])) {
        $passwordError = "Password is required";
    } else {
        echo $_REQUEST["password"] . "<br>";
    }

    if (empty($_REQUEST["confirm_password"])) {
        $confirmPasswordError = "Confirm Password is required";
    } elseif ($_REQUEST["confirm_password"] != $_REQUEST["password"]) {
        $confirmPasswordError = "Passwords do not match";
    } else {
        echo $_REQUEST["confirm_password"] . "<br>";
    }

    if (empty($_REQUEST["phone"])) {
        $phoneError = "Phone is required";
    } else {
        echo $_REQUEST["phone"] . "<br>";
    }

    if (empty($_REQUEST["address"])) {
        $addressError = "Address is required";
    } else {
        echo nl2br($_REQUEST["address"]) . "<br>";
    }

    if (empty($_REQUEST["dob"])) {
        $dobError = "Date of Birth is required";
    } else {
        echo $_REQUEST["dob"] . "<br>";
    }

    if (empty($_REQUEST["gender"])) {
        $genderError = "Gender is required";
    } else {
        echo $_REQUEST["gender"] . "<br>";
    }
}
?>

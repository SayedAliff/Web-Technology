<?php
$fnameError = $birthError = $genderError = $phoneError = $addressError = $emailError = "";

if (isset($_REQUEST['submit'])) {

    if (empty($_REQUEST["fullname"])) {
        $fnameError = "Full Name is required";
    } else {
        echo $_REQUEST["fullname"];
    }

    echo "<br>";

    if (empty($_REQUEST["birthday"])) {
        $birthError = "Date of Birth is required";
    } else {
        echo $_REQUEST["birthday"];
    }

    echo "<br>";

    if (empty($_REQUEST["gender"])) {
        $genderError = "Select your gender";
    } else {
        echo $_REQUEST["gender"];
    }

    echo "<br>";

    if (empty($_REQUEST["phone"])) {
        $phoneError = "Phone is required";
    } else {
        echo $_REQUEST["phone"];
    }

    echo "<br>";

    if (empty($_REQUEST["address"])) {
        $addressError = "Address is required";
    } else {
        echo $_REQUEST["address"];
    }

    echo "<br>";

    if (empty($_REQUEST["email"])) {
        $emailError = "Email is required";
    } else {
        echo $_REQUEST["email"];
    }
}

?>

<?php

function createCon() {
    return mysqli_connect("localhost", "root", "", "epharmacy");
}

function insertUserData($conn, $Ufullname, $Ubirthday, $Ugender, $Uphone, $Uaddress, $Uemail, $Uusername, $Upassword, $Ufiles) {
    $sql = "INSERT INTO users (Ufullname, Ubirthday, Ugender, Uphone, Uaddress, Uemail, Uusername, Upassword, Ufiles) 
            VALUES ('$Ufullname', '$Ubirthday', '$Ugender', '$Uphone', '$Uaddress', '$Uemail', '$Uusername', '$Upassword', '$Ufiles')";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}

function checkUserLogin($conn, $Uusername, $Upassword) {
    $sql = "SELECT * FROM users WHERE Uusername = '$Uusername' AND Upassword = '$Upassword'";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function getUserByUsername($conn, $Uusername) {
    $sql = "SELECT * FROM users WHERE Uusername = '$Uusername'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    } else {
        return null;
    }
}

function getAllUsers($conn) {
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function updateOwnDetails($conn, $Uusername, $Ufullname, $Ubirthday, $Ugender, $Uphone, $Uaddress, $Uemail, $Ufiles, $newPassword = "") {
    if ($newPassword !== "") {
        $sql = "UPDATE users SET Ufullname='$Ufullname', Ubirthday='$Ubirthday', Ugender='$Ugender', Uphone='$Uphone', Uaddress='$Uaddress', Uemail='$Uemail', Ufiles='$Ufiles', Upassword='$newPassword' WHERE Uusername='$Uusername'";
    } else {
        $sql = "UPDATE users SET Ufullname='$Ufullname', Ubirthday='$Ubirthday', Ugender='$Ugender', Uphone='$Uphone', Uaddress='$Uaddress', Uemail='$Uemail', Ufiles='$Ufiles' WHERE Uusername='$Uusername'";
    }
    return mysqli_query($conn, $sql);
}

function closeCon($conn) {
    mysqli_close($conn);
}
?>
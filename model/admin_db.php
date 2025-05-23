<?php

function createCon(){
    return mysqli_connect ("localhost", "root", "", "Epharmacy");
}

function insertData($conn, $Afullname, $Abirthday, $Agender, $Aphone, $Aaddress, $Aemail, $Ausername, $Apassword, $Adegree, $Ainstitute, $Apassing_year, $Afiles){
   
    $sql = "INSERT INTO admins (Afullname, Abirthday, Agender, Aphone, Aaddress, Aemail, Ausername, Apassword, Adegree, Ainstitute, Apassing_year, Afiles) 
    VALUES ('$Afullname', '$Abirthday', '$Agender', '$Aphone', '$Aaddress', '$Aemail', '$Ausername', '$Apassword', '$Adegree', '$Ainstitute', '$Apassing_year','$Afiles')";
    
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}

function checkLogin($conn, $Ausername, $Apassword) {
    $sql = "SELECT * FROM admins WHERE Ausername = '$Ausername' AND Apassword = '$Apassword'";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function getAdminByUsername($conn, $Ausername) {
    $sql = "SELECT * FROM admins WHERE Ausername = '$Ausername'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    } else {
        return null;
    }
}

function getAllAdmins($conn) {
    $sql = "SELECT * FROM admins";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function getAdminById($conn, $Aid) {
    $sql = "SELECT * FROM admins WHERE Aid='$Aid'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    } else {
        return null;
    }
}

function updateAdmin($conn, $Aid, $Afullname, $Abirthday, $Agender, $Aphone, $Aaddress, $Aemail, $Adegree, $Ainstitute, $Apassing_year, $Afiles) {
    $sql = "UPDATE admins SET 
        Afullname='$Afullname', 
        Abirthday='$Abirthday', 
        Agender='$Agender', 
        Aphone='$Aphone', 
        Aaddress='$Aaddress', 
        Aemail='$Aemail', 
        Adegree='$Adegree', 
        Ainstitute='$Ainstitute', 
        Apassing_year='$Apassing_year',
        Afiles='$Afiles'
        WHERE Aid='$Aid'";
    return mysqli_query($conn, $sql);
}

function deleteAdmin($conn, $Aid) {
    $sql = "DELETE FROM admins WHERE Aid='$Aid'";
    return mysqli_query($conn, $sql);
}


function closeCon($conn){
    mysqli_close($conn);
}
?>

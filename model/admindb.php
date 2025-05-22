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

function closeCon($conn){
    mysqli_close($conn);
}
?>

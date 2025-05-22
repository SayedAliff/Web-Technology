<?php

function createCon(){
    return mysqli_connect ("localhost", "root", "", "Epharmacy");
}

function insertData($conn,$fullname, $birthday, $gender, $phone, $address, $email, $username, $password, $degree, $institute, $passing_year, $imageName){
   
    $sql = "INSERT INTO admins(Afullname, Abirthday, Agender, Aphone, address, email, username,	password, degree, institute, passing_year, imageName) 
    VALUES ('$fullname', '$birthday', '$gender', '$phone', '$address', '$email', '$username', '$password', '$degree', '$institute', '$passing_year','$imageName')";
    if (mysqli_query($conn, $sql))
    {
        return true;
    } 
    else
    {
        return false;
    }
}

function checkLogin($conn, $username, $password) {
    $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    return $result;
}


function closeCon($conn){
    mysqli_close($conn);
}




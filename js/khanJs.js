function validateName() {
    let fname = document.getElementById("fname").value;
    if (fname == "" || fname.length < 5) {
        document.getElementById("error").innerHTML = "Please enter a valid name (minimum 5 characters)";
        return false;
    }
    return true;
}

function validate() {
    if (
        !validateName() 
       ) 
    {
        return false;
    }
    return true;
}

//change
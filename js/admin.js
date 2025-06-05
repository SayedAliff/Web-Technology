function validateName() {
    let fname = document.getElementById("Afullname").value;
    if (fname == "" || fname.length < 3) {
        document.getElementById("fname-error").innerHTML = "Please enter a valid name (min 3 characters)";
        return false;
    }
    return true;
}
document.getElementById("Afullname").addEventListener("input", function () {
    document.getElementById("fname-error").innerHTML = "";
});

function validateGender() {
    let gender = document.querySelector('input[name="Agender"]:checked');
    if (!gender) {
        document.getElementById("gender-error").innerHTML = "Please select a gender.";
        return false;
    }
    return true;
}
let genderRadios = document.querySelectorAll('input[name="Agender"]');
genderRadios.forEach(function (radio) {
    radio.addEventListener("change", function () {
        document.getElementById("gender-error").innerHTML = "";
    });
});

function validateEmail() {
    let email = document.getElementById("Aemail").value;
    if (email == "") {
        document.getElementById("email-error").innerHTML = "Email is required.";
        return false;
    }
    return true;
}
document.getElementById("Aemail").addEventListener("input", function () {
    document.getElementById("email-error").innerHTML = "";
});

function validateDOB() {
    let dob = document.getElementById("Abirthday").value;
    if (dob == "") {
        document.getElementById("dob-error").innerHTML = "Date of birth is required.";
        return false;
    }
    return true;
}
document.getElementById("Abirthday").addEventListener("input", function () {
    document.getElementById("dob-error").innerHTML = "";
});

function validate() {
    if (
        !validateName() ||
        !validateDOB() ||
        !validateGender() ||
        !validateEmail() 
    ) {
        return false;
    }
    return true;
}

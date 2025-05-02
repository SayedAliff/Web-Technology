
function validateName() {
    let fname = document.getElementById("fname").value;
    if (fname == "" || fname.length < 3) {
        document.getElementById("error").innerHTML = "Please enter a valid name (min 3 characters)";
        return false;
    }
    return true;
}
document.getElementById("fname").addEventListener("input", function () {
    document.getElementById("error").innerHTML = "";
});






function validateGender() {
    let gender = document.querySelector('input[name="gender"]:checked');
    if (!gender) {
        document.getElementById("gender-error").innerHTML = "Please select a gender.";
        return false;
    }
    return true;
}
let genderRadios = document.querySelectorAll('input[name="gender"]');
genderRadios.forEach(function (radio) {
    radio.addEventListener("change", function () {
        document.getElementById("gender-error").innerHTML = "";
    });
});






function validateEmail() {
    let email = document.getElementById("email").value;
    if (email == "") {
        document.getElementById("email-error").innerHTML = "Email is required.";
        return false;
    }
    return true;
}
document.getElementById("email").addEventListener("input", function () {
    document.getElementById("email-error").innerHTML = "";
});






function validateImage() {
    let imageInput = document.getElementById("image");
    let errorSpan = document.getElementById("image-error");

    if (imageInput.files.length === 0) {
        errorSpan.innerHTML = "Please upload an image.";
        return false;
    }
    return true;
}
document.getElementById("image").addEventListener("change", function () {
    document.getElementById("image-error").innerHTML = "";
});






function validateDOB() {
    let dob = document.getElementById("dob").value;
    if (dob == "") {
        document.getElementById("dob-error").innerHTML = "Date of birth is required.";
        return false;
    }
    return true;
}
document.getElementById("dob").addEventListener("input", function () {
    document.getElementById("dob-error").innerHTML = "";
});





function validate() {
    if (
        !validateName() ||
        !validateDOB() ||
        !validateGender() ||
        !validateEmail() ||
        !validateImage()
    ) {
        return false;
    }
    return true;
}
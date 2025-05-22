function validateForm() {
    let fullName = document.getElementById("full_name").value;
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;
    let confirmPassword = document.getElementById("confirm_password").value;
    let phone = document.getElementById("phone").value;
    let address = document.getElementById("address").value;
    let dob = document.getElementById("dob").value;
    let gender = document.querySelector('input[name="gender"]:checked');

    let isValid = true;

    document.querySelectorAll('.error').forEach(function(span) {
        span.textContent = '';
    });

    if (fullName == "") {
        document.getElementById("full_name_error").textContent = "Full Name is required.";
        isValid = false;
    }

    let emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (email == "" || !emailPattern.test(email)) {
        document.getElementById("email_error").textContent = "Please enter a valid email.";
        isValid = false;
    }

    if (password == "") {
        document.getElementById("password_error").textContent = "Password is required.";
        isValid = false;
    }

    if (confirmPassword == "") {
        document.getElementById("confirm_password_error").textContent = "Please confirm your password.";
        isValid = false;
    } else if (password != confirmPassword) {
        document.getElementById("confirm_password_error").textContent = "Passwords do not match.";
        isValid = false;
    }

    if (phone == "") {
        document.getElementById("phone_error").textContent = "Phone number is required.";
        isValid = false;
    }

    if (address == "") {
        document.getElementById("address_error").textContent = "Address is required.";
        isValid = false;
    }

    if (dob == "") {
        document.getElementById("dob_error").textContent = "Date of Birth is required.";
        isValid = false;
    }

    if (!gender) {
        document.getElementById("gender_error").textContent = "Please select your gender.";
        isValid = false;
    }

    return isValid;
}

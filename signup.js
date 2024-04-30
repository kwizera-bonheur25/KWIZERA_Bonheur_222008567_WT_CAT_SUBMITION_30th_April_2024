function validateForm() {
    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    var id_number = document.getElementById("id_number").value;
    var phone = document.getElementById("phone").value;
    var dob = document.getElementById("dob").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var errorDiv = document.getElementById("error");
    errorDiv.innerHTML = "";

    var valid = true;

    if (fname.trim() == "") {
        errorDiv.innerHTML += "<p>Please enter your first name</p>";
        valid = false;
    } else

    if (lname.trim() == "") {
        errorDiv.innerHTML += "<p>Please enter your last name</p>";
        valid = false;
    } else

    if (id_number.trim() == "") {
        errorDiv.innerHTML += "<p>Please enter your ID number</p>";
        valid = false;
    } else

    if (phone.trim() == "") {
        errorDiv.innerHTML += "<p>Please enter your phone number</p>";
        valid = false;
    } else

    if (!dob) {
        errorDiv.innerHTML += "<p>Please select your date of birth</p>";
        valid = false;
    } else

    if (email.trim() == "") {
        errorDiv.innerHTML += "<p>Please enter your email</p>";
        valid = false;
    } else if (!isValidEmail(email)) {
        errorDiv.innerHTML += "<p>Please enter a valid email address</p>";
        valid = false;
    }

    if (password.trim() == "") {
        errorDiv.innerHTML += "<p>Please enter a password</p>";
        valid = false;
    }

    return valid;
}

function isValidEmail(email) {
    // Regular expression for validating email addresses
    var emailRegex = /\S+@\S+\.\S+/;
    return emailRegex.test(email);
}
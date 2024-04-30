<?php

require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signup'])) {
    // Retrieve form data
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $id_number = trim($_POST['id_number']);
    $phone = trim($_POST['phone']);
    $gender = trim($_POST['gender']);
    $dob = trim($_POST['dob']);
    $marital_status = trim($_POST['marital_status']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (fname, lname, id_number, phone, gender, martial_status, dob, email,password)
              VALUES ('$fname', '$lname', '$id_number','$phone' , '$gender', '$marital_status','$dob', '$email', '$hashed_password')";

    if ($mysqli->query($query)) {

        header('Location: login.html');

    } else {
        echo "Error: " . $mysqli->error;
    }

    $mysqli->close();
} else {
    echo "No form data submitted.";
}
?>

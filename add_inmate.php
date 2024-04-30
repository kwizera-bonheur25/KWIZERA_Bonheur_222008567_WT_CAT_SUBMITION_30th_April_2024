<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // $fname = $lname = $id_number = $gender = $dob = $marital_status = $admission_date = $release_date = $prison_id = "";

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $id_number = $_POST['id_number'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $marital_status = $_POST['marital_status'];
    $admission_date = $_POST['admission_date'];
    $release_date = $_POST['release_date'];
    $prison_id = $_POST['prison_id'];

    $sql = "INSERT INTO prisoners (fname, lname, id_number, gender, DoB, martial_status, admission_date, release_date, prison_id) 
            VALUES ('$fname', '$lname', '$id_number', '$gender', '$dob', '$marital_status', '$admission_date', '$release_date', '$prison_id')";

    if (mysqli_query($mysqli, $sql)) {
        echo "Inamate added successfully!!!!";
        header("Location: admin-dashboard");
        exit();
    } else {
        echo "Fail to add new inmate";
        exit();
    }
}

mysqli_close($mysqli);
?>

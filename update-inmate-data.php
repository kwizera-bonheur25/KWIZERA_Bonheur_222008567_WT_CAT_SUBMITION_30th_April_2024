<?php
require 'config.php';

// Check if the prisoner ID is provided via the URL parameter
if (isset($_GET['id'])) {
    // Sanitize the input to prevent SQL injection
    $prisoner_id = mysqli_real_escape_string($mysqli, $_GET['id']);

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data and sanitize inputs
        $fname = mysqli_real_escape_string($mysqli, $_POST['fname']);
        $lname = mysqli_real_escape_string($mysqli, $_POST['lname']);
        $id_number = mysqli_real_escape_string($mysqli, $_POST['id_number']);
        $gender = mysqli_real_escape_string($mysqli, $_POST['gender']);
        $dob = mysqli_real_escape_string($mysqli, $_POST['dob']);
        $martial_status = mysqli_real_escape_string($mysqli, $_POST['martial_status']);
        $admission_date = mysqli_real_escape_string($mysqli, $_POST['admission_date']);
        $release_date = mysqli_real_escape_string($mysqli, $_POST['release_date']);
        $prison_id = mysqli_real_escape_string($mysqli, $_POST['prison_id']);

        // SQL query to update the prisoner with the specified ID
        $sql = "UPDATE prisoners SET 
        fname='$fname', 
        lname='$lname', 
        id_number='$id_number', 
        gender='$gender', 
        DoB='$dob', 
        martial_status='$martial_status', 
        admission_date='$admission_date', 
        release_date='$release_date', 
        prison_id='$prison_id' 
        WHERE prisoner_id='$prisoner_id'";

        // Execute the query
        if ($mysqli->query($sql) === TRUE) {
            // Redirect back to the prisoners list page after successful update
            header("Location: admin-dashboard");
            exit();
        } else {
            // Display an error message if the update fails
            echo "Error updating prisoner: " . $mysqli->error;
        }
    }
}
?>
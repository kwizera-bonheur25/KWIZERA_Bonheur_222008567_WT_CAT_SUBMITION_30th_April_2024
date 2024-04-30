<?php

// Include the database connection file
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
            header("Location: prisoners_list.php");
            exit();
        } else {
            // Display an error message if the update fails
            echo "Error updating prisoner: " . $mysqli->error;
        }
    }

    // Retrieve prisoner details based on the ID
    $sql = "SELECT * FROM prisoners WHERE prisoner_id='$prisoner_id'";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $fname = $row['fname'];
        $lname = $row['lname'];
        $id_number = $row['id_number'];
        $gender = $row['gender'];
        $dob = $row['DoB'];
        $martial_status = $row['martial_status'];
        $admission_date = $row['admission_date'];
        $release_date = $row['release_date'];
        $prison_id = $row['prison_id'];
    } else {
        // Redirect to the prisoners list page if no prisoner is found with the provided ID
        header("Location: prisoners_list.php");
        exit();
    }
} else {
    // Redirect to the prisoners list page if no ID is provided
    header("Location: prisoners_list.php");
    exit();
}

// Close connection
$mysqli->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Prisoner</title>
    <style>
        /* Body style */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

/* Container style */
.container {
    margin: 0 auto;
}

/* Heading style */
h1 {
    text-align: center;
    color: white;
}

/* Form style */
form {
    width: 70%;
    margin-left:10%;
    background-color: rgba(51, 51, 51, 0.9);
    padding: 1% 5%;
    border-radius: 20px;
}

/* Label style */
label {
    display: block;
    margin-bottom: 5px;
    color: white;
}

/* Input style */
input[type="text"],
input[type="date"],
select {
    width: calc(100% - 10px);
    padding: 8px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

/* Submit button style */
input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

/* Submit button hover effect */
input[type="submit"]:hover {
    background-color: #45a049;
}

    </style>
</head>
<body>
    <form action="<?= "../update-inmate-data.php" . '?id=' . $prisoner_id; ?>" method="POST">
    <h1>Update Inamte</h1>
        <label for="fname">First Name:</label>
        <input type="text" id="fname" name="fname" value="<?= $fname;?>" required><br>
        <label for="lname">Last Name:</label>
        <input type="text" id="lname" name="lname" value="<?= $lname; ?>" required><br>
        <label for="id_number">ID Number:</label>
        <input type="text" id="id_number" name="id_number" value="<?= $id_number; ?>" required><br>
        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="Male" <?= $gender == 'Male' ? 'selected' : ''; ?>>Male</option>
            <option value="Female" <?= $gender == 'Female' ? 'selected' : ''; ?>>Female</option>
            <option value="Other" <?= $gender == 'Other' ? 'selected' : ''; ?>>Other</option>
        </select><br>
        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" value="<?= $dob; ?>" required><br>
        <label for="martial_status">Marital Status:</label>
        <select id="martial_status" name="martial_status" required>
            <option value="Single" <?= $martial_status == 'Single' ? 'selected' : ''; ?>>Single</option>
            <option value="Married" <?= $martial_status == 'Married' ? 'selected' : ''; ?>>Married</option>
            <option value="Divorced" <?= $martial_status == 'Divorced' ? 'selected' : ''; ?>>Divorced</option>
            <option value="Widowed" <?= $martial_status == 'Widowed' ? 'selected' : ''; ?>>Widowed</option>
        </select><br>
        <label for="admission_date">Admission Date:</label>
        <input type="date" id="admission_date" name="admission_date" value="<?= $admission_date; ?>" required><br>
        <label for="release_date">Release Date:</label>
        <input type="date" id="release_date" name="release_date" value="<?= $release_date; ?>" required><br>
        <label for="prison_id">Prison ID:</label>
        <!-- <input type="text" id="prison_id" name="prison_id" value="<?= $prison_id; ?>" required><br> -->
        <select id="prison_id" name="prison_id" required>
        <?php
                        require 'config.php';
            
                        $query = "SELECT prison_id, prison_name FROM prisons";
                        $result = $mysqli->query($query);
            
                        if ($result) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . $row['prison_id'] . '">' . $row['prison_name'] . '</option>';
                            }
                        } else {
                            echo '<option disabled>Error loading prisons</option>';
                        }
                        ?>
                    </select><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>

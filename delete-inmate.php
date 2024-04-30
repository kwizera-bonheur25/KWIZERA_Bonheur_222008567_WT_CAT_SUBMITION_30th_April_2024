<?php
// Include the database connection file
require 'config.php';

// Check if the prisoner ID is provided via the URL parameter
if (isset($_GET['id'])) {
    // Sanitize the input to prevent SQL injection
    $prisoner_id = mysqli_real_escape_string($mysqli, $_GET['id']);

    // SQL query to delete the prisoner with the specified ID
    $sql = "DELETE FROM prisoners WHERE prisoner_id = '$prisoner_id'";

    // Execute the query
    if ($mysqli->query($sql) === TRUE) {
        // Redirect back to the prisoners list page after successful deletion
        header("Location: admin-dashboard");
        exit();
    } else {
        // Display an error message if the deletion fails
        echo "Error deleting prisoner: " . $mysqli->error;
    }
} 

// Close connection
$mysqli->close();
?>

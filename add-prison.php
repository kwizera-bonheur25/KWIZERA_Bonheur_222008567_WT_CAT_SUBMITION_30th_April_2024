<?php
require 'config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prison_name = $_POST['prison_name'];
    $prison_district = $_POST['prison_district'];
    $prison_sector = $_POST['prison_sector'];

    $sql = "INSERT INTO prisons (prison_name, prison_district, prison_sector) VALUES ('$prison_name', '$prison_district', '$prison_sector')";

    if ($mysqli->query($sql) === TRUE) {
        header("Location: admin-dashboard?page=prisons");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    $mysqli->close();
}
?>
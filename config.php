<?php

$host = 'localhost'; 
$username = 'root'; 
$password = ''; 
$dbname = 'kwizera_bonheur_jms';

// Create a new connection using MySQLi
$mysqli = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}

// You can now use $mysqli for your database queries throughout the project
?>

<?php
session_start();

require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];
    $pass = $_POST['password'];

    $email = $mysqli->real_escape_string($email);

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $mysqli->query($sql);

    if ($result && mysqli_num_rows($result) === 1) {

        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

        echo "************".password_verify($pass, $user['password']);

        if (password_verify($pass, $user['password'])) {

            $_SESSION['id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];

            if ($_SESSION['role'] === 'admin') {
                header('Location: admin_dashboard');
            } elseif ($_SESSION['role'] === 'visitor') {
                header('Location: admin-dashboard/');
            } else {
                header('Location: unknown_role_page.php');
            }
            exit;
        }
    }

    // If email and password combination is incorrect
    echo("Invalid email or password");
    // header('Location: login.html?error=Invalid credentials');
    exit;
} else {
    header('Location: login.php');
    exit;
}
?>

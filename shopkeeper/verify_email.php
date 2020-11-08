<?php
session_start();

require_once "includes/connect.php";

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $sql = "SELECT * FROM user_details WHERE token='$token' LIMIT 1";
    $result = mysqli_query($db, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $query = "UPDATE user_details SET verified=1 WHERE token='$token'";

        if (mysqli_query($db, $query)) {
            $_SESSION['email'] = $user['email'];
            $_SESSION['verified'] = true;
            $_SESSION['message'] = "Your email address has been verified successfully";
            $_SESSION['type'] = 'alert-success';
            header('location: index');
            exit(0);
        }
    } else {
        echo "User not found!";
    }
} else {
    echo "No token provided!";
}
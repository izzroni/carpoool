<?php
session_start();
require_once 'db_connect.php';

if(isset($_POST['signup'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $username = $conn->real_escape_string($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, username, password) VALUES ('$name', '$username', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "Registration successful. Please log in.";
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
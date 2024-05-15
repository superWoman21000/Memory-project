<?php
include 'config.php';

$username = $_POST['username'];
$password = $_POST['password'];
$interface = $_POST['interface'];

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (username, password, interface) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $username, $hashed_password, $interface);

if($stmt->execute()) {
    header("Location: login.php");
} else {
    echo "Error: " . $stmt->error;
}
?>

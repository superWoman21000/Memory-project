<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database configuration
include 'config.php';

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $role = $_POST['role'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate user credentials based on role
    switch ($role) {
        case 'chefProjet':
            $table = 'chefProjet';
            break;
        case 'BureauEtude':
            $table = 'BureauEtude';
            break;
        case 'Admin':
            $table = 'Admins';
            break;
        default:
            echo json_encode(['status' => 'error', 'message' => 'Invalid role']);
            exit(); // Exit script if role is invalid
    }

    // Using prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT id_$table, password_hash, interface FROM $table WHERE username = ?");
    if (!$stmt) {
        echo json_encode(['status' => 'error', 'message' => 'Database error']);
        exit();
    }
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($id, $storedPassword, $interface); // Adjusted the number of bind variables
    $stmt->fetch();
    $stmt->close();

    // Verify password
    if ($password === $storedPassword) {
        // Set the project leader's or BureauEtude's ID in the session
        if ($role === 'chefProjet') {
            session_start(); // Start the session if not already started
            $_SESSION['project_leader_id'] = $id; // Set the project leader's ID
        } elseif ($role === 'BureauEtude') {
            session_start(); // Start the session if not already started
            $_SESSION['BureauEtude_id'] = $id; // Set the BureauEtude's ID
        }

        // Return success and interface information
        echo json_encode(['status' => 'success', 'interface' => $interface]);
        exit(); // Exit script after successful login
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid password']);
        exit();
    }
}

$conn->close();
?>

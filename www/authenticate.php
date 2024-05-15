<?php
session_start();

include "db_connection.php"; // Include the file with database connection
include "user.php"; // Include the User class

$userObj = new User($conn);

// // Convert object to array for better readability
// $userArray = (array) $userObj;

// // Output the contents of the $userArray
// echo "<pre>";
// print_r($userArray);
// echo "</pre>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // echo "Username: $username<br>";
    // echo "Password: $password<br>";

    // Authenticate user
    if ($userObj->authenticate($username, $password)) {
        // Authentication successful
        $_SESSION['user'] = serialize($userObj); // Store the User object in the session
        $interface = $userObj->getInterface();
        if ($interface) {
            // Return success response with redirect URL
            echo json_encode(array("success" => true, "redirect" => "$interface"));
        } else {
            // Return error response
            echo json_encode(array("success" => false, "message" => "Interface not found"));
        }
    } else {
        // Return error response
        echo json_encode(array("success" => false, "message" => "Invalid credentials"));
    }
}
?>

<?php
// Include database connection
include 'config.php';

// Check if projectId is set and not empty
if (isset($_POST['projectId']) && !empty($_POST['projectId'])) {
    // Sanitize projectId to prevent SQL injection
    $projectId = $_POST['projectId'];

    // Create connection
    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("SELECT name FROM projet WHERE id_Projet = ?");
    $stmt->bind_param("i", $projectId);

    // Execute the statement
    $stmt->execute();

    // Bind result variables
    $stmt->bind_result($projectName);

    // Fetch result
    $stmt->fetch();

    // Close statement
    $stmt->close();

    // Close connection
    $conn->close();

    // Return project details as JSON
    echo json_encode(array("id" => $projectId, "name" => $projectName));
} else {
    // Return error message if projectId is not provided
    echo json_encode(array("error" => "Project ID not provided"));
}
?>

<?php
// Database connection
include 'config.php';

// Start session to access session variables
session_start();

// Check if project leader is logged in
if (!isset($_SESSION['project_leader_id'])) {
    http_response_code(401); // Unauthorized
    echo json_encode(array('error' => 'Project leader not logged in.'));
    exit;
}

// Get the ID of the logged-in project leader
$projectLeaderID = $_SESSION['project_leader_id'];

// Get the project ID from the POST data
$projectID = $_POST['projectID'];

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(array('error' => 'Connection failed: ' . $conn->connect_error));
    exit;
}

// Delete the relationship between the project and the project leader
$sqlDeleteRelationship = "DELETE FROM chefProjet_projet WHERE id_chefProjet = $projectLeaderID AND id_Projet = $projectID";

if ($conn->query($sqlDeleteRelationship) === TRUE) {
    echo json_encode(array('success' => 'Relationship deleted successfully.'));
} else {
    http_response_code(500); // Send a 500 Internal Server Error status code
    echo json_encode(array('error' => 'Error deleting relationship: ' . $conn->error));
}


$conn->close();
?>

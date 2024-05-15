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

// Get search term from POST data
$searchTerm = $_POST['searchTerm'];

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(array('error' => 'Connection failed: ' . $conn->connect_error));
    exit;
}

// Fetch projects related to the logged-in project leader and matching the search term
$sqlProjects = "SELECT p.id_Projet, p.Nom_Projet
                FROM projet p 
                INNER JOIN chefProjet_projet cpp ON p.id_Projet = cpp.id_Projet 
                WHERE cpp.id_chefProjet = $projectLeaderID
                AND p.Nom_Projet LIKE '%$searchTerm%'";

$resultProjects = $conn->query($sqlProjects);
$projects = array();
if ($resultProjects) {
    while ($row = $resultProjects->fetch_assoc()) {
        $projects[] = array(
            'id' => $row["id_Projet"],
            'name' => $row["Nom_Projet"]
        );
    }
} else {
    http_response_code(500);
    echo json_encode(array('error' => 'Error fetching filtered projects: ' . $conn->error));
    exit;
}

// Encode the response as JSON
$response = array(
    'projects' => $projects
);

echo json_encode($response); // Send the JSON response
?>

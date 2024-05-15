<?php
// Include database connection configuration
include 'config.php';

// Start session to access session variables
session_start();

// Check if BureauEtude is logged in
if (!isset($_SESSION['BureauEtude_id'])) {
    http_response_code(401); // Unauthorized
    echo json_encode(array('error' => 'BureauEtude not logged in.'));
    exit;
}

// Get the ID of the logged-in BureauEtude
$BureauEtudeID = $_SESSION['BureauEtude_id'];

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(array('error' => 'Connection failed: ' . $conn->connect_error));
    exit;
}

// Fetch entrepreneurs related to the logged-in BureauEtude
$sqlEntrepreneurs = "SELECT e.id_Entrepreneur, e.nom, e.prenom 
                     FROM entrepreneurs e 
                     INNER JOIN BureauEtudeEntrepreneur cpe ON e.id_Entrepreneur = cpe.id_Entrepreneur 
                     WHERE cpe.id_BureauEtude = $BureauEtudeID";
$resultEntrepreneurs = $conn->query($sqlEntrepreneurs);
$entrepreneurs = array();
if ($resultEntrepreneurs) {
    while ($row = $resultEntrepreneurs->fetch_assoc()) {
        $entrepreneurs[] = array(
            'id' => $row["id_Entrepreneur"],
            'name' => $row["nom"] . ' ' . $row["prenom"]
        );
    }
} else {
    http_response_code(500);
    echo json_encode(array('error' => 'Error fetching entrepreneurs: ' . $conn->error));
    exit;
}

// Fetch projects related to the logged-in BureauEtude
$sqlProjets = "SELECT p.id_Projet, p.Nom_Projet
               FROM projet p 
               INNER JOIN bureau_etude_projet bep ON p.id_Projet = bep.id_Projet 
               WHERE bep.id_bureau_etude = $BureauEtudeID";
$resultProjets = $conn->query($sqlProjets);
$projets = array();
if ($resultProjets) {
    while ($row = $resultProjets->fetch_assoc()) {
        $projets[] = array(
            'id' => $row["id_Projet"],
            'name' => $row["Nom_Projet"]
        );
    }
} else {
    http_response_code(500);
    echo json_encode(array('error' => 'Error fetching projets: ' . $conn->error));
    exit;
}

// Encode the response as JSON
$response = array(
    'entrepreneurs' => $entrepreneurs,
    'projets' => $projets,
);

// Output the JSON response
header('Content-Type: application/json');
echo json_encode($response);

// Log a message indicating successful response
error_log("Options successfully fetched and sent as JSON.");
?>

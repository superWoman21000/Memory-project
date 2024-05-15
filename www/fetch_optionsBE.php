<?php
// Database connection
include 'config.php';

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(array('error' => 'Connection failed: ' . $conn->connect_error));
    exit;
}

// Fetch entrepreneurs with nom and prenom
$sqlEntrepreneurs = "SELECT nom, prenom FROM entrepreneurs";
$resultEntrepreneurs = $conn->query($sqlEntrepreneurs);
$entrepreneurs = array();
if ($resultEntrepreneurs) {
    while ($row = $resultEntrepreneurs->fetch_assoc()) {
        $entrepreneurs[] = $row["nom"] . ' ' . $row["prenom"]; // Concatenate nom and prenom
    }
} else {
    http_response_code(500);
    echo json_encode(array('error' => 'Error fetching entrepreneurs: ' . $conn->error));
    exit;
}

// Fetch projets
$sqlProjets = "SELECT Nom_Projet FROM projet";
$resultProjets = $conn->query($sqlProjets);
$projets = array();
if ($resultProjets) {
    while ($row = $resultProjets->fetch_assoc()) {
        $projets[] = $row["Nom_Projet"];
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

echo json_encode($response); // Send the JSON response
?>

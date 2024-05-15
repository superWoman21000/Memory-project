<?php
// Database connection
$host = 'mysql-db';
$username = 'root1';
$password = 'passwordsarra1';
$database = 'passwordsarra1';

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(array('error' => 'Connection failed: ' . $conn->connect_error));
    exit;
}

// Fetch project information
$sql = "SELECT * FROM projet WHERE id_Projet = 1";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $response = array(
        'nomProjet' => $row['Nom_Projet'],
        'lieu' => $row['Lieu'],
        'dateInitial' => $row['Date_initial'],
        'pourcentage' => $row['Prourcentage_de_projet'],
        'nomEntrepreneur' => $row['Nom_entrepreneur'],
        'nomBureauEtude' => $row['Nom_Bureau_Etude']
    );

    echo json_encode($response);
} else {
    http_response_code(500);
    echo json_encode(array('error' => 'Error fetching project information'));
}

// Close connection
$conn->close();
exit;
?>

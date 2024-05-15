<?php
// Database connection parameters
$dsn = "mysql:host=localhost;dbname=projet_wilaya";
$username = "root";
$password = "sarasara";

try {
    // Create a new PDO instance
    $pdo = new PDO($dsn, $username, $password);

    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query to retrieve entrepreneur options from the database
    $queryEntrepreneur = "SELECT entrepreneur_name FROM entrepreneur";
    $stmtEntrepreneur = $pdo->query($queryEntrepreneur);
    $optionsEntrepreneur = $stmtEntrepreneur->fetchAll(PDO::FETCH_COLUMN);

    // Query to retrieve project options from the database
    $queryProjet = "SELECT nom_projet FROM projet";
    $stmtProjet = $pdo->query($queryProjet);
    $optionsProjet = $stmtProjet->fetchAll(PDO::FETCH_COLUMN);

    // Close database connection (not necessary for PDO)

    // Send options as JSON response
    $response = array(
        'entrepreneur' => $optionsEntrepreneur,
        'projet' => $optionsProjet
    );

    echo json_encode($response);
} catch (PDOException $e) {
    // Handle database connection errors
    die("Connection failed: " . $e->getMessage());
}
?>

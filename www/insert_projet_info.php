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

// Get POST data
$nomProjet = $_POST['nomProjet'];
$lieu = $_POST['lieu'];
$dateInitial = $_POST['dateInitial'];
$nomEntrepreneur = $_POST['nomEntrepreneur'];
$nomBureauEtude = $_POST['nomBureauEtude'];

// Validate date
if (empty($dateInitial)) {
    http_response_code(400); // Bad Request
    echo json_encode(array('error' => 'Date initial is required'));
    exit;
}

// Check if entrepreneur exists
$sqlEntrepreneur = "SELECT id_Entrepreneur FROM entrepreneurs WHERE nom = ?";
$stmtEntrepreneur = $conn->prepare($sqlEntrepreneur);
$stmtEntrepreneur->bind_param('s', $nomEntrepreneur);
$stmtEntrepreneur->execute();
$stmtEntrepreneur->store_result();

if ($stmtEntrepreneur->num_rows == 0) {
    http_response_code(400); // Bad Request
    echo json_encode(array('error' => 'This entrepreneur does not exist'));
    exit;
}

// Check if the BureauEtude exists in the database
$sqlCheckBureauEtude = "SELECT id_BureauEtude FROM BureauEtude WHERE nom = ?";
$stmtCheckBureauEtude = $conn->prepare($sqlCheckBureauEtude);
$stmtCheckBureauEtude->bind_param('s', $nomBureauEtude);
$stmtCheckBureauEtude->execute();
$stmtCheckBureauEtude->store_result();

if ($stmtCheckBureauEtude->num_rows > 0) {
    // BureauEtude exists, proceed with inserting the project information
    // Insert project information
    $sqlInsertProjet = "INSERT INTO projet (Nom_Projet, Lieu, Date_initial, Nom_entrepreneur, Nom_Bureau_Etude) VALUES (?, ?, ?, ?, ?)";
    $stmtInsertProjet = $conn->prepare($sqlInsertProjet);
    $stmtInsertProjet->bind_param('sssss', $nomProjet, $lieu, $dateInitial, $nomEntrepreneur, $nomBureauEtude);

    if ($stmtInsertProjet->execute()) {
        // Retrieve the project ID of the newly inserted project
        $projectID = $stmtInsertProjet->insert_id;

        // Get the BureauEtude ID
        $stmtCheckBureauEtude->bind_result($bureauEtudeID);
        $stmtCheckBureauEtude->fetch();

        // Insert a record into BureauEtude_Projet to establish the relationship
        $sqlInsertBureauEtudeProjet = "INSERT INTO BureauEtude_Projet (id_BureauEtude, id_Projet) VALUES (?, ?)";
        $stmtInsertBureauEtudeProjet = $conn->prepare($sqlInsertBureauEtudeProjet);
        $stmtInsertBureauEtudeProjet->bind_param('ii', $bureauEtudeID, $projectID);
        $stmtInsertBureauEtudeProjet->execute();

        // Insert a record into chefProjet_projet to establish the relationship with the project leader
        session_start();
        $projectLeaderID = $_SESSION['project_leader_id'];

        $sqlInsertChefProjetProjet = "INSERT INTO chefProjet_projet (id_chefProjet, id_Projet) VALUES (?, ?)";
        $stmtInsertChefProjetProjet = $conn->prepare($sqlInsertChefProjetProjet);
        $stmtInsertChefProjetProjet->bind_param('ii', $projectLeaderID, $projectID);
        $stmtInsertChefProjetProjet->execute();

        // Insert a record into chefProjetEntrepreneur to establish the relationship between project leader and entrepreneur
        $stmtEntrepreneur->bind_result($entrepreneurID);
        $stmtEntrepreneur->fetch();
        
        // Check if the relationship already exists
        $sqlCheckChefProjetEntrepreneur = "SELECT * FROM chefProjetEntrepreneur WHERE id_chefProjet = ? AND id_Entrepreneur = ?";
        $stmtCheckChefProjetEntrepreneur = $conn->prepare($sqlCheckChefProjetEntrepreneur);
        $stmtCheckChefProjetEntrepreneur->bind_param('ii', $projectLeaderID, $entrepreneurID);
        $stmtCheckChefProjetEntrepreneur->execute();
        $stmtCheckChefProjetEntrepreneur->store_result();

        if ($stmtCheckChefProjetEntrepreneur->num_rows == 0) {
            $sqlInsertChefProjetEntrepreneurs = "INSERT INTO chefProjetEntrepreneur (id_chefProjet, id_Entrepreneur) VALUES (?, ?)";
            $stmtInsertChefProjetEntrepreneurs = $conn->prepare($sqlInsertChefProjetEntrepreneurs);
            $stmtInsertChefProjetEntrepreneurs->bind_param('ii', $projectLeaderID, $entrepreneurID);
            $stmtInsertChefProjetEntrepreneurs->execute();
            $stmtInsertChefProjetEntrepreneurs->close();
        }

        // Insert a record into chefProjet_BureauEtude to establish the relationship between project leader and BureauEtude
        $sqlCheckChefProjetBE = "SELECT * FROM chefProjet_bureau_etude WHERE id_chefProjet = ? AND id_BureauEtude = ?";
        $stmtCheckChefProjetBE = $conn->prepare($sqlCheckChefProjetBE);
        $stmtCheckChefProjetBE->bind_param('ii', $projectLeaderID, $bureauEtudeID);
        $stmtCheckChefProjetBE->execute();
        $stmtCheckChefProjetBE->store_result();

        if ($stmtCheckChefProjetBE->num_rows == 0) {
            $sqlInsertChefProjetBE = "INSERT INTO chefProjet_bureau_etude (id_BureauEtude, id_chefProjet) VALUES (?, ?)";
            $stmtInsertChefProjetBE = $conn->prepare($sqlInsertChefProjetBE);
            $stmtInsertChefProjetBE->bind_param('ii', $bureauEtudeID, $projectLeaderID);
            $stmtInsertChefProjetBE->execute();
            $stmtInsertChefProjetBE->close();
        }

        // Insert a record into BureauEtude_entrepreneurs to establish the relationship between BureauEtude and Entrepreneur
        $stmtCheckBureauEtudeEntrepreneurs = $conn->prepare("SELECT * FROM BureauEtude_entrepreneurs WHERE id_BureauEtude = ? AND id_Entrepreneur = ?");
        $stmtCheckBureauEtudeEntrepreneurs->bind_param('ii', $bureauEtudeID, $entrepreneurID);
        $stmtCheckBureauEtudeEntrepreneurs->execute();
        $stmtCheckBureauEtudeEntrepreneurs->store_result();

        if ($stmtCheckBureauEtudeEntrepreneurs->num_rows == 0) {
            $sqlInsertBureauEtudeEntrepreneurs = "INSERT INTO BureauEtude_entrepreneurs (id_BureauEtude, id_Entrepreneur) VALUES (?, ?)";
            $stmtInsertBureauEtudeEntrepreneurs = $conn->prepare($sqlInsertBureauEtudeEntrepreneurs);
            $stmtInsertBureauEtudeEntrepreneurs->bind_param('ii', $bureauEtudeID, $entrepreneurID);
            $stmtInsertBureauEtudeEntrepreneurs->execute();
            $stmtInsertBureauEtudeEntrepreneurs->close();
        }

        echo json_encode(array('success' => true));
    } else {
        http_response_code(500);
        echo json_encode(array('error' => 'Error adding project'));
    }

    $stmtInsertProjet->close();
    $stmtInsertBureauEtudeProjet->close();
    $stmtInsertChefProjetProjet->close();
    $stmtCheckChefProjetEntrepreneur->close();
    $stmtCheckChefProjetBE->close();
} else {
    // BureauEtude does not exist, return error
    http_response_code(400);
    echo json_encode(array('error' => 'Invalid BureauEtude'));
}

// Close statement and connection
$stmtEntrepreneur->close();
$stmtCheckBureauEtude->close();
$conn->close();
exit;
?>

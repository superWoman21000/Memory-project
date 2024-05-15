<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


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


// Get Post data
$NumeroOperation = $_POST['NumeroOperation'];
$IntituleOperation = $_POST['IntituleOperation']; 
$TypeProgramme = $_POST['TypeProgramme'];
$direction = $_POST['direction'];
$Commune = $_POST['Commune'];
$DateInscription = $_POST['DateInscription'];
$DelaiResiliation = $_POST['DelaiResiliation'];
$APInitial = $_POST['APInitial'];
$CarnetCharge = $_POST['CarnetCharge'];
$AppelOffres = $_POST['AppelOffres'];
$OuverturePlis = $_POST['OuverturePlis'];
$EvaluationOffres = $_POST['EvaluationOffres'];
$publication = $_POST['publication'];
$PourcentageProjet = $_POST['PourcentageProjet'];
$commentaire = $_POST['commentaire'];
$APFinalActuel = $_POST['APFinalActuel'];
$Montant = $_POST['Montant'];
$Date_Date = $_POST['Date_Date'];



// Debugging - log received POST values
error_log(print_r($_POST, true));

// Convert enum fields to lowercase and trim
$enumFields = [
    strtolower(trim($CarnetCharge)),
    strtolower(trim($AppelOffres)),
    strtolower(trim($OuverturePlis)),
    strtolower(trim($EvaluationOffres)),
    strtolower(trim($publication))
];

// Debugging - log enum field values
error_log("Enum Field Values: " . implode(', ', $enumFields));

// Validate date
if (empty($DateInscription)) {
    http_response_code(400); // Bad Request
    echo json_encode(array('error' => 'Date Inscription is required'));
    exit;
}

// Validation for Enum fields
foreach ($enumFields as $field) {
    if ($field !== 'oui' && $field !== 'non') {
        http_response_code(400); // Bad Request
        echo json_encode(array('error' => 'Enum fields must be either "oui" or "non"'));
        exit;
    }
}

// Insert project information
$sql = "INSERT INTO Marche (Numero_Operation, Intitule_Operation, Type_Programme, Direction, Commune, Date_Inscription, Delai_Resiliation, AP_Initial, Carnet_Charge, Appel_Offres, Ouverture_Plis, Evaluation_Offres, Publication, Pourcentage_Projet, Commentaire, AP_Final_Actuel, Montant, Date_Date) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssssssssssssss", $NumeroOperation, $IntituleOperation, $TypeProgramme, $direction, $Commune, $DateInscription, $DelaiResiliation, $APInitial, $CarnetCharge, $AppelOffres, $OuverturePlis, $EvaluationOffres, $publication, $PourcentageProjet, $commentaire, $APFinalActuel, $Montant, $Date_Date);

$response = array();

if ($stmt->execute()) {
    $last_id = $conn->insert_id;

    // Handle image uploads
    if(isset($_FILES['images'])) {
        $errors = array();

        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            $image = $_FILES['images']['name'][$key];
            $tmp = $_FILES['images']['tmp_name'][$key];

            $image_data = file_get_contents($tmp);
            $image_data = mysqli_real_escape_string($conn, $image_data);

            $sql_image = "INSERT INTO Images_Marche (id_Marche, Image) VALUES (?, ?)";
            $stmt_image = $conn->prepare($sql_image);

            if ($stmt_image) {
                $stmt_image->bind_param("is", $last_id, $image_data);
                $stmt_image->execute();
            } else {
                $errors[] = "Error preparing image SQL: " . $conn->error;
            }
        }

        if (!empty($errors)) {
            $response['status'] = 'error';
            $response['message'] = implode(", ", $errors);
        } else {
            $response['status'] = 'success';
            $response['message'] = 'New record created successfully';
        }
    } else {
        $response['status'] = 'success';
        $response['message'] = 'New record created successfully';
    }
} else {
    http_response_code(500);
    $response['status'] = 'error';
    $response['message'] = 'Error executing SQL: ' . $stmt->error;
}

echo json_encode($response);

$stmt->close();
$conn->close();
?>

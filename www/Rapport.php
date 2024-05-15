<?php
// Database connection parameters
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$Numero_Operation = $_POST['Numero_Operation'];
$Intitule_Operation = $_POST['Intitule_Operation'];
// ... (repeat for other fields)

// Insert data into database
$sql = "INSERT INTO Marche (Numero_Operation, Intitule_Operation, ...) 
        VALUES ('$Numero_Operation', '$Intitule_Operation', ...)";  // Add other fields here

$response = array();

if ($conn->query($sql) === TRUE) {
    $response['status'] = 'success';
    $response['message'] = 'New record created successfully';
} else {
    $response['status'] = 'error';
    $response['message'] = 'Error: ' . $sql . '<br>' . $conn->error;
}

echo json_encode($response);

$conn->close();
?>
<?php
// Database connection parameters
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$Numero_Operation = $_POST['Numero_Operation'];
$Intitule_Operation = $_POST['Intitule_Operation'];
// ... (repeat for other fields)

// Insert data into database
$sql = "INSERT INTO Marche (Numero_Operation, Intitule_Operation, ...) 
        VALUES ('$Numero_Operation', '$Intitule_Operation', ...)";  // Add other fields here

$response = array();

if ($conn->query($sql) === TRUE) {
    $response['status'] = 'success';
    $response['message'] = 'New record created successfully';
} else {
    $response['status'] = 'error';
    $response['message'] = 'Error: ' . $sql . '<br>' . $conn->error;
}

echo json_encode($response);

$conn->close();
?>

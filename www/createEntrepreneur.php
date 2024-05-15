<?php
// Check if the form data is received via POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $dateDeNaissance = $_POST['dateDeNaissance'];
    $wilaya = $_POST['wilaya'];
    $etatCivil = $_POST['etatCivile'];
    $genre = $_POST['genre'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];

    // Handle file upload for CV
    $cvFile = $_FILES['cv'];
    $firstQuestion = $_POST['firstQuestion'];
    $secondQuestion = $_POST['secondQuestion'];

    include 'db_connection.php';

    // Validate the form data (optional)

    // Process the data further (e.g., store it in the database)
    // You can perform database operations or any other processing here

    // Example: Insert data into the database
    // $conn is assumed to be your database connection
    $sql = "INSERT INTO entrepreneur (nom, prenom, date_de_naissance, wilaya, etat_civil, genre, email, telephone, cv_pdf, firstQuestion, secondQuestion) VALUES (?,?,?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssss", $nom, $prenom, $dateDeNaissance, $wilaya, $etatCivil, $genre, $email, $telephone, $cvFile, $firstQuestion, $secondQuestion);
    $stmt->execute();

    // Optionally, you can redirect the user to a success page
    header("Location: success.php");
    exit;
} else {
    // Handle invalid request method
    // Redirect to an error page or display an error message
    header("Location: error.php");
    exit;
}
?>


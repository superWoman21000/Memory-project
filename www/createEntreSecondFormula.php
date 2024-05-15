<?php
// Check if the form data is received via POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $nom = $_POST['email'];
    $prenom = $_POST['telephone'];
    
 
    // Perform any necessary validation on the data

    // Connect to the MySQL database

    include 'db_connection.php';
  

    // Prepare the SQL statement to insert data into the database
    $sql = "INSERT INTO entrepreneur (email, telephone) 
            VALUES (?, ?)";
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("sss", $email, $telephone, $cv);

    // Execute the statement
    if ($stmt->execute()) {
        // Data inserted successfully
        echo "Données insérées avec succès dans la base de données.";
    } else {
        // Error inserting data
        echo "Erreur lors de l'insertion des données dans la base de données: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    // Handle invalid request method
    echo "Méthode de requête invalide.";
}
?>

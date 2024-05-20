<?php
class Annonce {
    public $titre;
    public $description;
    public $duree;
    private $conn;
    private $conflict_attribute;

    // Constructor to initialize the database connection
    public function __construct() {
        $host = 'mysql-db';
        $user = 'root';
        $pass = 'password';
        $db = 'projet-memoire-test';
        
        // Create connection
        $this->conn = new mysqli($host, $user, $pass, $db);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
    
    public function getData() {
        $sql = "SELECT * FROM Annonce ORDER BY id DESC LIMIT 1";

        // Execute the query
        $result = $this->conn->query($sql);

        // Check if the query was successful
        if ($result) {
            // Fetch the data
            $data = $result->fetch_assoc();
            
            // Return the fetched data
            return json_encode($data);
        } else {
            // If the query failed, return false or handle the error
            return "Error: " . $this->conn->error;
        }
    }

    
    // Method to insert Annonce data into the database
    public function createAnnonce() {
        // Prepare SQL statement
        $sql = "INSERT INTO Annonce (titre, description, duree) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);

        // Bind parameters
        $stmt->bind_param("sss", $this->titre, $this->description, $this->duree);

        // Execute the statement
        if ($stmt->execute()) {
            return true; // Insert successful
        } else {
            return false; // Insert failed
        }

    }
    public function deleteAnnonce($titre) {
        // Prepare SQL statement
        $sql = "DELETE FROM Annonce WHERE titre = ?";
        $stmt = $this->conn->prepare($sql);
    
        // Bind parameter
        $stmt->bind_param("s", $titre);
    
        // Execute the statement
        if ($stmt->execute()) {
            return true; // Deletion successful
        } else {
            return false; // Deletion failed
        }
    }
    public function searchAnnonce($titre) {
        // Prepare SQL statement
        $sql = "SELECT titre, description, duree FROM Annonce WHERE titre = ?";
        $stmt = $this->conn->prepare($sql);
        
        // Bind parameter
        $stmt->bind_param("s", $titre);
        
        // Execute the statement
        if ($stmt->execute()) {
            // Get result
            $result = $stmt->get_result();
    
            // Fetch data
            $annonce = $result->fetch_assoc();
    
            // Return the announcement data
            return $annonce;
        } else {
            return false; // Search failed
        }
    }
    
    
    

    // Destructor to close the database connection
    public function __destruct() {
        // Close connection
        $this->conn->close();
    }
}



// Only include createAnnonce.php and deleteAnnonce.php when needed
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['titre']) && !empty($_POST['titre'])) {
        include "createAnnonce.php"; // Include createAnnonce.php if adding an announcement
    } else if (isset($_POST['title']) && !empty($_POST['title'])) {
        include "deleteAnnonce.php"; // Include deleteAnnonce.php if deleting an announcement
    }
    else if (isset($_POST['titleSearch']) && !empty($_POST['titleSearch'])) {
        include "searchAnnonce.php"; // Include deleteAnnonce.php if deleting an announcement
    }
}else if ($_SERVER["REQUEST_METHOD"] == "GET") {
    include "displayAnnonce.php"; // Include displayAnnonce.php if the request method is GET
}

?>     

       




   
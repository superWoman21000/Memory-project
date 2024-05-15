<?php
class Entrepreneur {
    public $nom;
    public $prenom;
    public $dateDeNaissance;
    public $email;
    public $telephone;
    public $wilaya;
    public $etatCivil;
    public $cv;
    private $conn;

    // Constructor to initialize the database connection
    public function __construct() {
        $host = 'mysql-db';
        $user = 'root';
        $pass = 'password';
        $db = 'projet-memoire';
        
        // Create connection
        $this->conn = new mysqli($host, $user, $pass, $db);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
    
    // public function getData() {
    //     $sql = "SELECT * FROM Annonce ORDER BY id DESC LIMIT 1";

    //     // Execute the query
    //     $result = $this->conn->query($sql);

    //     // Check if the query was successful
    //     if ($result) {
    //         // Fetch the data
    //         $data = $result->fetch_assoc();
            
    //         // Return the fetched data
    //         return json_encode($data);
    //     } else {
    //         // If the query failed, return false or handle the error
    //         return "Error: " . $this->conn->error;
    //     }
    // }

    public function addEntrepreneur() {
        // Prepare SQL statement
        $sql = "INSERT INTO entrepreneur (nom, prenom, date_de_naissance, wilaya, etat_civil, genre) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);

        // Bind parameters
        $stmt->bind_param("sssss", $this->nom, $this->prenom, $this->date_de_naissance, $this->wilaya, $this->etat_civil, $this->genre);

        // Execute the statement
        if ($stmt->execute()) {
            return true; // Insert successful
        } else {
            return false; // Insert failed
        }

    }
   

    // Destructor to close the database connection
    public function __destruct() {
        // Close connection
        $this->conn->close();
    }
}


// // Only include createAnnonce.php and deleteAnnonce.php when needed
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     if (isset($_POST['titre']) && !empty($_POST['titre'])) {
//         include "createAnnonce.php";
//     } else if (isset($_POST['title']) && !empty($_POST['title'])) {
//         include "deleteAnnonce.php";
//     }
//     else if (isset($_POST['titleSearch']) && !empty($_POST['titleSearch'])) {
//         include "searchAnnonce.php"; 
//     }
// }else if ($_SERVER["REQUEST_METHOD"] == "GET") {
//     include "displayAnnonce.php";
// }

?>     

       




   
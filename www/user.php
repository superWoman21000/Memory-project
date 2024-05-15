<?php
class User {
    public $conn;
    public $id;
    public $username;
    public $password; // Note: Storing password hash, not plaintext
    public $interface;
    public function __construct($conn) {
        $this->conn = $conn;
        $this->id = null; // Initialize to null
        $this->username = null; // Initialize to null
        $this->password = null; // Initialize to null
        $this->interface = null; // Initialize to null
    }
     public function authenticate($username, $password) {
        $sql = "SELECT id, username, password, interface FROM users WHERE username = ?";
        // Prepare SQL statement
        $stmt = $this->conn->prepare($sql);
        if (!$stmt) {
            error_log("Failed to prepare SQL statement", 3, "error_log.txt");
            throw new Exception("Failed to prepare SQL statement");
        }

        // Bind parameters and execute query
        $stmt->bind_param("s", $username);
        if (!$stmt->execute()) {
            error_log("Failed to execute SQL statement", 3, "error_log.txt");
            throw new Exception("Failed to execute SQL statement");
        }

        // Get result
        $result = $stmt->get_result();
        // Fetch user data
        $user = $result->fetch_assoc();

        // Output the user data for debugging
        // echo "<pre>";
        // print_r($user);
        // echo "</pre>";
        
        // $hash = password_hash($password, PASSWORD_DEFAULT);
                 

        // echo "$password";

        //  echo "<pre>";
        //  print_r($user['password']);
        //  echo "</pre>";

         $hash = password_hash($user['password'], PASSWORD_DEFAULT);

        // // Verify password
         if ($result->num_rows == 1 && password_verify($password, $hash)) {
        //     // Authentication successful
            $this->id = $user['id'];
             $this->username = $user['username'];
             $this->interface = $user['interface'];
             return true;
         }

}
    public function getInterface() {
        return $this->interface;
    }
}
?>
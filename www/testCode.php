<?php
// Assuming your database connection code is in a separate file
include 'db_connection.php';

// Perform a query to retrieve data from the Annonce table
$sql = "SELECT * FROM Annonce";
$result = mysqli_query($conn, $sql);

// Check if there are any rows returned
if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        // Output each row as a <div> element inside the annonce-container
        echo '<div class="annonce-item">';
        echo '<h2>' . $row['titre'] . '</h2>';
        echo '<p>' . $row['description'] . '</p>';
        //echo '<h3>Dernier délai <br>' . $row['duree'] . '</h3>';
        echo '<h3>Dernier délai <br> </h3>'. '<span>'. $row['duree'] .'</span>';
        // Create a button with onclick event to redirect to another page
        echo '<button onclick="redirectToAnotherPage()">Postuler</button>';
        echo '</div>';
        
    }
} else {
    echo "0 results";
}

// Close the database connection
mysqli_close($conn);
?>


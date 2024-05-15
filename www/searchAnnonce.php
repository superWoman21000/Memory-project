<?php
// Search for the announcement
$annonce = new Annonce;
$titleToSearch = $_POST['titleSearch'];

// Search for the announcement using the provided title
$searchedAnnonce = $annonce->searchAnnonce($titleToSearch);

if (is_array($searchedAnnonce)) {
    echo '<script>alert("Announcement found.");</script>';
    // Display the announcement
    $titre = $searchedAnnonce['titre'];
    $description = $searchedAnnonce['description'];
    $duree = $searchedAnnonce['duree'];
    
    // Display the information in text fields
    echo '<label for="titre">Titre:</label>';
    echo "<input type='text' id='titre' name='titre' value='$titre'><br>";
    
    echo '<label for="description">Description:</label>';
    echo "<input type='text' id='description' name='description' value='$description'><br>";
    
    echo '<label for="duree">Durée:</label>';
    echo "<input type='text' id='duree' name='duree' value='$duree'><br>";
    
    // Button for modifying the announcement
    echo "<button id='modifyButton'>Modify</button>";
} else {
    echo '<script>alert("Announcement not found.");</script>';
}
?>

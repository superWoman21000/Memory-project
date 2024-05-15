
<?php
// Create instance of Annonce class
$annonce = new Annonce();
$annonce->titre = $_POST['titre'];
$annonce->description = $_POST['description'];
$annonce->duree = $_POST['duree'];
// Set properties from form data

// Insert data into the database
if ($annonce->createAnnonce()) {
   
    echo '<script>';
    echo 'alert("Annonce created successfully.");';
    echo 'window.location.href = "annoncePage.php";'; 
    echo '</script>';
} else {
    echo '<script>alert("Error creating Annonce.");</script>';
}

?>
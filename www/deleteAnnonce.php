<?php
$annonce = new Annonce();
$titreToDelete = $_POST['title'];

// Call the deleteAnnonce method on the $annonce instance
if ($annonce->deleteAnnonce($titreToDelete)) {
    

    echo '<script>';
    echo 'alert("Annonce deleted successfully.");';
    echo 'window.location.href = "annoncePage.php";'; 
    echo '</script>';
} else {
    echo '<script>alert("Error deleting Annonce.");</script>';
}
?>

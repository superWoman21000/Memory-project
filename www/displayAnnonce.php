<?php
$annonce = new Annonce();
// Retrieve the data from the query parameter
$data = isset($_GET['titre']) ? $_GET['description'] : '';

// Display the fetched data in the desired location
echo '<div id="annonce-container">' . $data . '</div>';
//to display data

echo $annonce->getData();
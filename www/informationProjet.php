<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleInformationProjet.css">
    <link rel="stylesheet" href="css/styleNav.css">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">

</head>
<body>
<?php
   include 'navbar.php' ;
   ?>
   <form action="NouveauTravail.php" class="forumulaire" method="POST">
    <h1>L'information de projet </h1>
    <div class="forumulaire_1">
        <label>Nom_projet :</label>
        <input type="text">
    </div>
    
    <div class="forumulaire_2">
        <label>Lieu :</label>
        <input type="text">
    </div>
    <div class="forumulaire_3">
        <label>data initial :</label>
        <input type="date">
    </div>
    <div class="forumulaire_4">
        <label>Prourcentage de projet:</label>
        <input type="number"  min="0" max="100">
    </div>
    <div class="forumulaire_5">
        <label>Nom_entrepreneur :</label>
        <input type="text">
    </div>
    <div class="forumulaire_7">
        <label> Nom_Bureau_Etude :</label>
        <input type="text">
    </div>
    <div class="forumulaire_6">
        <label for="">Marche :</label>
        <input type="file" class="fileInput" style="display: none;" multiple accept=".pdf, .doc, .docx">
        <a href="MARCHE-DAL-WILAYA.pdf"  class="button">Afficher Marche</a>
    </div>
 
    <button type="submit" class="btn btn-primary btn-lg" formaction="NouveauTravail.php">Ajouter un travail</button>
 
   </form>
   <script src="js/bootstrap.js"></script>
</body>
</html>
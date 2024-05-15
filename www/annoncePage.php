<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annonce Page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="css/styleAnnonce.css">
</head>
<body>
    <?php include 'navbar.php';?>
    <div class="main-page">
        <h1>Appels d'offres Skikda</h1>
       <div class="additionnal-information">
        <span>N° Telephone <a href="">038 75 39 29</a></span>
        <span>Email <a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox?compose=jrjtXGjZjbZBZNFBcKnmPngVRHSbTtCxwWSlPhqFGdsfWcGlFszrmSbFrBTqLMXHZRfjwzdH">upw.skikda@poste.dz</a></span>
        <span>Adresse <a href="">18 AVENUE ZEGHOUD YOUCEF COMMUNE DE SKIKDA WILAYA DE SKIKDA</a></span>
       </div>
       <div class="search-bar">
          <input type="search" name="search" id="search" placeholder="Taper votre rechereche">
          <span class="material-symbols-outlined">search</span>
       </div>
       <div id="annonce-container">
       
       </div>

    </div>

    <script src="js/annonce.js"></script>
</body>
</html>
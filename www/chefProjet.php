<?php
session_start(); // Start the session

// Set the session variable if it's not already set
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleNav.css">
    <link rel="stylesheet" href="css/styleChefPro.css">
    <link rel="icon" type="image/x-icon" href="data:;base64,iVBORw0KGgo=">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Document</title>
</head>
<body>
<?php
    include 'navbar.php';
    ?>
     <section class="right-zone">
     <div class="search-container">
    <input type="text" id="searchInput" class="search-input" placeholder="Entrez votre recherche...">
    <ul id="suggestionsList" class="suggestions-list"></ul>
    <button class="search-button">Rechercher</button>
</div>

     </section>
<!-- Modal -->
<div class="modal fade" id="projectModal" tabindex="-1" role="dialog" aria-labelledby="projectModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="projectModalLabel">Project Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h2 id="modalProjectName"></h2>
        <div class="buttons">
        <button id="clearButton" class="btn btn-primary" data-projectId="<?php echo $projectId; ?>">Supprimer</button>
            <button class="btn btn-secondary">Modifier</button>
            <button class="btn btn-success">Affiche</button>
        </div>
      </div>
    </div>
  </div>
</div>

     <aside>
    <img src="carte_skikda.jpg" alt="">
    <details>
        <summary class="choix">Les entrepreneurs</summary>
        <select id="entrepreneurSummary"></select>
    </details>
    <details>
        <summary class="choix">Les projets</summary>
        <select id="projetSummary"></select>
    </details>
    <details>
        <summary class="choix">Les_bureau_etude</summary>
        <select id="bureau_etudeSummary"></select>
    </details>
    <div class="text-center mt-4">
        <a href="ajouterProjet.php" class="btn btn-primary" id="addProjetButton">
            Add Projet
        </a>
    </div>
</aside>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="js/chefServiceOption.js"></script> <!-- Include chefServiceOption.js first -->
<script>
    // Check if projectLeaderID is set in the session
    var projectLeaderID = <?php echo isset($_SESSION['project_leader_id']) ? $_SESSION['project_leader_id'] : 'null'; ?>;
</script>
<script src="js/bootstrap.js"></script>
 

</body>
</html>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styleNav.css">
    <link rel="stylesheet" href="css/styleBureauEtude.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
       $(document).ready(function() {
    // Send AJAX request to get options from the PHP file
    $.ajax({
        url: 'get_optionsBE.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            // Populate entrepreneur options in the HTML
            var entrepreneurOptionsHTML = '';
            $.each(data.entrepreneurs, function(index, value) {
                entrepreneurOptionsHTML += '<option>' + value + '</option>';
            });
            $('#entrepreneurSummary').html(entrepreneurOptionsHTML);

            // Populate projet options in the HTML
            var projetOptionsHTML = '';
            $.each(data.projets, function(index, value) {
                projetOptionsHTML += '<option>' + value + '</option>';
            });
            $('#projetSummary').html(projetOptionsHTML);
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
});

    </script>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <section class="right-zone">
        <div>
            <input type="text" class="search-input" placeholder="Entrez votre recherche...">
            <button class="search-button">Rechercher</button>
        </div>
    </section>
    <aside>
    <div class="date-time">
        Date: <span id="currentDate"></span><br>
        Time: <span id="currentTime"></span>
    </div>
    <img src="carte_skikda.jpg" alt="">
    <details>
        <summary class="choix">Les entrepreneurs</summary>
        <select id="entrepreneurSummary"></select>
    </details>
    <details>
        <summary class="choix">Les projets</summary>
        <select id="projetSummary"></select>
    </details>
    
    <div class="text-center mt-4">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProjetModal" id="addRapport">
            Add Rapport
        </button>
    </div>
</aside>
<script>
        // Insert current date and time
        function insertDateTime() {
            var currentDate = new Date();
            
            // Format date as dd/mm/yyyy
            var day = String(currentDate.getDate()).padStart(2, '0');
            var month = String(currentDate.getMonth() + 1).padStart(2, '0'); // Months are 0-based
            var year = currentDate.getFullYear();
            
            var formattedDate = day + '/' + month + '/' + year;

            var currentTime = currentDate.toLocaleTimeString('en-US');
            
            document.getElementById('currentDate').innerText = formattedDate;
            document.getElementById('currentTime').innerText = currentTime;
        }

        // Call the function to insert date and time
        insertDateTime();

        // Event listener for Add Projet button
        $('#addRapport').click(function() {
            window.location.href = 'NouveauTravail.php';
        });
  
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="css/BEOption.js"></script> <!-- Include chefServiceOption.js first -->
    <script>
        // Check if BureauEtudeID is set in the session
        var BureauEtudeID = <?php echo isset($_SESSION['BureauEtude_id']) ? $_SESSION['BureauEtude_id'] : 'null'; ?>;
        if (BureauEtudeID !== null) {
            fetchRelationships(BureauEtudeID); // Call fetchRelationships function
        }
    </script>
   
    <script src="js/bootstrap.js"></script>
</body>
</html>

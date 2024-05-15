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
    include 'navbar.php';
?>
<form class="forumulaire" method="POST">
    <h1>L'information de projet </h1>
    <div class="forumulaire_1">
        <label for="nomProjet">Nom_projet :</label>
        <input type="text" id="nomProjet" name="nomProjet">
    </div>
    
    <div class="forumulaire_2">
        <label for="lieu">Lieu :</label>
        <input type="text" id="lieu" name="lieu">
    </div>
    <div class="forumulaire_3">
        <label for="dateInitial">Date initial :</label>
        <input type="date" id="dateInitial" name="dateInitial">
    </div>
    <div class="forumulaire_5">
        <label for="nomEntrepreneur">Nom_entrepreneur :</label>
        <input type="text" id="nomEntrepreneur" name="nomEntrepreneur">
    </div>
    <div class="forumulaire_7">
        <label for="nomBureauEtude">Nom_Bureau_Etude :</label>
        <input type="text" id="nomBureauEtude" name="nomBureauEtude">
    </div>
    
    <div class="text-center mt-4">
        <button type="button" class="btn btn-primary" id="addProjetButton">
            Add Projet
        </button>
    </div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script>
$(document).ready(function() {
    $('#addProjetButton').click(function() {
        // Get values from the form
        var nomProjet = $('#nomProjet').val();
        var lieu = $('#lieu').val();
        var dateInitial = $('#dateInitial').val();
        var nomEntrepreneur = $('#nomEntrepreneur').val();
        var nomBureauEtude = $('#nomBureauEtude').val();

        // Log all form values
        console.log('Form Data:', {
            nomProjet: nomProjet,
            lieu: lieu,
            dateInitial: dateInitial,
            nomEntrepreneur: nomEntrepreneur,
            nomBureauEtude: nomBureauEtude
        });

        $.ajax({
            url: 'insert_projet_info.php',
            type: 'POST',
            data: {
                nomProjet: nomProjet,
                lieu: lieu,
                dateInitial: dateInitial,
                nomEntrepreneur: nomEntrepreneur,
                nomBureauEtude: nomBureauEtude
            },
            dataType: 'json',
            success: function(response) {
                console.log('AJAX Success:', response);
                if(response.error) {
                    console.error('Server Error: ' + response.error);
                    alert('Error: ' + response.error);
                    return;
                }
                // Redirect to rapport.php after successfully adding the project
                alert('Project added successfully.');
                
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', xhr.responseText);
                alert('Error: ' + xhr.responseText);
            }
        });
    });
});
</script>

</body>
</html>

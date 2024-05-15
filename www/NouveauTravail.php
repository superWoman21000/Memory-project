<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleNav.css">
    <link rel="stylesheet" href="css/StyleNouveauTravail.css">
    <title>Document</title>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <section>
        <div>
            Rapport
        </div>
    </section>
    <main>
        <form id="travailForm" enctype="multipart/form-data">
            <div>
                <input type="file" name="images[]" multiple>
                <button id="uploadButton" class="button">Choisir des images <span class="important">*</span></button>
            </div>
            <div>
                <label class="contenu" for="Numero_Operation">Numero D'opiration: <span class="important">*</span></label>
                <input type="number" name="Numero_Operation" id="Numero_Operation" min="0" max="100" class="input1">
            </div>
            <div>
                <label class="contenu" for="Intitule_Operation">Lntituté De l'opiration: <span class="important">*</span></label>
                <input type="text" name="Intitule_Operation" id="Intitule_Operation" min="0" max="100" class="input2">
            </div>
            <div>
                <label class="contenu" for="Type_Programme">Type de programme: <span class="important">*</span></label>
                <input type="text" name="Type_Programme" id="Type_Programme" min="0" max="100" class="input1">
            </div>
            <div>
                <label for="directionSelect" class="contenu">Direction :</label>
                <select id="directionSelect" name="Direction" class="select1">
                <option value="Direction_des_services_Sociaux">Direction des services Sociaux</option>
                    <option value="Direction_des_services_agricoles">Direction des services agricoles</option>
                    <option value="Direction_des_services_Culturels">Direction des services Culturels</option>
                    <option value="Direction_des_services_Economique">Direction des services Economique</option>
                    <option value="Direction_des_services_Financiers">Direction des services Financiers</option>
                    <option value="Direction_des_services_Sante">Direction des services Sante</option>
                    <option value="Direction_des_services_educatifs">Direction des services educatifs</option>
                    <option value="Direction_des_services_logistiques">Direction des services logistiques</option>
                    <option value="Direction_des_services_touristiques">Direction des services touristiques</option>
                    <option value="Direction_des_services_divertissement">Direction des services divertissement</option>
                </select>
            </div>
            <div>
                <label class="contenu" for="Commune">Commune: <span class="important">*</span></label>
                <input type="text" name="Commune" id="Commune" min="0" max="100" class="input4">
            </div>
            <div>
                <label class="contenu" for="Date_Inscription">date d'inscription: <span class="important">*</span></label>
                <input type="date" name="Date_Inscription" id="Date_Inscription" min="0" max="100" class="input5">
            </div>
            <div>
                <label class="contenu" for="Delai_Resiliation">délai de résiliation: <span class="important">*</span></label>
                <input type="date" name="Delai_Resiliation" id="Delai_Resiliation" min="0" class="input6">
            </div>
            <div>
                <label class="contenu" for="AP_Initial">AP initial: <span class="important">*</span></label>
                <input type="number" name="AP_Initial" id="AP_Initial" min="0"  class="input4">DZ
            </div>
            <h2 class="Stuation">Stuation Physique</h2>
            <div>
                <label class="contenu" for="Carnet_Charge">carnet de charge: <span class="important">*</span></label>
                <select id="Carnet_Charge" name="Carnet_Charge" class="select2">
                    <option value="option1">oui</option>
                    <option value="option2">non</option>
                </select>
            </div>
            <div>
                <label class="contenu" for="Appel_Offres">appel d'offres: <span class="important">*</span></label>
                <select id="Appel_Offres" name="Appel_Offres" class="select3">
                    <option value="option1">oui</option>
                    <option value="option2">non</option>
                </select>
            </div>
            <div>
                <label class="contenu" for="Ouverture_Plis">ouverture de plis: <span class="important">*</span></label>
                <select id="Ouverture_Plis" name="Ouverture_Plis" class="select4">
                    <option value="option1">oui</option>
                    <option value="option2">non</option>
                </select>
            </div>
            <div>
                <label class="contenu" for="Evaluation_Offres">evaluation des offres: <span class="important">*</span></label>
                <select id="Evaluation_Offres" name="Evaluation_Offres" class="select5">
                    <option value="option1">oui</option>
                    <option value="option2">non</option>
                </select>
            </div>
            <div>
                <label class="contenu" for="Publication">Publication : <span class="important">*</span></label>
                <select id="Publication" name="Publication" class="select6">
                    <option value="option1">oui</option>
                    <option value="option2">non</option>
                </select>
            </div>
            <div>
            <div>
                <label class="contenu" for="Pourcentage_Projet">Pourcentage de projet: <span class="important">*</span></label>
                <input type="number" name="Pourcentage_Projet" id="Pourcentage_Projet" min="0" max="999.99" step="0.01" class="input8">
            </div>
            <div>
                <label class="contenu" for="Commentaire">Commentaire :</label>
                <input type="text" name="Commentaire" id="Commentaire" maxlength="100" minlength="0" class="enyoyee input9">
            </div>
            <h2 class="Stuation">situation financière: </h2>
            <div>
                <label class="contenu" for="AP_Final_Actuel">AP Final actuel: <span class="important">*</span></label>
                <input type="number" name="AP_Final_Actuel" id="AP_Final_Actuel" min="0" class="input10">DZ
            </div>
            <div>
                <label class="contenu" for="Montant">Montant: <span class="important">*</span></label>
                <input type="number" name="Montant" id="Montant" min="0" max="9999999.99" step="0.01" class="input4">
            </div>
            <div>
                <label class="contenu" for="Date_Date">Date: <span class="important">*</span></label>
                <input type="date" name="Date_Date" id="Date_Date" class="input12">
            </div>
            <button type="button" id="submitForm" class="envoyee">Envoyée le rapport</button>
        </form>
    </main>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
$(document).ready(function(){
    $('#submitForm').click(function() {
        // Get values from the form
        var NumeroOperation = $('#Numero_Operation').val();
        var IntituleOperation = $('#Intitule_Operation').val();
        var TypeProgramme = $('#Type_Programme').val();
        var direction = $('#directionSelect').val();
        var Commune = $('#Commune').val();
        var DateInscription = $('#Date_Inscription').val();
        var DelaiResiliation = $('#Delai_Resiliation').val();
        var APInitial = $('#AP_Initial').val();
        var CarnetCharge = $('#Carnet_Charge').val();
        var AppelOffres = $('#Appel_Offres').val();
        var OuverturePlis = $('#Ouverture_Plis').val();
        var EvaluationOffres = $('#Evaluation_Offres').val();
        var publication = $('#Publication').val();
        var PourcentageProjet = $('#Pourcentage_Projet').val();
        var commentaire = $('#Commentaire').val();
        var APFinalActuel = $('#AP_Final_Actuel').val();
        var Montant = $('#Montant').val();
        var Date_Date = $('#Date_Date').val();

        // Enum fields
        var enumFields = [CarnetCharge, AppelOffres, OuverturePlis, EvaluationOffres, publication];

        // Validation for Enum fields
        for (var i = 0; i < enumFields.length; i++) {
            if (enumFields[i] !== 'oui' && enumFields[i] !== 'non') {
                alert('Enum fields must be either "oui" or "non".');
                return;
            }
        }

        // Prepare data object
        var formData = {
            NumeroOperation: NumeroOperation,
            IntituleOperation: IntituleOperation,
            TypeProgramme: TypeProgramme,
            direction: direction,
            Commune: Commune,
            DateInscription: DateInscription,
            DelaiResiliation: DelaiResiliation,
            APInitial: APInitial,
            CarnetCharge: CarnetCharge,
            AppelOffres: AppelOffres,
            OuverturePlis: OuverturePlis,
            EvaluationOffres: EvaluationOffres,
            publication: publication,
            PourcentageProjet: PourcentageProjet,
            commentaire: commentaire,
            APFinalActuel: APFinalActuel,
            Montant: Montant,
            Date_Date: Date_Date
        };

        console.log('Form Data:', formData);

        $.ajax({
            url: 'save_travail.php',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response){
                console.log('AJAX Success:', response);
                if(response.error) {
                    console.error('Server Error: ' + response.error);
                    alert('Error adding project. Please try again.');
                    return;
                }
                // Redirect to rapport.php after successfully adding the project
                alert('Project added successfully.');
            },
            error: function(xhr, status, error){
                console.error('AJAX Error:', xhr.responseText);
                alert('Error adding project. Please try again.');
            }
        });
    });
});
</script>
    
</body>
</html>

document.addEventListener("DOMContentLoaded", function() {
    // Get the form and button
    const form = document.getElementById("postulerForm");
    const nextButton = document.getElementById("firstNextButton");

    document.getElementById("nom").addEventListener("input", function(event) {
        // Récupérer la valeur saisie dans le champ
        let input = event.target.value;
        // Remplacer tous les caractères non alphabétiques par une chaîne vide
        let alphabeticInput = input.replace(/[^a-zA-Z\s]/g, "");
        // Mettre à jour la valeur du champ avec seulement les lettres et espaces
        event.target.value = alphabeticInput;
    });
    document.getElementById("prenom").addEventListener("input", function(event) {
        // Récupérer la valeur saisie dans le champ
        let input = event.target.value;
        // Remplacer tous les caractères non alphabétiques par une chaîne vide
        let alphabeticInput = input.replace(/[^a-zA-Z\s]/g, "");
        // Mettre à jour la valeur du champ avec seulement les lettres et espaces
        event.target.value = alphabeticInput;
    });
    

    // Add event listener to the button
    nextButton.addEventListener("click", function(event) {
        // Prevent default form submission
        event.preventDefault();

        // Check if all fields are filled
        const formData = new FormData(form);

        const nom = document.getElementById("nom").value.trim();
        const prenom = document.getElementById("prenom").value.trim();
        const dateDeNaissance = document.getElementById("dateDeNaissance").value.trim();
        const selectedWilaya = document.getElementById("wilaya").value.trim();
        const selectedEtatCivile = document.getElementById("etatCivile").value.trim();
        const selectedgenre = document.getElementById("genre").value.trim();

        if (!nom || !prenom || !dateDeNaissance || !selectedWilaya || !selectedEtatCivile || !selectedgenre) {
            alert("Veuillez remplir tous les champs avant de passer à l'étape suivante.");
            return;
        }

        // If all fields are filled, display a message
        alert("Tous les champs sont remplis. Vous pouvez passer à l'étape suivante.");
        // Here you can navigate to the next step or perform any other action

        var content;
        content = `
        <h1>Postuler Pour Le Projet</h1>
        <form id="postulerForm" action="Entrepreneur.php" method="post">
            <div class="formulaire">
                <label for="">Adresse email</label>
                <input type="email" name="email" id="email">
            </div>
            <div class="formulaire">
                <label for="telephone">N° Telephone</label>
                <input type="text" name="telephone" id="telephone" maxlength="10" placeholder="XXXXXXXXXX" pattern="\d{10}" title="Please enter exactly 10 digits">
            </div>
            <div class="formulaire3">
                <label for="">CV (format PDF)</label>
                <input type="file" id="cvFile" name="cv" accept=".pdf">
            </div>
        </form>
        <div class="status">
            <button id="secondNextButton">suivant</button>
        </div>
        <style>
                    #contact{
                        background-color: #0966C2;
                        padding: 8px;
                        color: white;
                        width: 328px;
                        margin-left: -25px;
                    } 
                </style>
        
            `;
        document.getElementById('main_first_page').innerHTML = content;
        //it for fill it with just numbers
        document.getElementById("telephone").addEventListener("input", function(event) {
            let input = event.target.value;
            let numericInput = input.replace(/\D/g, "");
            event.target.value = numericInput;
        
            if (numericInput.length > 10) {
                event.target.value = numericInput.slice(0, 10);
            }
        });

        document.getElementById('secondNextButton').addEventListener("click", function(event){

            event.preventDefault();
            const email = document.getElementById("email").value.trim();
            const telephone = document.getElementById("telephone").value.trim();
            const cvFileInput = document.getElementById("cvFile");
            const cvFile = cvFileInput.files[0]; // This gets the first file selected in the input

            if (!email || !telephone || !cvFile) {
                alert("Veuillez remplir tous les champs avant de passer à l'étape suivante.");
                return;
            }
            if (telephone.length !== 10) {
                alert("Veuillez entrer un numéro de téléphone contenant exactement 10 chiffres.");
                return;
            }

            alert("Tous les champs sont remplis. Vous pouvez passer à l'étape suivante.");


             // Create a FormData object to store form data
           
           
             
            var content;
            content = `
                <h1>Postuler Pour Le Projet</h1>
                <form id="postulerForm" action="" method="post">
                    <div class="formulaireTextArea">
                        <label for="">Pourquoi vous êtes intéressé par ce projet ?</label>
                        <textarea name="firstQuestion" id="firstQuestion"></textarea>
                    </div>
                    <div class="formulaireTextArea">
                        <label for=""> Exprimez pourquoi vous êtes le bon entrepreneur pour ce projet ?</label>
                        <textarea name="secondQuestion" id="secondQuestion"></textarea>
                    </div>
                </form>
                <div class="status">
                    <button id="theirdNextButton">suivant</button>
                </div>
                <div class="statusRetour">
                <button id="RetourButton">Retour</button>
                </div>
                <style>
                    #additionalQuation{
                        background-color: #0966C2;
                        padding: 8px;
                        cursor: pointer;
                        color: white;
                        width: 328px;
                        margin-left: -25px;
                    }
                    #contact{
                        background-color: #0966C2;
                        padding: 8px;
                        color: white;
                        width: 328px;
                        margin-left: -25px;
                    } 
                </style>
                    `;
                document.getElementById('main_first_page').innerHTML = content;

                document.getElementById('theirdNextButton').addEventListener("click", function(event){

                    event.preventDefault();
                
                    const firstQuestion = document.getElementById("firstQuestion").value.trim();
                    const secondQuestion = document.getElementById("secondQuestion").value.trim();
                
                    if (!firstQuestion || !secondQuestion) {
                        alert("Veuillez remplir tous les champs avant de passer à l'étape suivante.");
                        return;
                    }
                
                    alert("Tous les champs sont remplis. Vous pouvez passer à l'étape suivante.");




                
                    // Get all the values filled by the user

                    const formData = new FormData();
                    formData.append("nom", nom);
                    formData.append("prenom", prenom);
                    formData.append("dateDeNaissance", dateDeNaissance);
                    formData.append("wilaya", selectedWilaya);
                    formData.append("etatCivile", selectedEtatCivile);
                    formData.append("genre", selectedgenre);
                    formData.append("email", email);
                    formData.append("telephone", telephone);
                    formData.append("cv", cvFile);
                    formData.append("firstQuestion", firstQuestion);
                    formData.append("secondQuestion", secondQuestion);

                    fetch('createEntrepreneur.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => {
                        if (response.ok) {
                            alert("Données envoyées avec succès à la base de données.");

                            var content;
                            content = `
                                <h1>Examinez votre candidature</h1>  
                           ` ;
                        } else {
                            alert("Erreur lors de l'envoi des données à la base de données.");
                        }
                    })
                    .catch(error => {
                        console.error('Erreur:', error);
                        alert("Erreur lors de l'envoi des données à la base de données.");
                    });




                
                    // Construct the HTML content to display the filled information
                    var content;
                     content = `
                         <h1>Examinez votre candidature</h1>
                    //     <form id="editForm" action="" method="post">
                    //         <div class="formulaire1">
                    //             <label for="nom">Nom</label>
                    //             <input type="text" name="nom" id="nom" value="${nom}">
                    //         </div>
                    //         <div class="formulaire2">
                    //             <label for="prenom">Prénom</label>
                    //             <input type="text" name="prenom" id="prenom" value="${prenom}">
                    //         </div>
                    //         <div class="formulaire3">
                    //             <label for="dateDeNaissance">Date de Naissance</label>
                    //             <input type="date" name="dateDeNaissance" id="dateDeNaissance" value="${dateDeNaissance}">
                    //         </div>
                    //         <!-- Add more input fields and select dropdowns for other information here -->
                    //     </form>
                    //     <div class="status">
                    //         <button id="modifyButton">Modifier</button>
                    //         <button id="submitButton">Soumettre</button>
                    //     </div>
                    ` ;
                        
                    // document.getElementById('main_first_page').innerHTML = content;
                
                    // // Add event listener to the modify button
                    // document.getElementById("modifyButton").addEventListener("click", function(event) {
                    //     event.preventDefault();
                    //     // Display the form with filled information for editing
                    //     document.getElementById('main_first_page').innerHTML = content;
                    // });
                
                    // // Add event listener to the submit button
                    // document.getElementById("submitButton").addEventListener("click", function(event) {
                    //     event.preventDefault();
                    //     // Handle form submission here
                    // });
                });

        })

    });
});

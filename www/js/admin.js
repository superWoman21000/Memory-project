// Add event listener to the dropdown menu
document.getElementById('interfaceDropdown').addEventListener('change', function() {
    var selectedPage = this.value;

    if (selectedPage) {
        loadContent(selectedPage);
    } else {
        document.getElementById('contentContainer').innerHTML = '';
    }
});

function loadContent(page) {
    var content;

    if (page === 'annonce') {
        content = `
            <h3>Gerer votre annonce</h3>
            <select id="oparationDropdown">
                <option value="">Operations</option>
                <option value="add-button">Ajouter</option>
                <option value="delete-button">Supprimer</option>
                <option value="search-button">Rechercher</option>
            </select>
        `;

    } else if (page === 'contact') {
        content = '<h2>Welcome to the Contact Page</h2><p>This is the content for the Contact Page.</p>';
    }

    document.getElementById('contentContainer').innerHTML = content;

    document.getElementById('oparationDropdown').addEventListener('change', function() {
        var selectedOperation = this.value;
        if (selectedOperation) {
            loadOperationContent(selectedOperation);
        } else {
            document.getElementById('contentContainer').innerHTML = '';
        }
    });
}

function loadOperationContent(operation) {
    var content;

    if (operation === 'add-button') {
        content = `
            <form id="addForm" action="annonceCRUD.php" method="post">
                <label for="titre">Titre</label>
                <input type="text" name="titre" id="titre">
                <label for="description">Description de l'annonce</label>
                <textarea name="description" id="description" rows="4" cols="50"></textarea><br>
                <label for="duree">Durée d'offre</label>
                <input type="date" name="duree" id="duree">
                <button type="submit">Ajouter annonce</button>
            </form>
        `;
    } else if (operation === 'delete-button') {
        content = `
            <form id="deleteForm" action="annonceCRUD.php" method="post">
                <label for="title">Titre de l'annonce à supprimer</label>
                <input type="text" name="title" id="title">
                <button type="submit">Supprimer annonce</button>
            </form>
        `;
    } else if (operation === 'search-button') {
        content = `
            <form id="searchForm" action="annonceCRUD.php" method="post">
                <label for="title">Titre de l'annonce à rechercher</label>
                <input type="text" name="titleSearch" id="titleSearch">
                <button type="submit" id="search-submit">Rechercher annonce</button>
            </form>
        `;
    }

    document.getElementById('contentContainer').innerHTML = content;
}





// search form submission listener for 'Update annonce' form
document.getElementById("searchForm").addEventListener('submit', function(event){
    event.preventDefault(); 

    var searchformData = new FormData(this);

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if (xhr.status == 200) {
                console.log(xhr.responseText);
                // Optionally update UI or display success message
            } else {
                console.error('Error:', xhr.statusText);
                // Optionally display error message to the user
            }
        }
    };
    xhr.open('POST', 'updateAnnonce.php', true);
    xhr.send(searchformData);
});

// Add form submission listener for 'Ajouter annonce' form
document.getElementById("addForm").addEventListener('submit', function(event){
    var content;
    event.preventDefault(); 

    var addformData = new FormData(this);

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if (xhr.status == 200) {
                console.log(xhr.responseText);
            } else {
                console.error('Error:', xhr.statusText);
                // Optionally display error message to the user
            }
        }
    };
    xhr.open('POST', 'createAnnonce.php', true);
    xhr.send(addformData);
});


// Add form submission listener for 'Supprimer annonce' form
 document.getElementById("deleteForm").addEventListener('submit', function(event){
     event.preventDefault();

     var titre = document.getElementById("title").value;
     var deleteformData = new FormData();
     deleteformData.append('titre', titre);

     var xhr = new XMLHttpRequest();
     xhr.onreadystatechange = function() {
         if (xhr.readyState == XMLHttpRequest.DONE) {
            if (xhr.status == 200) {
                 console.log(xhr.responseText);
                 // Optionally update UI or display success message
             } else {
                 console.error('Error:', xhr.statusText);
                 // Optionally display error message to the user
             }
         }
     };
     xhr.open('POST', 'annonceCRUD.php', true);
     xhr.send(deleteformData);
 });

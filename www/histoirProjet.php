<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleNav.css">
    <link rel="stylesheet" href="css/histoirProjetStyle.css">
    <title>Document</title>
</head>
<body>
<?php
    include 'navbar.php';
?>
<div class="select-container">
    <select name="" id="" class="select">
        <option value="">1</option>
        <option value="">2</option>
        <option value="">3</option>
        <option value="">4</option>
        <option value="">4</option>
        <option value="">6</option>
        <option value="">7</option>
        <option value="">8</option>
        <option value="">9</option>
        <option value="">10</option>
        <option value="">11</option>
        <option value="">12</option>
        <option value="">13</option>
        <option value="">14</option>
        <option value="">15</option>
    </select>
</div>



<main>
    <form action="POST"  action="NouveauTravail.php" class="forumulaire">
        <h2>Les image:</h2>
            <div>
                <input type="file" id="fileInput" style="display: none;" multiple>
                <button id="uploadButton"   class="button" > </button>
                <input type="file" id="fileInput" style="display: none;" multiple>
                <button id="uploadButton"   class="button">  </button>
                <input type="file" id="fileInput" style="display: none;" multiple>
                <button id="uploadButton"  class="button">  </button>
            </div>
            <h2>Rapport:</h2>
            <div>
                <label class="contenu">Numero D'opiration: <span class="important">*</span></label>
                <input type="number"  min="0" max="100" class="input1">
            </div>
            <div>
                <label class="contenu">Lntituté De l'opiration: <span class="important">*</span></label>
                <input type="text"  min="0" max="100" class="input2">
            </div>
            <div>
                <label class="contenu">Type de programme: <span class="important">*</span></label>
                <input type="text"  min="0" max="100" class="input3">
            </div>
            <div>
                <label for="selectOption" class="contenu">Direction :</label>
                <select id="selectOption" class="select1">
                    <option value="option1">Option 1</option>
                    <option value="option2">Option 2</option>
                    <option value="option3">Option 3</option>
                </select>
            </div>
            <div>
                <label class="contenu">Commane: <span class="important">*</span></label>
                <input type="text"  min="0" max="100" class="input4">
            </div>
            <div>
                <label class="contenu">date d'inscription: <span class="important">*</span></label>
                <input type="date"  min="0" max="100" class="input5">
            </div>
            <div>
                <label class="contenu">délai de résiliation: <span class="important">*</span></label>
                <input type="number"  min="0"class="input6">
            </div>
            <div>
                <label class="contenu">AP initial: <span class="important">*</span></label>
                <input type="number"  min="0" max="100" class="input7">
            </div>
            <h2 class="Stuation">Stuation Physique</h2>
            <div>
                <label class="contenu">carnet de charge: <span class="important">*</span></label>
                <select id="selectOption" class="select2">
                    <option value="option1">oui</option>
                    <option value="option2">no</option>
                </select>
            </div>
            <div>
                <label class="contenu"> appel d'offres: <span class="important">*</span></label>
                <select id="selectOption" class="select3">
                    <option value="option1">oui</option>
                    <option value="option2">no</option>
                </select>
            </div>
            <div>
                <label class="contenu">ouverture de plis: <span class="important">*</span></label>
                <select id="selectOption" class="select4">
                    <option value="option1">oui</option>
                    <option value="option2">no</option>
                </select>
            </div>
            <div>
                <label class="contenu">evaluation des offres: <span class="important">*</span></label>
                <select id="selectOption" class="select5">
                    <option value="option1">oui</option>
                    <option value="option2">no</option>
                </select>
                </div>
            <div>
                <label class="contenu">Publication : <span class="important">*</span></label>
                <select id="selectOption" class="select6">
                    <option value="option1">oui</option>
                    <option value="option2">no</option>
                </select>
            </div>
            <div>
                <label class="contenu">Prourcentage de projet: <span class="important">*</span></label>
                <input type="number"  min="0" max="100" class="input8">
            </div>
            <div>
                <label class="contenu">Commentaire :</label>
                <input type="text" maxlength="100" minlength="0" class="enyoyee input9">
            </div>
            <h2 class="Stuation">situation financière: </h2>
            <div>
                <label class="contenu">AP Final  actuel: <span class="important">*</span></label>
                <input type="number"  min="0" max="100" class="input10">
            </div>
            <div>
                <label class="contenu">Montant: <span class="important">*</span></label>
                <input type="number"  min="0" max="100" class="input11">
            </div>
            <div>
                <label class="contenu">Date: <span class="important">*</span></label>
                <input type="date" class="input12">
            </div>
            <br>
            <a href="MARCHE-DAL-WILAYA.pdf" class="affiche-marche">Afficher Marche</a>
            <br>
            <button class="return"  formaction="NouveauTravail.php">return</button>
        </form>

    </main>
</body>
</html>
</body>
</html>
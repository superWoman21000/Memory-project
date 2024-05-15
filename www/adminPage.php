<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styleAdmin.css">
    <link rel="stylesheet" href="css/postulerEntrepreneur.css">

    <link rel="stylesheet" href="css/styleAnnonce.css">
    
</head>
<body>
    <?php include 'navbar.php';?>
    <div class="main-page-admin">
        <div class="right-side">
            <h2>interface</h2>
            <select id="interfaceDropdown">
                <option value="">Pages</option>
                <option value="annonce">Annonce</option>
                <option value="contact">Contact</option>
                <option value="demande">Demande</option>
            </select>
        </div>
        <div id="contentContainer">
        </div>
        <!-- <div id="annonce-page-formula">
            <form id="contentContainer">
                <textarea id="announcementText" rows="4" cols="50"></textarea><br>
                <button type="submit">Ajouter annonce</button>
            </form> 
        </div> -->
    </div>

   

    <script src="js/admin.js"></script>
</body>
</html>
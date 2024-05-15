<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/styleNav.css">
    <link rel="stylesheet" href="css/styleHome.css">

    <title>Document</title>
</head>
<body>
    <header>
        <div>
            <?php
            include 'navbar.php' ;
            ?>
        </div>
        <div class="defintion">
            <p>Bienvenue sur notre page</p>
            <p>Une site web dédiée à la gestion des projets de construction au siège de le wilaya de Skikda</p>
        </div>
    </header>

    <main>
    <h2 class="Service">Nos Services</h2>
            <div class="card-container">
                 <div class="card">
                        <h5 class="title">
                            La demande:
                        </h5>
                        <p>
                        Notre site Internet permet aux entrepreneurs et bureaux d'études de déposer leurs offres pour participer à divers projets de wilaya.
                        </p>
                    </div>
            <div class="card">
                <h5 class="title">
                    Faciliter la gestion:
                </h5>
                    <p>
                        Faciliter le suivi de l'avancement du projet par le chef de projet et le chef de service.
                    </p>
                </div>
            <div class="card">
                <h5 class="title">transmission d'information:</h5>
                    <p>
                    Faciliter le transfert de fichiers entre le bureau d'études et le chef de projet.
                    </p>
                </div>
            </div>
            <h2 class="titre">Nos Projets</h2>
            <div class="card-img">
                <img src="img/hotel.jpg" class="card-img-top" alt="">
                <img src="img/HotelBateau.jpg" class="card-img-top" alt="">
                <img src="img/mercureHotle.jpeg" class="card-img-top"alt="">
                <img src="img/ecole1.jpg" class="card-img-top"alt="">
                <img src="img/ecole2.jpg" class="card-img-top" alt="">
                <img src="img/ecole3.jpg" class="card-img-top" alt="">
                <img src="img/img1.jpg" class="card-img-top" alt="">
                <img src="img/marina.jpg" class="card-img-top" alt="">
            </div>
            <h2 class="Contactez">Contactez-nous</h2>

    </main>
    <aside></aside>
    <footer id="footer">
        <div >
        <p class="footer">vous serez dirigé vers la page de connexion aprés cliqué sur la bouton</p>
        
        <a href="loginPage.php" class="footer-link"><button class="btn btn-primary btn-lg border border-1 rounded-pill">connecter</button></a>
         </div>
    </footer>

</body>
</html>

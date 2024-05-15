<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="icon" href="data:,">
</head>
<body>
    <div class="container">
        <div class="image_container">
            <div>
                <img src="login_image.png" alt="">
            </div>
            <div>
                <h2>Restez à jour avec <br> notre système</h2>
            </div>
        </div>
        <div class="login_container">
            <h1>Connexion</h1>
            <form id="loginForm">
                <div class="role_box">
                    <label for="role">Role</label>
                    <select name="role" id="role" required class="form-select" aria-label="Disabled select example">
                        <option value="chefProjet">Chef de Projet</option>
                        <option value="BureauEtude">Bureau d'Étude</option>
                        <option value="Admin">Administrateur</option>
                    </select>
                </div>
                <br>
                <div class="username_box">
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" name="username" id="username" autocomplete="username" required>
                </div>
                <div class="password_box">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" required> 
                </div>
                <div class="submit">
                    <input type="submit" value="Connexion" id="connexionButton">
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/scriptData.js"></script>
</body>
</html>

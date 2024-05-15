<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleNav.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Document</title>
</head>
<body>
    <?php
    include'navbar.php' ;
    ?>
    <section>
        <div>
            <label for="">name Projet:</label>
            <input type="text">
        </div>
        <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-primary">Left</button>
            <button type="button" class="btn btn-primary">Middle</button>
            <button type="button" class="btn btn-primary">Right</button>
        </div>
    </section>
    <script src="js/bootstrap.js"></script>
</body>
</html>
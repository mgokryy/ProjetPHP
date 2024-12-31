<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1>Qui veut gagner des MILLIONS?!</h1>
    
    <?php
    
    // Si l'utilisateur est connecté
    if (isset($_SESSION['username'])) {
        echo "<p>Bienvenue, " . $_SESSION['username'] . " ! <br>";

        echo "Vous pouvez <a href='index.php?page=jeu'>commencer à jouer</a> ou voir vos <a href='index.php?page=jeu_result'>résultats</a>.</p>";

    } else {
        // Si l'utilisateur n'est pas connecté
        echo "<p>Afin de gagner des millions, <a href='index.php?page=connexion'>connectez-vous</a>, ou <a href='index.php?page=inscription'>inscrivez-vous</a> </p>.";
    }
    ?>
</body>
</html>

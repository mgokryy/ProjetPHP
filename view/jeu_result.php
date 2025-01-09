<?php

if (!isset($_SESSION['score']) || !isset($_SESSION['currentQuestion'])) {
    header("Location: index.php?page=accueil");
    exit();
}

$score = $_SESSION['score'];
$totalQuestions = $_SESSION['currentQuestion'];

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultat du Jeu</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1>Résultat du Jeu</h1>

    <?php if ($score >= 1000000 ): ?>
        <h2>Félicitations ! 🎉</h2>
        <p>Vous avez remporté la partie avec un score de <strong><?php echo $score; ?></strong> fcfa!!</p>
    <?php else: ?>
        <h2>Dommage... 😞</h2>
        <p>Vous n'avez pas atteint le score requis pour gagner. Réessayez !</p>

    <?php endif; ?>
  
    <hr>
    <h3>Que voulez-vous faire maintenant ?</h3>
    <ul class="menu-list">
        <li><a href="index.php?page=choose_category">Rejouer</a></li>
        <li><a href="index.php?page=accueil">Retour à l'accueil</a></li>
        <li><a href="index.php?page=deconnexion">Déconnexion</a></li>
    </ul>
</body>
</html>

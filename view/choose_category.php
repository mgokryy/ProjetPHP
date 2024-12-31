<?php

if (!isset($_SESSION['username'])) {
    header("Location: index.php?page=connexion");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choisir une catégorie</title>
    <link rel="stylesheet" href="ProjetPHP/assets/css/style.css">
</head>
<body>
    <h1>Bienvenue, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
    <p>Veuillez choisir une catégorie pour commencer à jouer :</p>
    <form method="POST" action="index.php?page=start_game">
        <label for="category_id">Choisissez une catégorie :</label>
        <select name="category_id" id="category_id">
            <?php foreach ($categories as $category): ?>
                <option value="<?php echo $category['id_categorie']; ?>"><?php echo htmlspecialchars($category['name']); ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Commencer</button>
    </form>


</body>
</html>

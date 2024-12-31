<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1>Inscription</h1>
    <form method="POST" action="index.php?page=inscription_action">
        Nom d'utilisateur :<input type="text" id="username" name="username" required>
        <br>
        Mot de passe :<input type="password" id="password" name="password" required>
        <br>
        <button type="submit">S'inscrire</button>
    </form>
</body>
</html>

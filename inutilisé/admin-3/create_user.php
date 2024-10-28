
<?php
$users = [];

if (file_exists('users.json')) {
    $users = json_decode(file_get_contents('users.json'), true);
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $users[$username] = password_hash($password, PASSWORD_DEFAULT);

    file_put_contents('users.json', json_encode($users));
    echo "Utilisateur créé avec succès.";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Utilisateur</title>
</head>
<body>
    <form method="post" action="create_user.php">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Créer Utilisateur</button>
    </form>
</body>
</html>

<!--
3. create_user.php
Page pour créer de nouveaux utilisateurs avec des mots de passe hachés :
-->

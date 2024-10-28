<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soumettre un Avis</title>
</head>
<body>
    <h1>Soumettre un Avis</h1>
    <form action="./submit_avis.php" method="POST">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="message">Message:</label>
        <textarea id="message" name="message" required></textarea><br>

        <label for="note">Note (1-5):</label>
        <input type="number" id="note" name="note" min="1" max="5" required><br>

        <input type="submit" value="Soumettre">
    </form>
</body>
</html>
<?php
session_start();
$message = isset($_SESSION['message']) ? $_SESSION['message'] : 'Aucun message.';
unset($_SESSION['message']);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
        }
        .message {
            font-size: 20px;
            margin-bottom: 20px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            background-color: mediumorchid;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }
        .button:hover {
            background-color: rgb(211, 85, 163);
        }
    </style>
</head>
<body>
    <div class="message"><?php echo $message; ?></div>
    <a class="button" href="update_hours.php">Retour</a>
</body>
</html>
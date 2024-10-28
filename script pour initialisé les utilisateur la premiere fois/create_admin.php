
<!--------------------------------------------------------------------------------------------------------------------->
<!-- 3. Création du Premier Administrateur -->
<?php
require_once '../../../config-a/config.php';

$password = password_hash('MotDePasseAdmin2024!', PASSWORD_DEFAULT);//MotDePasseAdmin2024! //A9d@7Kb#zX3!qLm

try {
    $conn = get_db_connection();
    $stmt = $conn->prepare('INSERT INTO admins (username, password) VALUES (:username, :password)');
    $stmt->execute(['username' => 'admin', 'password' => $password]);
    echo "Administrateur ajouté avec succès.";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>

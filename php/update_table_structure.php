<?php
include 'db_connect_horaires.php';

function updateTableStructure($pdo) {
    // Vérifiez la structure actuelle de la table
    $result = $pdo->query("DESCRIBE horaires");
    $columns = $result->fetchAll(PDO::FETCH_COLUMN);

    // Structure attendue
    $expectedColumns = [
        'id' => 'INT',
        'jour' => 'VARCHAR(50)',
        'ouverture_matin' => 'TIME',
        'fermeture_matin' => 'TIME',
        'ouverture_apresmidi' => 'TIME',
        'fermeture_apresmidi' => 'TIME'
    ];

    // Comparez et modifiez si nécessaire
    foreach ($expectedColumns as $column => $type) {
        if (!in_array($column, $columns)) {
            // Ajoutez la colonne si elle est manquante
            $pdo->exec("ALTER TABLE horaires ADD COLUMN $column $type DEFAULT '00:00:00'");
        } else {
            // Modifiez la colonne si le type est incorrect
            $result = $pdo->query("SHOW COLUMNS FROM horaires LIKE '$column'");
            $columnInfo = $result->fetch(PDO::FETCH_ASSOC);
            if (strpos($columnInfo['Type'], $type) === false) {
                $pdo->exec("ALTER TABLE horaires MODIFY COLUMN $column $type DEFAULT '00:00:00'");
            }
        }
    }

    // Supprimez les colonnes supplémentaires
    foreach ($columns as $column) {
        if (!array_key_exists($column, $expectedColumns)) {
            $pdo->exec("ALTER TABLE horaires DROP COLUMN $column");
        }
    }
}

updateTableStructure($pdo);
?>
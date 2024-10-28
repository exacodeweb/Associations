<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ./admin_login.php");
    exit;
}

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comment_id = $_POST['comment_id'];
    $action = $_POST['action'];

    if ($action == 'approve') {
        $sql = "UPDATE comments SET approved=1 WHERE id='$comment_id'";
    } else if ($action == 'delete') {
        $sql = "DELETE FROM comments WHERE id='$comment_id'";
    }
    
    if ($conn->query($sql) === TRUE) {
        echo "Action réalisée avec succès";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

$sql = "SELECT id, comment, approved FROM comments";
$result = $conn->query($sql);
?>

<h2>Modération des Avis</h2>
<table>
    <tr>
        <th>Commentaire</th>
        <th>Action</th>
    </tr>
    <?php
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['comment'] . "</td>";
        echo "<td>";
        if ($row['approved'] == 0) {
            echo "<form method='post' action='moderate_comments.php'>";
            echo "<input type='hidden' name='comment_id' value='" . $row['id'] . "'>";
            echo "<button type='submit' name='action' value='approve'>Approuver</button>";
            echo "<button type='submit' name='action' value='delete'>Supprimer</button>";
            echo "</form>";
        } else {
            echo "Approuvé";
        }
        echo "</td>";
        echo "</tr>";
    }
    ?>
</table>
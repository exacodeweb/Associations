<?php
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          $ouverture = ($row["ouverture"] == "00:00:00" && $row["fermeture"] == "00:00:00") ? "Fermé" : $row["ouverture"];
          $fermeture = ($row["fermeture"] == "00:00:00" && $row["ouverture"] == "00:00:00") ? "Fermé" : $row["fermeture"];
          echo "<tr><td>" . $row["jour"]. "</td><td>" . $ouverture. "</td><td>" . $fermeture. "</td></tr>";
      }
  } else {
      echo "<tr><td colspan='3'>Aucun horaire trouvé</td></tr>";
  }
?>
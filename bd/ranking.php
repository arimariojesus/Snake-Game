<?php
  include_once './connect.php';

  $sql = $pdo->query("SELECT name, score FROM ranking ORDER BY score DESC LIMIT 3");

  echo "<table>";
  while($player = $sql->fetch(PDO::FETCH_ASSOC)) {
    echo "
      <tr>
        <td align='left'>{$player['name']}</td>
        <td align='right'>{$player['score']}</td>
      </tr>
    ";
  }
  echo "</table>";

?>
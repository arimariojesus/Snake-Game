<?php
  include_once "./connect.php";

  if(isset($_POST['score']) && isset($_POST['name']) && isset($_POST['ip'])){
    $score = $_POST['score'];
    $name = $_POST['name'];
    $ip = $_POST['ip'];

    try {
      $stmt = $pdo->prepare('UPDATE ranking SET score = :score WHERE ip = :ip AND name LIKE :name AND score <= :score');
      $stmt->execute(array(
        ':score' => $score,
        ':ip' => $ip,
        ':name' => $name
      ));
    } catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }

  }else {
    echo "no score";
  }

?>
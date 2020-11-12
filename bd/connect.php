<?php
  require_once('./dbconfig.php');

  try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  } catch (PDOException $e) {
    die("Não foi possível se conectar ao banco de dados $dbname " . $e->getMessage());
  }

?>
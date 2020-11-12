<?php
  include_once './connect.php';

  if(isset($_POST['name'])){
    $name = $_POST['name'];
    $ip = $_POST['ip'];
    $data = array('name' => $name, 'ip' => $ip);
    
    $consulta = $pdo->query("SELECT * FROM ranking WHERE ip = '$ip' AND name LIKE '$name';");
    $row = $consulta->fetchAll(PDO::FETCH_ASSOC);
    
    $rows = $consulta->rowCount();
    
    if($rows <= 0) {
      try {
        header('Content-Type: application/json');
        echo json_encode($data);
        $stmt = $pdo->prepare('INSERT INTO ranking (name, ip, score) VALUES(:name, :ip, 0)');
        $stmt->execute(array(
          ':name' => $name,
          ':ip' => $ip
        ));
      }catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
      }
    }
  }

?>
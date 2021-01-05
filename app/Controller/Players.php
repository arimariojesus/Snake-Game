<?php

class Players {
  private $modelPlayer;

  public function __construct()
  {
    require_once './app/Model/Player.php';
    $this->modelPlayer = new Player();
  }

  public function include() {
    $data = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    if(isset($data)) {
      $ip = filter_var($data['ip'], FILTER_VALIDATE_IP);
      $data = [
        'score' => intval($data['score']),
        'name' => trim($data['name']),
        'ip' => password_hash($ip, PASSWORD_DEFAULT),
      ];

      $this->modelPlayer->include($data);
    }
  }
}
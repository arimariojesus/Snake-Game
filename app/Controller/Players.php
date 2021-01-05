<?php

class Players {
  private $modelPlayer;

  public function __construct()
  {
    require_once './app/Model/Player.php';
    $this->modelPlayer = new Player();
  }

  public function include() {
    $player = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    if(isset($player)) {
      $ip = filter_var($player['ip'], FILTER_VALIDATE_IP);

      $data = [
        'name' => trim($player['name']),
        'ip' => password_hash($ip, PASSWORD_DEFAULT),
      ];

      $this->modelPlayer->include($data);
    }
  }

  public function updateScore() {
    $player = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    if(isset($player)) {
      $ip = filter_var($player['ip'], FILTER_VALIDATE_IP);

      $data = [
        'score' => intval($player['score']),
        'name' => trim($player['name']),
        'ip' => password_hash($ip, PASSWORD_DEFAULT),
      ];

      $this->modelPlayer->updateScore($data);
    }
  }
}
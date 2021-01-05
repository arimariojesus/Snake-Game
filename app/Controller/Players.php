<?php

class Players {
  private $modelPlayer;

  public function __construct()
  {
    require_once("./app/Model/Player.php");
    $this->modelPlayer = new Player();
  }

  // POST
  public function include($data = null) {

    if(isset($data)) {
      $ip = filter_var($data['ip'], FILTER_VALIDATE_IP);

      $data = [
        'name' => trim($data['name']),
        'ip' => password_hash($ip, PASSWORD_DEFAULT),
      ];

      $this->modelPlayer->include($data);
    }
  }

  // PUT
  public function updateScore($data = null) {

    if(isset($data)) {
      $ip = filter_var($data['ip'], FILTER_VALIDATE_IP);

      $data = [
        'score' => intval($data['score']),
        'name' => trim($data['name']),
        'ip' => password_hash($ip, PASSWORD_DEFAULT),
      ];

      $this->modelPlayer->updateScore($data);
    }
  }

  // GET
  public function getRanking() {
    return json_encode($this->getRanking());
  }
}
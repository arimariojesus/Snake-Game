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
        'ip' => md5($ip, PASSWORD_DEFAULT),
      ];

      return json_encode($this->modelPlayer->include($data));
    }else {
      return json_encode(["result" => "empty data"]);
    }
  }

  // PUT
  public function updateScore($data = null) {

    if(isset($data)) {
      $ip = filter_var($data['ip'], FILTER_VALIDATE_IP);

      $data = [
        'score' => intval($data['score']),
        'name' => trim($data['name']),
        'ip' => md5($ip),
      ];

      $this->modelPlayer->updateScore($data);
    }
  }

  // GET
  public function getRanking() {
    return json_encode($this->modelPlayer->getRanking());
  }
}
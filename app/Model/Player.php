<?php
require_once "../Controllers/Database.php";

class Player {
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function include($data) {
    header('Content-Type: application/json');

    if($this->verify($data)) {
      try {
        $this->db->query("INSERT INTO ranking (name, ip, score) VALUES(:name, :ip, 0)");
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':ip', $data['ip']);
        $this->db->exec();
        return true;
      }catch (PDOException $e) {
        echo 'Error!: ' . $e->getMessage();
      }
    }else {
      return false;
    }
  }

  public function verify($data) {
    $this->db->query("SELECT * FROM ranking WHERE ip = :ip AND name LIKE :name");
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':ip', $data['ip']);
    $this->db->exec();

    $rows = $this->db->countResults();

    if($rows <= 0) {
      return true;
    }else {
      return false;
    }
  }

  public function updateScore($data) {
    $this->db->query("UPDATE ranking SET score = :score WHERE ip = :ip AND name = :name");
    $this->db->bind(':score', $data['score']);
    $this->db->bind(':ip', $data['ip']);
    $this->db->bind(':name', $data['name']);
    
    if($this->db->exec()) {
      return true;
    }else {
      return false;
    }
  }

  public function getRanking() {
    $this->db->query("SELECT name, score FROM ranking ORDER BY score DESC LIMIT 3");
    return $this->db->results();
  }
}
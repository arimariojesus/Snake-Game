<?php

class Database {
  
  private $debug;
  private $connection;
  private $host;
  private $user;
  private $password;
  private $database;
  private $stmt;

  public function __construct()
  {
    $this->debug = true;
    $this->host = 'localhost';
    $this->user = 'root';
    $this->password = '';
    $this->database = 'snake';

    $dsn = 'mysql:host='.$this->host.';dbname='.$this->database;
    $options = [
      PDO::ATTR_PERSISTENT => true,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    try {
      $this->connection = new PDO($dsn, $this->user, $this->password, $options);

    }catch (PDOException $e) {
      echo "Error!: " . $e->getMessage() . "<br/>";
      die();
    }
  }

  public function query($sql) {
    $this->stmt = $this->connection->prepare($sql);
  }

  public function bind($param, $value, $type = null) {
    if(is_null($type)) {
      switch($value) {
        case is_int($value):
          $type = PDO::PARAM_INT;
        break;
        case is_bool($value):
          $type = PDO::PARAM_BOOL;
        break;
        case is_string($value):
          $type = PDO::PARAM_STR;
        break;
        default:
          $type = PDO::PARAM_NULL;
        break;
      }
    }

    $this->stmt->bindValue($param, $value, $type);
  }

  public function exec() {
    return $this->stmt->execute();
  }

  public function result() {
    $this->exec();
    return $this->stmt->fetch(PDO::FETCH_OBJ);
  }

  public function results() {
    $this->exec();
    return $this->stmt->fechAll(PDO::FETCH_OBJ);
  }

  public function countResults() {
    return $this->stmt->rowCount();
  }

}

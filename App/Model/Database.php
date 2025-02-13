<?php

namespace App\Model;

use mysqli;

use PDO;

class Database
{

  private string $host = 'localhost';
  private int $port = 3306;
  private string $database;

  private string $username;

  private string $password;

  public function __construct($host, $port, $database, $username, $password)
  {
    $this->host = $host;
    $this->port = $port;
    $this->database = $database;
    $this->username = $username;
    $this->password = $password;
  }


  public function getConnection(): PDO
  {
    $dns = "mysql:host={$this->host};dbname={$this->database};charset=utf8;port={$this->port};";
    return new PDO($dns, $this->username, $this->password);
  }


  // private $host;
  // private $dbname;
  // private $user;
  // private $password;
  // private $port;

  // private $mysqli;


  // public function __construct()
  // {
  //   $this->connect();
  // }


  // public function connect()
  // {
  //   $this->host = $_ENV['DB_HOST'];
  //   $this->dbname = $_ENV['DB_NAME'];
  //   $this->user = $_ENV['DB_USER'];
  //   $this->password = $_ENV['DB_PASSWORD'];
  //   $this->port = $_ENV['DB_PORT'];

  //   $this->mysqli = new mysqli($this->host,   $this->user, $this->password, $this->dbname);

  //   // Check connection
  //   if ($this->mysqli->connect_errno) {
  //     echo "Failed to connect to MySQL: " . $this->mysqli->connect_error;
  //     exit();
  //   }
  // }

  // public function getAll()
  // {

  //   $sql = "SELECT * FROM product";
  //   $result = $this->mysqli->query($sql);

  //   if (!$result) {
  //     echo "Query failed: " . $this->mysqli->error;
  //     return [];
  //   }
  //   return $result->fetch_all(MYSQLI_ASSOC);
  // }
}

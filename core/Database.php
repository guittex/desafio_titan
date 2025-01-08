<?php
namespace core;

use PDO;

class Database extends PDO
{
  private $DB_NAME = 'teste_titan';
  private $DB_USER = 'root';
  private $DB_PASSWORD = 'root';
  private $DB_HOST = '127.0.0.1';
  private $DB_PORT = 3306;

  private $conn;

  public function __construct()
  {
    $this->conn = new PDO("mysql:host=$this->DB_HOST;dbname=$this->DB_NAME", $this->DB_USER, $this->DB_PASSWORD);
  }

  /**
   * Método que executa uma query 
   *
   * @param string $query
   * @param array $parameters
   * @return array
   */
  public function executeQuery(string $query, array $parameters = [])
  {
    $stmt = $this->conn->prepare($query);

    $stmt->execute();

    return $stmt;
  }
}

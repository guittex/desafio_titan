<?php

namespace models;

use core\Database;
use PDO;

class User
{
  /**
   * Método que busca todos o usuários do banco de dados
   *
   * @return array
   */
  public static function findAll()
  {
    $conn = new Database();

    $result = $conn->executeQuery('SELECT * FROM tbl_usuario');

    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
   * Método que faz um consulta no banco de dados para ver se o usuário existe
   *
   * @param string $login
   * @param string $senha
   * @return array|null
   */
  public function autenticar($login, $senha)
  {
    $conn = new Database();

    $result = $conn->executeQuery("SELECT * FROM tbl_usuario WHERE login = '$login' and senha = '$senha' LIMIT 1");

    return $result->fetch(PDO::FETCH_ASSOC);
  }
}

<?php

namespace models;

use core\Database;
use PDO;

class Empresa
{
    /**
     * Método que executa o cadastro da empresa no banco de dados
     *
     * @param string $nome
     * @return true|false
     */
    public static function inserir($nome)
    {
        $conn = new Database();

        try {
            $result = $conn->executeQuery("INSERT INTO tbl_empresa (nome, created_at, updated_at) VALUES ('$nome', NOW(), NOW()) ");

            return true;
        } catch (\Throwable $th) {
            return false;

        }
    }

    /**
     * Método que busca as empresas cadastradas no banco de dados
     *
     * @return array|false
     */
    public static function findAll()
    {
        $conn = new Database();

        try {
            $result = $conn->executeQuery("SELECT * FROM tbl_empresa ORDER BY nome");

            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            return false;

        }
    }
}
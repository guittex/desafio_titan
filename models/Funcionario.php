<?php

namespace models;

use core\Database;
use PDO;

class Funcionario
{
    /**
     * Método que cadastra um funcionario dentro do banco de dados
     *
     * @param string $nome
     * @param string $cpf
     * @param string $rg
     * @param string $email
     * @param int $id_empresa
     * @return true|false
     */
    public static function inserir($nome, $cpf, $rg, $email, $id_empresa)
    {
        $conn = new Database();

        try {
            $result = $conn->executeQuery("INSERT INTO tbl_funcionario (nome, cpf, rg, email, id_empresa, created_at, updated_at) 
                VALUES ('$nome', '$cpf', '$rg', '$email', $id_empresa, NOW(), NOW())");

            return true;
        } catch (\Throwable $th) {
            return false;

        }
    }

    /**
     * Método que busca os funcionário e suas empresas
     *
     * @return array|false
     */
    public static function findAll()
    {
        $conn = new Database();

        try {
            $result = $conn->executeQuery("SELECT tb2.nome as nome_empresa, tb1.nome, tb1.cpf, tb1.rg, tb1.cpf, tb1.email
                FROM tbl_funcionario as tb1 INNER JOIN tbl_empresa as tb2 on tb2.id_empresa = tb1.id_empresa ORDER BY tb1.nome");

            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            return false;

        }
    }
}
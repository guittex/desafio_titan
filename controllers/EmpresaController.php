<?php

use core\Controller;

class EmpresaController extends Controller
{
    public function __construct()
    {
        if(!isset($_SESSION['usuario'])){
            $_SESSION['hasError'] = true;
            $_SESSION['msgError'] = "Sessão não encontrada, realize o Login para entrar no sistema";

            $this->redirect("/login");
        }
    }

    /**
     * Método que renderiza a view para criação da empresa
     *
     * @return void
     */
    public function create()
    {
        $this->view('empresa/create');
    }

    /**
     * Método que cadastra a empresa no banco de dados
     *
     * @return true|false
     */
    public function store()
    {
        $nome = $_POST['nome'];
        
        $empresa = $this->model('Empresa');

        $result = $empresa->inserir($nome);

        if($result){
            $_SESSION['hasMsg'] = true;
            $_SESSION['msg'] = "Empresa cadastrada com sucesso";

        }else{
            $_SESSION['hasError'] = true;
            $_SESSION['msgError'] = "Erro ao cadastrar empresa";

        }

        $this->redirect("/empresa/create");
    }
}
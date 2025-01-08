<?php

use core\Controller;

class FuncionarioController extends Controller
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
     * Método que exibe a listagem de funcionários
     *
     * @return void
     */
    public function index()
    {
        $funcionario = $this->model('Funcionario');

        $funcionarios = $funcionario->findAll();

        $this->view("funcionario/index", [
            'funcionarios' => $funcionarios
        ]);
    }

    /**
     * Método que renderiza a view de cadastro de funcionários
     *
     * @return void
     */
    public function create()
    {
        $empresa = $this->model('Empresa');

        $empresas = $empresa->findAll();

        $this->view("funcionario/create",  [
            'empresas' => $empresas
        ]);
    }

    /**
     * Método que cadastra o funcionário no banco de dados
     *
     * @return true|false
     */
    public function store()
    {
        $nome = $_POST['nome'];
        $cpf = str_replace([".", ",", "-"], "", $_POST['cpf']);
        $rg = $_POST['rg'];
        $email = $_POST['email'];
        $id_empresa = $_POST['id_empresa'];

        $funcionario = $this->model('Funcionario');

        $result = $funcionario->inserir($nome, $cpf, $rg, $email, $id_empresa);

        if($result){
            $_SESSION['hasMsg'] = true;
            $_SESSION['msg'] = "Funcionário cadastrada com sucesso";

        }else{
            $_SESSION['hasError'] = true;
            $_SESSION['msgError'] = "Erro ao cadastrar funcionário";

            $this->redirect("/funcionario/create");
        }

        $this->redirect("/funcionario/create");
    }
}
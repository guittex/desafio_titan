<?php
use core\Controller;

class LoginController extends Controller
{
  /**
   * Método que renderiza a view de login
   *
   * @return void
   */
  public function index()
  {
    $this->view('login/index');
  }

  /**
   * Método que realiza a autenticação do usuário
   *
   * @return true|false
   */
  public function autenticar()
  {
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $user = $this->model('User');

    $usuario = $user->autenticar($login, $senha);

    if($usuario == null){
      $_SESSION['hasError'] = true;
      $_SESSION['msgError'] = "Usuário não encontrado com os dados fornecidos";

      return $this->view("login/index");
    }

    $this->criaSessaoUsuario($usuario);

   $this->redirect("/funcionario/index");
  }
  
  /**
   * Método que cria a sessão do usuário logado
   *
   * @param User $usuario
   * @return void
   */
  private function criaSessaoUsuario($usuario)
  {
    $_SESSION = [
      'usuario' => [
        'login' => $usuario['login'],
        'dataLogin' => date('d/m/Y H:i')
      ]
    ];
  }
}

<?php

use core\Controller;

class UserController extends Controller
{

  /**
   * Método que realiza o logout do usuário
   *
   * @return void
   */
  public function logout()
  {
    unset($_SESSION['usuario']);

    $_SESSION['hasMsg'] = true;
    $_SESSION['msg'] = "Você efetou o logout com sucesso";

    $this->redirect("/login");
  }
}

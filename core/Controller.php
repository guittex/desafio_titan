<?php
namespace core;

use models\Users;

class Controller
{
  /**
   * Método responsável por instanciar a model dentro da view
   *
   * @param string $model
   * @return object
   */
  public function model($model)
  {
    require '../models/' . $model . '.php';
    $classe = 'models\\' . $model;
    return new $classe();
  }

  /**
  * Método responsável por chamar uuma determinada view
  *
  * @param string $view
  * @param array $data
  */
  public function view(string $view, $data = [])
  {
    require '../views/' . $view . '.php';
  }

  /**
   * Método que renderiza a view de página não encontrada
   *
   * @return void
   */
  public function pageNotFound()
  {
    $this->view('includes/erro404');
  }

  /**
   * Método que redireciona a tela para uma view especifica
   *
   * @param string $page
   * @return void
   */
  public function redirect($page)
  {
    header("Location: " . $page);
    exit;
  }
}

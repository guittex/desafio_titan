<?php
namespace core;

class App
{
  protected $controller = 'HomeController';
  protected $method = 'index';
  protected $page404 = false;
  protected $params = [];

  public function __construct()
  {
    session_start();

    $URL_ARRAY = $this->parseUrl();
    $this->getControllerFromUrl($URL_ARRAY);
    $this->getMethodFromUrl($URL_ARRAY);
    $this->getParamsFromUrl($URL_ARRAY);

    call_user_func_array([$this->controller, $this->method], $this->params);

    $this->redefineSessoes();
  }

  /**
   * Método que redefine as sessões de alertas
   *
   * @return void
   */
  private function redefineSessoes()
  {
    unset($_SESSION['hasError'], $_SESSION['msgError'], $_SESSION['hasMsg'], $_SESSION['msg']);
  }

  /**
  * Método que pega as informações da URL e retorna esses dados
  *
  * @return array
  */
  private function parseUrl()
  {
    $REQUEST_URI = array_values(array_filter(explode('/', $_SERVER['REQUEST_URI'])));

    return $REQUEST_URI;
  }

  /**
   * Método que pega o controller com base na informação obtida pela URL 
   *
   * @param array $url
   * @return void
   */
  private function getControllerFromUrl($url)
  {
    if ( !empty($url[0]) && isset($url[0]) ) {
      if ( file_exists('../controllers/' . ucfirst($url[0])  . 'Controller.php') ) {
        $this->controller = ucfirst($url[0]) . "Controller";
      } else {
        $this->page404 = true;
        $this->method = 'pageNotFound';

      }
    }

    require '../controllers/' . $this->controller . '.php';
    $this->controller = new $this->controller();
  }

  /**
   * Método que pega a função do controller com base na informação obtida pela URL 
   *
   * @param array $url
   * @return void
   */
  private function getMethodFromUrl($url)
  {
    if ( !empty($url[1]) && isset($url[1]) ) {
      if ( method_exists($this->controller, $url[1]) && !$this->page404) {
        $this->method = $url[1];
      } else {
        $this->method = 'pageNotFound';
      }
    }
  }
  
  /**
   * Método que verifica se a url possui um tamanho maior que 2
   *
   * @param array $url
   * @return void
   */
  private function getParamsFromUrl($url)
  {
    if (count($url) > 2) {
      $this->params = array_slice($url, 2);
    }
  }
}

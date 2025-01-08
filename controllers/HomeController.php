<?php

use core\Controller;

class HomeController extends Controller
{
  /**
   * Método que renderiza a view inicial 
   *
   * @return void
   */
  public function index()
  {
    $this->view('home/index');
  }
}

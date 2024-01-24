<?php

  namespace lib;

  class Router {
    private $controller;
    private $method;

    public function __construct() {
      $this->matchRoute();
    }

    public function matchRoute () {
      // var_dump(URL);
      $url = explode('/', URL);
      $this->controller = !empty($url[1]) ? $url[1] : 'Index';
      $this->method = !empty($url[2]) ? $url[2] : 'home';
      $this->controller = 'app\controllers\\' . ucfirst($this->controller) . 'Controller';
    }

    public function run() {
      $controllerInstance = new $this->controller();
      if (method_exists($controllerInstance, $this->method)) {
          $controllerInstance->{$this->method}();
      } else {
          echo 'Método no encontrado en el controlador.';
      }
    }
  }
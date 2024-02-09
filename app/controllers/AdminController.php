<?php

  namespace app\controllers;
  use app\models\AdminModel;

  class AdminController {
    private $adminModel;

    public function __construct () {
      $this->adminModel = new AdminModel();
    }
    public function home () {
      include_once ('./app/views/admin.php');
    }

    public function login () {
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['user'];
        $pass = $_POST['pass'];

        $admin = $this->adminModel->checkAdmin($name, $pass);

        if ($admin) {

          // Iniciar Sesión
          session_start();

          $_SESSION['username'] = $admin['name'];


          $response = array (
            'success' => true,
            'redirect' => 'http://localhost/PHP/distincionesipn/admin/session'
          );
        }

        else {
          $response = array (
            'success' => false,
          );
        }

        header('Content-Type: application/json');
        ob_clean(); // Limpiar Búfer
        echo json_encode($response);
        exit;
      }
    }

    public function session () {
      $usuarios = $this->adminModel->getAllUsers();
      require_once ('./app/views/session.php');
    }

    public function create () {
      ?>
      <h2>Estoy en crear usuario</h2>
      <?php
    }
  }
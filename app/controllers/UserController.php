<?php

  namespace app\controllers;
  use app\models\UserModel;
  
  error_reporting(E_ALL); 
  ini_set('display_errors', '1');

  class UserController {
    private $userModel;

    public function __construct () {
      $this->userModel = new UserModel();
    }

    public function home () {
      if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        require_once('./app/views/login.php');
      }
    }

    public function login () {
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $curp = $_POST['curp'];

        if (!empty($curp)) {
          
          $userData = $this->userModel->checkUserByCurp($curp);
          $success = false;

          if ($userData != null) {
            $success = true;
          }

          $response = array(
            'success' => $success,
            'userData' => $userData
          );

          header('Content-Type: application/json');
          ob_clean();
          echo json_encode($response);
          exit;
        }
      }

      $this->home();
    }
  }
<?php
  include_once('./app/models/UserModel.php');

  class UserController {
    private $userModel;

    public function __construct () {
      $this->userModel = new UserModel();
    }

    public function home () {
      require_once('./app/views/login.php');
    }

    public function login ($curp) {
      $user = $this->userModel->checkUserByCurp($curp);

      if ($user) {
        session_start();
        $_SESSION['user_id'] = $user['id'];

        header('Location: ./app/views/user.php');
        exit;
      } 

      else {
        echo 'Usuario no encontrado';
      }
    }
  }
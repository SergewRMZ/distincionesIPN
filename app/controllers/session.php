<?php
  // include_once('./app/controllers/UserController.php');
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jsonData = file_get_contents('php://input');

    $data = json_decode($jsonData);

    if (isset($data->curp)) {
      $curp = trim($data->curp);
      $userController = new UserController();
      echo json_encode('Datos recibidos:'.$curp);
    }
  }

  else {
    http_response_code(405);
    echo json_encode(['error' => 'Método no permitido']);
  }
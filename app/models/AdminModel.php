<?php
  namespace app\models;
  use config\Database;
  use PDO;
  
  class AdminModel {
    private $db;

    public function __construct () {
      $this->db = Database::getInstance()->getConection();
    }

    public function checkAdmin ($name, $pass) {
      try {
        $query = "SELECT * FROM admin WHERE name=:name AND pass=:pass";
        $consulta = $this->db->prepare($query);
        $consulta->bindParam(':name', $name, PDO::PARAM_STR);
        $consulta->bindParam(':pass', $pass, PDO::PARAM_STR);
        $consulta->execute();
        return $consulta->fetch(PDO::FETCH_ASSOC) ? : null;
      }

      catch (PDOException $e) {
        // echo "Error en la base de datos: " . $e->getMessage();
        return false;
      }
    }

    public function getAllUsers () {
      try {
        $query = "SELECT * FROM galardonado";
        $consulta = $this->db->prepare($query);
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_ASSOC);
      }

      catch (PDOException $e) {
        return false;
      }
    }
  }
<?php
  namespace app\models;
  use config\Database;
  use PDO;
  
  class UserModel {
    private $db;

    public function __construct () {
      $this->db = Database::getInstance()->getConection();
    }

    public function checkUserByCurp ($curp) {
      try {
        $query = "SELECT * FROM galardonado WHERE curp=:curp";
        $consulta = $this->db->prepare($query);
        $consulta->bindParam(':curp', $curp, PDO::PARAM_STR);
        $consulta->execute();

        return $consulta->fetch(PDO::FETCH_ASSOC) ? : null;
      }

      catch (PDOException $e) {
        // echo "Error en la base de datos: " . $e->getMessage();
        return false;
      }
    }
  }
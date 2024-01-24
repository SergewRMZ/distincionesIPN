<?php

  namespace config;
  use PDO;
  class Database {
    private static $instance = null;
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $name_db = "distincionesipn";
    private $conection;


    public function __construct () {
      try {
        $dsn = "mysql:host={$this->host};dbname={$this->name_db}";
        $opciones = [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        $this->conection = new PDO($dsn, $this->user, $this->pass, $opciones);
        // echo "Conectado a la base de datos";
      }

      catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
        die();
      }
    }

    public function getConection () {
      return $this->conection;
    }

    public static function getInstance () {
      if (self::$instance == null) {
        self::$instance = new self();
      }

      return self::$instance;
    }

  }

?>
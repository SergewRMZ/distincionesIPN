<?php

  namespace app\controllers;

  class IndexController {
    public function home () {
      include('./app/views/index.php');
    }
  }
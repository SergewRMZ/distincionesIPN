<?php 
  use lib\Router;
  include('./app/views/templates/header.php'); 
  include_once('./lib/routes.php');
  include_once('./autoloader.php');
  
  /** Router */
  $router = new Router();
  $router->run();
?>

<?php include('./app/views/templates/footer.php') ?>


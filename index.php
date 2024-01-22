<?php include('./app/views/templates/header.php'); 
  include('./lib/routes.php');
  include('./lib/Router.php');

  /** Router */
  $router = new Router();
  $router->run();
?>

<?php include('./app/views/templates/footer.php') ?>


<?php
session_start();

// Verifica si la variable de sesión 'username' está establecida
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    header('Location: http://localhost/PHP/distincionesipn/'); 
    exit;
}

// Si se envió el formulario de cierre de sesión, destruye la sesión actual
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
    session_destroy(); // Destruye la sesión actual
    header('Location: http://localhost/PHP/distincionesipn/'); // Redirecciona al inicio de sesión
    exit;
}
?>

<div class="container">
    <div class="card mt-4 mb-4">
      <div class="card-header"><h2 class="text-center">Bienvenido <?php echo $username ?></h2></div>
      <div class="card-body">
        <form method="post" class="text-end">
            <button class="btn btn-danger" type="submit" name="logout">Cerrar sesión</button>
        </form>
      </div>
    </div>

    <div class="text-center text-uppercase">
      <h2>Lista de Asistencia</h2>
    </div>

    <!-- Lista de asistencia -->
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>CURP</th>
          <th>Dependencia</th>
          <th>Distinción</th>
          <th>Categoría</th>
          <th>Asistencia</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($usuarios as $usuario): ?>
          <tr>
            <td><?php echo $usuario['name']; ?></td>
            <td><?php echo $usuario['curp']; ?></td>
            <td><?php echo $usuario['dependency']; ?></td>
            <td><?php echo $usuario['distinction']; ?></td>
            <td><?php echo $usuario['category']; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav>
</div>

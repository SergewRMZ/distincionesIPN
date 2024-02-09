<?php
session_start();

// Verifica si la variable de sesión 'username' está establecida
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    header('Location: http://localhost/PHP/distincionesipn/admin/session'); 
}
?>

<div class="container mt-4 mb-4 w-75" id="form-admin">
  <form method="post" id="loginFormAdmin" class="w-75"  style="margin: 0 auto">
    <div class="card">
      <div class="card-header text-center">Iniciar Sesión</div>
      <div class="card-body">
      <i class="fa-solid fa-user-tie"></i>
        <label class="form-label fw-bold" for="user">Administrador: </label>
        <input 
          class="form-control" 
          type="text"
          name="user"
          id="user"
          placeholder="Ingresa el nombre de administrador"
          required
          />

        <i class="fa-solid fa-key"></i>
        <label class="form-label fw-bold mt-4" for="pass">Contraseña: </label>
        <input 
          class="form-control" 
          type="password"
          name="pass"
          id="pass"
          placeholder="Ingresa la contraseña"
          required
          />

        <div class="mt-4 mb-2 text-center">
          <button class="btn btn__form w-75" type="submit">
            Ingresar
          </button>
        </div>

        <p id="userMsg" class="text-uppercase text-center text-danger fw-bold" style="display: none">Usuario no Encontrado</p>
      </div>
    </div>
    

  </form>
</div>

<script type="module" src="./public/js/Admin.mjs"></script>
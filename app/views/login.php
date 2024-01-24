<div class="container mb-4 mt-4">
  <form action="user/login" method="post" id="loginForm" class="w-75"  style="margin: 0 auto">
    <div class="card">
      <div class="card-header text-center fw-bold text-uppercase">
        Iniciar Sesión
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-sm-6 d-flex justify-content-center">
            <img class="img__form" src="./public/img/Trofeo.png" alt="Imagen de un Trofeo">
          </div>

          <div class="col-sm-6">
            <p>Si ha sido invitado a la ceremonia de distinciones del <span class="fw-bold">Instituto Politécnico Nacional</span>, le solicitamos ingresar su CURP para aceptar la invitación.</p>

            <div class="mb-3">
              <label for="curp" class="form-label fw-bold">CURP</label>
              <input required id="curp" class="form-control" name="curp" type="text" maxlength="18" placeholder="Ingresa tu CURP"/>
              <small id="curpHelp" class="form-text text-muted">Si olvidaste tu CURP, consulta <a target="_blank" href="https://www.gob.mx/curp/" class="text-primary">aquí</a>.</small>
            </div>
          </div>
        </div>
      </div>

      <div class="card-footer text-center">
        <button type="submit" class="btn btn-primary w-50">Iniciar</button>
      </div>
    </div>
  </form>
</div>
    
<!-- Archivos de JavaScript -->
<script type="module" src="./public/js/formValidator.mjs"></script>
<script type="module" src="./public/js/main.mjs"></script>
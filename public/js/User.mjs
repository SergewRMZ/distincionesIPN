import { FormValidator } from "./helpers/formValidator.mjs";
const validator = new FormValidator();

const User = (() => {
  let user_data = {};

  const sendForm = async (e, loginForm) => {
    e.preventDefault();
    const data = new FormData(loginForm);
    const CURP = data.get('curp').trim();
  
    if(!validator.validarCURP(CURP)) {
      alert('CURP inválida');
    }
  
    else {
      alert('CURP válida');
      try {
          const response = await fetch('http://localhost/PHP/distincionesipn/user/login', {
          method: 'POST',
          body: data
        });
  
        if (response.ok) {
          const result = await response.json();
  
          if (result.success) {
            user_data = result.userData;
            loadUserView();
          }
  
          else {
            alert('Usuario no encontrado');
          }
        }
      } 
      
      catch (error) {
        console.error(error);
      }
    }
  }

  const loadUserView = () => {
    const container = document.getElementById('form-container');
    const userView = `
      <div class="card text-center w-75" style="margin: 0 auto">
        <div class="card-header text-uppercase">
          <i class="fas fa-user"></i> Bienvenido(a)
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <i class="fas fa-user-circle fa-8x me-3"></i>
              <h5 class="card-title text-md mt-4">${user_data.name}</h5>
            </div>

            <div class="col-md-6 mt-4 mt-md-0">
              <p class="card-text text-start">
                Gracias por iniciar sesión. Te extendemos una cordial invitación por parte del
                <span class="fw-bold">Instituto Politécnico Nacional</span> por haber obtenido el
                <span class="fw-bold">${user_data.distinction}</span> a la
                <span class="fw-bold">Ceremonia de Distinciones del Mérito Politécnico</span>. Este logro es un testimonio de tu dedicación y excelencia en el ámbito
                <span class="fw-bold">${user_data.category}</span> en el
                ${user_data.dependency}.
                <br>
                <br>Agradecemos tu contribución y esperamos que disfrutes de la experiencia.
              </p>

              <div class="mb-3 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary w-50 me-4">Aceptar</button> 
                <button type="submit" class="btn btn-danger w-50">Rechazar</button>       
              </div>
            </div>
          </div>
        </div>

        <div class="card-footer text-muted">
          ¡Disfruta de tu experiencia!
        </div>
      </div>
    `;

    container.innerHTML = userView;
  }

  const getUserData = () => {
    return user_data;
  }

  return {
    sendForm,
    getUserData,
  }
})();

export {
  User
};
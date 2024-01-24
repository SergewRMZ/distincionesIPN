import { FormValidator } from "./formValidator.mjs";

const validator = new FormValidator();

document.addEventListener('DOMContentLoaded', () => {
  const loginForm = document.getElementById('loginForm');  
  const curpInput = document.getElementById('curp');

  curpInput.addEventListener('input', () => {
    curpInput.value = curpInput.value.toUpperCase();
  });


  loginForm.addEventListener('submit', async (e) => {
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
            showWelcome (result.userData);
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
  });

});


/** Vista dinámica de usuario */

const showWelcome = (data) => {
  console.log(data);
}

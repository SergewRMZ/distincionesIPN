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
          const response = await fetch('./app/controllers/session.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({ curp: CURP }),
        });

        if (response.ok) {
          const responseData = await response.json();
          console.log(responseData);
        }

        else {
          console.error('Error en la respuesta del servidor:', response.statusText);
          const errorResponse = await response.text();
          console.error('Contenido de la respuesta:', errorResponse);
        }

      } 
      
      catch (error) {
        console.error(error);
      }
    }
  });

});


import {User} from './User.mjs';

document.addEventListener('DOMContentLoaded', () => {
  const loginForm = document.getElementById('loginForm');  
  const curpInput = document.getElementById('curp');

  curpInput.addEventListener('input', () => {
    curpInput.value = curpInput.value.toUpperCase();
  });


  loginForm.addEventListener('submit', async (e) => {
    await User.sendForm(e, loginForm);
    console.log(User.getUserData());
  });
});



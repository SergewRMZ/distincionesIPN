const Admin = (() => {
  
  const login = async (e, loginForm) => {
    e.preventDefault();
    const data = new FormData(loginForm);

    try {
      const response = await fetch ('admin/login', {
        method: 'POST',
        body: data
      });
  
      if (response.ok) {
        const result = await response.json();
        
        if (result.success) {
          window.location.href = result.redirect;
        }

        else {
          document.getElementById('userMsg').style.display = 'block';

          setTimeout(() => {
            document.getElementById('userMsg').style.display = 'none';
          }, 3000);
        }
      }

    } catch (error) {
      console.error(error);
    }
  }

  return {
    login
  }

})();

document.addEventListener('DOMContentLoaded', () => {
  const loginFormAdmin = document.getElementById('loginFormAdmin');
  
  loginFormAdmin.addEventListener('submit', async (e) => {
    e.preventDefault();
    await Admin.login(e, loginFormAdmin);
  });
});

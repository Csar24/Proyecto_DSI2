const loginForm = document.querySelector('#login-form');

loginForm.addEventListener('submit', function(event) {
  event.preventDefault(); // prevenir el envío por defecto

  const formData = new FormData(loginForm);

  fetch('controllers/login.php', {
    method: 'POST',
    body: formData
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      // redirigir a la página de inicio
      window.location.href = 'home.php';
    } else {
      // mostrar un mensaje de error
      alert(data.message);
    }
  })
  .catch(error => {
    console.error('Error:', error);
  });
});
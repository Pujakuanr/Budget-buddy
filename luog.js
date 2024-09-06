document.getElementById('login-form').addEventListener('submit', function(event) {
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const errorMessage = document.getElementById('error-message');
  
    // Example validation (you can expand on this)
    if (password.length < 6) {
      event.preventDefault();
      errorMessage.textContent = 'Password must be at least 6 characters long.';
    } else if (!email.includes('@')) {
      event.preventDefault();
      errorMessage.textContent = 'Please enter a valid email address.';
    }
  });
  
// assets/js/script.js
/*
document.addEventListener("DOMContentLoaded", function () {
    // Basic example: Handling a click event for navigation (can be extended for form validation or Ajax calls)
    const navLinks = document.querySelectorAll('nav ul li a');

    navLinks.forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            const targetUrl = event.target.getAttribute('href');

            // Simple confirmation before navigating
            if (confirm(`Do you want to visit ${targetUrl}?`)) {
                window.location.href = targetUrl;
            }
        });
    });

    // Example of a form validation (you can apply it to specific forms)
    const forms = document.querySelectorAll('form');
    
    forms.forEach(form => {
        form.addEventListener('submit', function (event) {
            const inputs = form.querySelectorAll('input[required]');
            let valid = true;

            inputs.forEach(input => {
                if (!input.value.trim()) {
                    alert(`${input.name} is required`);
                    valid = false;
                }
            });

            if (!valid) {
                event.preventDefault();
            }
        });
    });
});
*/
document.addEventListener('DOMContentLoaded', function() {
    const toggleSwitch = document.getElementById('form-switch');
    const signInForm = document.getElementById('sign-in-form');
    const signUpForm = document.getElementById('sign-up-form');
    const loginText = document.querySelector('.login-text');
    const signupText = document.querySelector('.signup-text');
  
    function showSignIn() {
      signInForm.style.display = 'block';
      signUpForm.style.display = 'none';
      loginText.classList.add('active');
      signupText.classList.remove('active');
    }
  
    function showSignUp() {
      signInForm.style.display = 'none';
      signUpForm.style.display = 'block';
      loginText.classList.remove('active');
      signupText.classList.add('active');
    }
  
    toggleSwitch.addEventListener('change', function() {
      if (this.checked) {
        showSignUp();
      } else {
        showSignIn();
      }
    });
  
    // Initialize the form display
    showSignIn();
  
    // Form validation
    const forms = document.querySelectorAll('form');
    
    forms.forEach(form => {
      form.addEventListener('submit', function (event) {
        const inputs = form.querySelectorAll('input[required]');
        let valid = true;
  
        inputs.forEach(input => {
          if (!input.value.trim()) {
            alert(`${input.name} is required`);
            valid = false;
          }
        });
  
        if (!valid) {
          event.preventDefault();
        }
      });
    });
  });
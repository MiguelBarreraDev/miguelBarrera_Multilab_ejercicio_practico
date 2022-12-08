const loginForm = document.getElementById('login-form');
const loginSubmitButton = document.getElementById('login-submit-button');

loginForm?.addEventListener('submit', () => {
    loginSubmitButton.setAttribute('disabled', true);
})
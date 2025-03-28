const signInButton = document.getElementById('signIn');
const signUpButton = document.getElementById('signUp');
const container = document.getElementById('container');

signInButton.addEventListener('click', () => {
    container.classList.remove("right-panel-active");
});

signUpButton.addEventListener('click', () => {
    container.classList.add("right-panel-active");
});

function validateForm() {
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirm-password").value;
    if (password != confirmPassword) {
        document.getElementById("password-error").style.display = "block";
        return false;
    } else {
        document.getElementById("password-error").style.display = "none";
        return true;
    }
}
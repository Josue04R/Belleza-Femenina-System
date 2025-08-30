// Formatear teléfono al enviar
document.getElementById('perfilForm').addEventListener('submit', function(e){
    let telInput = document.getElementById('telefono');
    let tel = telInput.value.replace(/\D/g,''); // solo números

    if(tel.length === 8){
        // formato 60596068 -> 6059-6068
        telInput.value = tel.slice(0,4) + '-' + tel.slice(4,8);
    }
});

// Mostrar alerta en tiempo real para contraseña
const passwordInput = document.getElementById('password');
const passwordHelp = document.getElementById('passwordHelp');

passwordInput.addEventListener('input', function() {
    const val = passwordInput.value;
    const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;

    if(regex.test(val)){
        passwordHelp.textContent = "Contraseña segura ✅";
        passwordHelp.classList.remove('text-danger');
        passwordHelp.classList.add('text-success');
    } else {
        passwordHelp.textContent = "Debe tener al menos 8 caracteres, una mayúscula, una minúscula, un número y un símbolo ❌";
        passwordHelp.classList.remove('text-success');
        passwordHelp.classList.add('text-danger');
    }
});

// Funcionalidad para mostrar/ocultar contraseñas
document.getElementById('toggleCurrentPassword').addEventListener('click', function() {
    togglePassword('current_password', this);
});

document.getElementById('togglePassword').addEventListener('click', function() {
    togglePassword('password', this);
});

document.getElementById('togglePasswordConfirmation').addEventListener('click', function() {
    togglePassword('password_confirmation', this);
});

function togglePassword(inputId, iconElement) {
    const passwordInput = document.getElementById(inputId);
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        iconElement.classList.remove('fa-eye');
        iconElement.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        iconElement.classList.remove('fa-eye-slash');
        iconElement.classList.add('fa-eye');
    }
}

// Efecto de carga en el botón de guardar
document.getElementById('perfilForm').addEventListener('submit', function() {
    const saveButton = document.getElementById('saveButton');
    saveButton.classList.add('btn-loading');
    saveButton.disabled = true;
});
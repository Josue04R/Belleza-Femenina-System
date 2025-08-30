<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login / Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="{{ url('/css/login/login.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="loginContainer" id="container">

        <!-- Sign In -->
        <div class="formContainer signInContainer">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h1>Iniciar Sesión</h1>

                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <input type="email" name="email" class="formControlFeminine" placeholder="Email" required />
                <input type="password" name="password" class="formControlFeminine" placeholder="Password" required
                       pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$"
                       title="Debe tener al menos 8 caracteres, una mayúscula, una minúscula, un número y un símbolo" />
                <small id="loginPasswordHelp" class="form-text text-muted"></small>

                <button class="btnFeminine w-100">Iniciar sesión</button>
            </form>
        </div>
        
        <!-- Sign Up -->
        <div class="formContainer signUpContainer">
            <form method="POST" action="{{ route('register') }}" id="registerForm">
                @csrf
                <h1>Crear Cuenta</h1>

                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <input type="text" name="nombre" class="formControlFeminine" placeholder="Nombre" required
                       pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+"
                       title="Solo se permiten letras y espacios" />
                <input type="text" name="apellido" class="formControlFeminine" placeholder="Apellido" required
                       pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+"
                       title="Solo se permiten letras y espacios" />
                <input type="email" name="email" class="formControlFeminine" placeholder="Email" required />
                <input type="text" name="telefono" id="telefono" class="formControlFeminine" placeholder="Teléfono (opcional)"
                       pattern="^\d{4}-?\d{4}$"
                       title="Solo números y un guion opcional (ej: 6059-6068)" />
                <input type="password" name="password" id="passwordRegister" class="formControlFeminine" placeholder="Password" required
                       pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$"
                       title="Debe tener al menos 8 caracteres, una mayúscula, una minúscula, un número y un símbolo" />
                <small id="passwordHelp" class="form-text text-muted"></small>

                <input type="password" name="password_confirmation" class="formControlFeminine" placeholder="Confirmar Password" required />
                <button class="btnFeminine w-100">Crear cuenta</button>
            </form>
        </div>

        <!-- Overlay -->
        <div class="overlayContainer">
            <div class="overlay">
                <div class="overlayPanel overlayLeft">
                    <h1>¡Bienvenido de nuevo!</h1>
                    <p>Para continuar, inicia sesión con tu información personal</p>
                    <button class="btnFeminine btnGhost" id="signIn">Iniciar Sesión</button>
                </div>
                <div class="overlayPanel overlayRight">
                    <h1>¡Hola!</h1>
                    <p>Ingresa tus datos personales y comienza tu viaje con nosotros</p>
                    <button class="btnFeminine btnGhost" id="signUp">Crear cuenta</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ url('/js/login/login.js') }}"></script>

    <script>
        // Formateo de teléfono al enviar
        document.getElementById('registerForm').addEventListener('submit', function(e){
            let telInput = document.getElementById('telefono');
            let tel = telInput.value.replace(/\D/g,''); // solo números

            if(tel.length === 8){
                // formato 60596068 -> 6059-6068
                telInput.value = tel.slice(0,4) + '-' + tel.slice(4,8);
            }
        });

        // Mensaje en tiempo real para contraseña
        const passwordInput = document.getElementById('passwordRegister');
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
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="{{ url('/css/login/login.css') }}" rel="stylesheet">
</head>
<body>
    <div class="loginContainer" id="container">
        <!-- Sign In -->
        <div class="formContainer signInContainer">
            <form>
                <h1>Login</h1>
                <div class="socialIcons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-google"></i></a>
                </div>
                <span>Ingresa tus datos</span>
                <input type="email" class="formControlFeminine" placeholder="Email" />
                <input type="password" class="formControlFeminine" placeholder="Password" />
                <a href="#">Olvidaste tu contraseña</a>
                <button class="btnFeminine">Iniciar sesion</button>
            </form>
        </div>
        
        <!-- Sign Up -->
        <div class="formContainer signUpContainer">
            <form>
                <h1>Crea tu cuenta</h1>
                <div class="socialIcons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-google"></i></a>
                </div>
                <span>Ingresa tus datos</span>
                <input type="text" class="formControlFeminine" placeholder="Name" />
                <input type="email" class="formControlFeminine" placeholder="Email" />
                <input type="password" class="formControlFeminine" placeholder="Password" />
                <button class="btnFeminine">Crear cuenta</button>
            </form>
        </div>
        
        <!-- Overlay -->
        <div class="overlayContainer">
            <div class="overlay">
                <div class="overlayPanel overlayLeft">
                    <h1>¡Bienvenido de nuevo!</h1>
                    <p>Para mantenerte conectado con nosotros, inicia sesión con tu información personal</p>
                    <button class="btnFeminine btnGhost" id="signIn">Iniciar Sesión</button>
                </div>
                <div class="overlayPanel overlayRight">
                    <h1>¡Hola, Amigo!</h1>
                    <p>Ingresa tus datos personales y comienza tu viaje con nosotros</p>
                    <button class="btnFeminine btnGhost" id="signUp">Crea tu cuenta</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ url('/js/login/login.js') }}"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</body>
</html>
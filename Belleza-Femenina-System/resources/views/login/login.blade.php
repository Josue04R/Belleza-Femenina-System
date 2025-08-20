<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
                <h1>Login</h1>

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

                <div class="socialIcons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-google"></i></a>
                </div>

                <span>Ingresa tus datos</span>
                <input type="email" name="email" class="formControlFeminine" placeholder="Email" required />
                <input type="password" name="password" class="formControlFeminine" placeholder="Password" required />
                <a href="#">Olvidaste tu contraseña</a>
                <button class="btnFeminine">Iniciar sesión</button>
            </form>
        </div>
        
        <!-- Sign Up -->
        <div class="formContainer signUpContainer">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h1>Crea tu cuenta</h1>

                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <div class="socialIcons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-google"></i></a>
                </div>

                <span>Ingresa tus datos</span>
                <input type="text" name="nombre" class="formControlFeminine" placeholder="Nombre" required />
                <input type="text" name="apellido" class="formControlFeminine" placeholder="Apellido" required />
                <input type="email" name="email" class="formControlFeminine" placeholder="Email" required />
                <input type="text" name="telefono" class="formControlFeminine" placeholder="Teléfono (opcional)" />
                <input type="password" name="password" class="formControlFeminine" placeholder="Password" required />
                <input type="password" name="password_confirmation" class="formControlFeminine" placeholder="Confirmar Password" required />
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




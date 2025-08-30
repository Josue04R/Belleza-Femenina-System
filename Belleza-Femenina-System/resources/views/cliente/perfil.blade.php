@extends('layout.template1')

@section('title', 'Profile')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Bienvenido, {{ $cliente->nombre }}</h2>

        <!-- Tarjeta con la información del cliente -->
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white">
                Información del Perfil
            </div>
            <div class="card-body">
                <p><strong>Nombre:</strong> {{ $cliente->nombre }}</p>
                <p><strong>Apellido:</strong> {{ $cliente->apellido }}</p>
                <p><strong>Email:</strong> {{ $cliente->email }}</p>
                <p><strong>Teléfono:</strong> {{ $cliente->telefono ?? 'No registrado' }}</p>
            </div>
        </div>

        <!-- Botón para abrir el modal -->
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#perfilModal">
            Editar Perfil
        </button>

        <!-- Modal de edición -->
        <div class="modal fade" id="perfilModal" tabindex="-1" aria-labelledby="perfilModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="{{ route('perfil.actualizar') }}" id="perfilForm">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="perfilModalLabel">Editar Perfil</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                            <!-- Nombre -->
                            <div class="mb-3">
                                <label>Nombre</label>
                                <input type="text" name="nombre" value="{{ old('nombre', $cliente->nombre) }}" 
                                    class="form-control" required
                                    pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+"
                                    title="Solo se permiten letras y espacios">
                                @error('nombre')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Apellido -->
                            <div class="mb-3">
                                <label>Apellido</label>
                                <input type="text" name="apellido" value="{{ old('apellido', $cliente->apellido) }}" 
                                    class="form-control" required
                                    pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+"
                                    title="Solo se permiten letras y espacios">
                                @error('apellido')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Email (readonly) -->
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" value="{{ $cliente->email }}" class="form-control" readonly>
                            </div>

                            <!-- Teléfono -->
                            <div class="mb-3">
                                <label>Teléfono</label>
                                <input type="text" id="telefono" name="telefono" value="{{ old('telefono', $cliente->telefono) }}" 
                                    class="form-control" pattern="^\d{4}-?\d{4}$" 
                                    title="Solo números y un guion opcional (ej: 6059-6068)">
                                @error('telefono')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <hr>
                            <h6 class="text-danger">Cambio de Contraseña</h6>

                            <!-- Contraseña actual -->
                            <div class="mb-3">
                                <label>Contraseña Actual</label>
                                <input type="password" name="current_password" class="form-control">
                                @error('current_password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Nueva contraseña -->
                            <div class="mb-3">
                                <label>Nueva Contraseña</label>
                                <input type="password" id="password" name="password" class="form-control"
                                    pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$"
                                    title="Debe tener al menos 8 caracteres, una mayúscula, una minúscula, un número y un símbolo">
                                <small id="passwordHelp" class="form-text text-muted"></small>
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Confirmación nueva contraseña -->
                            <div class="mb-3">
                                <label>Confirmar Nueva Contraseña</label>
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-success">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Mensaje de éxito -->
        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <!-- Script para mantener el modal abierto si hay errores y formatear teléfono -->
    @if($errors->any())
        <script>
            var myModal = new bootstrap.Modal(document.getElementById('perfilModal'));
            myModal.show();
        </script>
    @endif

    <script>
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
    </script>

@endsection

@extends('layout.template1')

@section('title', 'Profile')

@section('estilos_css')
<link rel="stylesheet" href="{{ asset('css/clientes/perfil.css') }}">  
@endsection

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
        <i class="fas fa-edit me-2"></i>Editar Perfil
    </button>

    <!-- Modal de edición - Versión Mejorada -->
    <div class="modal fade" id="perfilModal" tabindex="-1" aria-labelledby="perfilModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form method="POST" action="{{ route('perfil.actualizar') }}" id="perfilForm">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="perfilModalLabel">
                            <i class="fas fa-user-edit"></i>Editar Perfil
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Nombre -->
                                <div class="form-group">
                                    <label for="nombre"><i class="fas fa-signature"></i>Nombre</label>
                                    <i class="fas fa-user input-icon"></i>
                                    <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $cliente->nombre) }}" 
                                        class="form-control" required
                                        pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+"
                                        title="Solo se permiten letras y espacios">
                                    @error('nombre')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Apellido -->
                                <div class="form-group">
                                    <label for="apellido"><i class="fas fa-user-tag"></i>Apellido</label>
                                    <i class="fas fa-tag input-icon"></i>
                                    <input type="text" id="apellido" name="apellido" value="{{ old('apellido', $cliente->apellido) }}" 
                                        class="form-control" required
                                        pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+"
                                        title="Solo se permiten letras y espacios">
                                    @error('apellido')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Email (readonly) -->
                        <div class="form-group">
                            <label for="email"><i class="fas fa-envelope"></i>Email</label>
                            <i class="fas fa-at input-icon"></i>
                            <input type="email" id="email" name="email" value="{{ $cliente->email }}" class="form-control" readonly>
                        </div>

                        <!-- Teléfono -->
                        <div class="form-group">
                            <label for="telefono"><i class="fas fa-phone"></i>Teléfono</label>
                            <i class="fas fa-mobile-alt input-icon"></i>
                            <input type="text" id="telefono" name="telefono" value="{{ old('telefono', $cliente->telefono) }}" 
                                class="form-control" pattern="^\d{4}-?\d{4}$" 
                                title="Solo números y un guion opcional (ej: 6059-6068)">
                            @error('telefono')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <hr>
                        
                        <h6 class="section-title">
                            <i class="fas fa-key"></i>Cambio de Contraseña
                        </h6>

                        <!-- Contraseña actual -->
                        <div class="form-group">
                            <label for="current_password"><i class="fas fa-lock"></i>Contraseña Actual</label>
                            <i class="fas fa-key input-icon"></i>
                            <input type="password" id="current_password" name="current_password" class="form-control">
                            <i class="fas fa-eye password-toggle" id="toggleCurrentPassword"></i>
                            @error('current_password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <!-- Nueva contraseña -->
                                <div class="form-group">
                                    <label for="password"><i class="fas fa-lock"></i>Nueva Contraseña</label>
                                    <i class="fas fa-key input-icon"></i>
                                    <input type="password" id="password" name="password" class="form-control"
                                        pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$"
                                        title="Debe tener al menos 8 caracteres, una mayúscula, una minúscula, un número y un símbolo">
                                    <i class="fas fa-eye password-toggle" id="togglePassword"></i>
                                    <small id="passwordHelp" class="form-text text-muted"></small>
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Confirmación nueva contraseña -->
                                <div class="form-group">
                                    <label for="password_confirmation"><i class="fas fa-lock"></i>Confirmar Nueva Contraseña</label>
                                    <i class="fas fa-key input-icon"></i>
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                                    <i class="fas fa-eye password-toggle" id="togglePasswordConfirmation"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fas fa-times me-2"></i>Cerrar
                        </button>
                        <button type="submit" class="btn btn-success" id="saveButton">
                            <i class="fas fa-save me-2"></i>Guardar Cambios
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Mensaje de éxito -->
    @if(session('success'))
        <div class="alert alert-success mt-3">
            <i class="fas fa-check-circle"></i>{{ session('success') }}
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

<script src="{{ url('js/clientes/perfil.js') }}"></script>

<!-- Font Awesome para iconos -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection
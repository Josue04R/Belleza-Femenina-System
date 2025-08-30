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
                <form method="POST" action="{{ route('perfil.actualizar') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="perfilModalLabel">Editar Perfil</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Nombre</label>
                            <input type="text" name="nombre" value="{{ $cliente->nombre }}" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Apellido</label>
                            <input type="text" name="apellido" value="{{ $cliente->apellido }}" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" value="{{ $cliente->email }}" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Teléfono</label>
                            <input type="text" name="telefono" value="{{ $cliente->telefono }}" class="form-control">
                        </div>

                        <hr>
                        <h6 class="text-danger">Cambio de Contraseña</h6>
                        <div class="mb-3">
                            <label>Contraseña Actual</label>
                            <input type="password" name="current_password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Nueva Contraseña</label>
                            <input type="password" name="password" class="form-control">
                        </div>
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
</div>
@endsection

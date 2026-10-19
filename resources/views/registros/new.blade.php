@extends('layout')
@section('title', 'Registro de información personal')
@section('content')
    <!-- container centra el contenido y limita su ancho; py-5 agrega espacio vertical interno. -->
    <div class="container py-5">
        <!-- row crea una fila del sistema de rejilla; justify-content-center centra sus columnas horizontalmente. -->
        <div class="row justify-content-center">
            <!-- col-lg-8 ocupa 8 de 12 columnas desde el punto de quiebre lg -->
            <div class="col-lg-8">
                <!-- Título y Subtítulo -->
                <h1 class="page-title text-center mb-3">Registro de información personal</h1>
                <p class="page-subtitle text-center mb-5">
                    Interfaz clara y confiable, inspirada en la identidad visual del sector financiero.
                </p>

                <div class="card finance-card">
                    <div class="card-body p-4">
                        <!-- action, method y @csrf siguen la guía MercadoSENA: el formulario apunta a RegistroController@store -->
                        <form id="formularioBootstrap" action="{{ url('registros') }}" method="post">
                            @csrf
                            <!-- Nombres -->
                            <div class="mb-3">
                                <label for="nombres" class="form-label">Nombres</label>
                                <input type="text" class="form-control" id="nombres" name="nombres" value="{{ old('nombres') }}" required>
                                @error('nombres')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Apellidos -->
                            <div class="mb-3">
                                <label for="apellidos" class="form-label">Apellidos</label>
                                <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{ old('apellidos') }}" required>
                                @error('apellidos')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Fecha de nacimiento -->
                            <div class="mb-3">
                                <label for="fechaNacimiento" class="form-label">Fecha de nacimiento</label>
                                <input type="date" class="form-control" id="fechaNacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" required>
                                @error('fecha_nacimiento')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Cantidad de niños a cargo -->
                            <div class="mb-3">
                                <label for="ninos" class="form-label">Cantidad de niños a cargo</label>
                                <input type="number" class="form-control" id="ninos" name="ninos" min="0" value="{{ old('ninos', 0) }}" required>
                                @error('ninos')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Siguientes campos aquí... -->
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop()

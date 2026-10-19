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

                            <!-- Madre cabeza de familia (Radio Inline) -->
                            <div class="mb-3">
                                <label class="form-label d-block">¿Es madre cabeza de familia?</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="madre_cabeza" id="madreSi" value="Sí" @checked(old('madre_cabeza') == 'Sí')>
                                    <label class="form-check-label" for="madreSi">Sí</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="madre_cabeza" id="madreNo" value="No" @checked(old('madre_cabeza', 'No') == 'No')>
                                    <label class="form-check-label" for="madreNo">No</label>
                                </div>
                            </div>

                            <!-- Técnico o Tecnólogo (Radio Inline) -->
                            <div class="mb-3">
                                <label class="form-label d-block">¿Está realizando un técnico o tecnólogo?</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="estudio" id="estudioSi" value="Sí" @checked(old('estudio') == 'Sí')>
                                    <label class="form-check-label" for="estudioSi">Sí</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="estudio" id="estudioNo" value="No" @checked(old('estudio', 'No') == 'No')>
                                    <label class="form-check-label" for="estudioNo">No</label>
                                </div>
                            </div>

                            <!-- Géneros de cine (Checkboxes en rejilla 3 columnas) -->
                            <div class="mb-4">
                                <label class="form-label d-block">Géneros de cine que prefiere:</label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="generos[]" value="Acción" id="accion" @checked(in_array('Acción', old('generos', [])))>
                                            <label class="form-check-label" for="accion">Acción</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="generos[]" value="Comedia" id="comedia" @checked(in_array('Comedia', old('generos', [])))>
                                            <label class="form-check-label" for="comedia">Comedia</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="generos[]" value="Drama" id="drama" @checked(in_array('Drama', old('generos', [])))>
                                            <label class="form-check-label" for="drama">Drama</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="generos[]" value="Terror" id="terror" @checked(in_array('Terror', old('generos', [])))>
                                            <label class="form-check-label" for="terror">Terror</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="generos[]" value="Ciencia Ficción" id="scifi" @checked(in_array('Ciencia Ficción', old('generos', [])))>
                                            <label class="form-check-label" for="scifi">Ciencia Ficción</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="generos[]" value="Romance" id="romance" @checked(in_array('Romance', old('generos', [])))>
                                            <label class="form-check-label" for="romance">Romance</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Botón de Envío -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    Enviar y mostrar respuestas
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop()

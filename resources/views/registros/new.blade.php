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
                        <!-- action, method y token CSRF siguen la guía MercadoSENA: el formulario apunta a RegistroController::store -->
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

                <!-- Zona de resultados -->
                <div id="resultados" class="mt-5" style="display: none;">
                    <div class="card border-success finance-card results-card">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0">Respuestas seleccionadas</h5>
                        </div>
                        <div class="card-body" id="contenidoResultados"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop()
@section('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="{{ url('js/jquery.validate.min.js') }}"></script>
    <script src="{{ url('js/localization/messages_es.min.js') }}"></script>
    @include('registros.validacion')

    <script>
        document.getElementById('formularioBootstrap').addEventListener('submit', function(e) {
            e.preventDefault(); // Previene la recarga de la página

            // Validación en el cliente (jQuery Validate): si hay errores no se continúa
            if (!$(this).valid()) {
                return;
            }

            // Captura de valores
            const nombres = document.getElementById('nombres').value;
            const apellidos = document.getElementById('apellidos').value;
            const fecha = document.getElementById('fechaNacimiento').value;
            const ninos = document.getElementById('ninos').value;
            const madre = document.querySelector('input[name="madre_cabeza"]:checked').value;
            const estudio = document.querySelector('input[name="estudio"]:checked').value;

            // Captura de múltiples checkboxes
            const generosSeleccionados = [];
            document.querySelectorAll('input[name="generos[]"]:checked').forEach(cb => {
                generosSeleccionados.push(cb.value);
            });

            const generosTexto = generosSeleccionados.length > 0 ?
                generosSeleccionados.join(', ') : 'Ninguno seleccionado';

            // Estructura de datos a presentar
            const respuestas = [
                ['Nombres', nombres],
                ['Apellidos', apellidos],
                ['Fecha de nacimiento', fecha],
                ['Cantidad de niños a cargo', ninos],
                ['Madre cabeza de familia', madre],
                ['Está realizando técnico/tecnólogo', estudio],
                ['Géneros de cine preferidos', generosTexto]
            ];

            // Renderizado dinámico en el DOM
            const contenidoResultados = document.getElementById('contenidoResultados');
            contenidoResultados.replaceChildren(...respuestas.map(([etiqueta, valor]) => {
                const parrafo = document.createElement('p');
                const titulo = document.createElement('strong');
                titulo.textContent = `${etiqueta}:`;
                parrafo.append(titulo, ` ${valor}`);
                return parrafo;
            }));

            // Muestra el contenedor y desplaza la vista hacia los resultados
            document.getElementById('resultados').style.display = 'block';
            document.getElementById('resultados').scrollIntoView({
                behavior: 'smooth'
            });

            // Guarda el registro en la base de datos (RegistroController@store) sin recargar la página
            guardarRegistro(this);
        });

        function guardarRegistro(formulario) {
            const estado = document.createElement('div');
            estado.className = 'alert alert-secondary mt-3 mb-0';
            estado.textContent = 'Guardando en la base de datos...';
            document.getElementById('contenidoResultados').append(estado);

            fetch(formulario.action, {
                method: 'POST',
                headers: { 'Accept': 'application/json' },
                body: new FormData(formulario)
            })
            .then(respuesta => respuesta.json().then(datos => ({ ok: respuesta.ok, datos })))
            .then(({ ok, datos }) => {
                if (ok) {
                    estado.className = 'alert alert-success mt-3 mb-0';
                    estado.textContent = `${datos.message} (ID ${datos.id})`;
                } else {
                    estado.className = 'alert alert-danger mt-3 mb-0';
                    estado.textContent = Object.values(datos.errors || {}).flat().join(' ') || 'No se pudo guardar el registro.';
                }
            })
            .catch(() => {
                estado.className = 'alert alert-danger mt-3 mb-0';
                estado.textContent = 'Error de conexión con el servidor.';
            });
        }
    </script>
@stop()

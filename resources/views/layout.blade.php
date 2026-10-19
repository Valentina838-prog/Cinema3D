<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | Cinema3D</title>
    <!-- Hoja de estilos de Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <style>
        :root {
            --bs-primary: #173b63;
            --bs-primary-rgb: 23, 59, 99;
            --bs-success: #11766f;
            --bs-success-rgb: 17, 118, 111;
            --bs-body-color: #243447;
            --bs-border-color: #d9e2ec;
        }

        body {
            min-height: 100vh;
            background:
                radial-gradient(ellipse at top, rgba(220, 232, 244, 0.65), transparent 55%),
                #f3f6fa;
        }

        .page-title {
            color: #173b63 !important;
            font-weight: 700;
            letter-spacing: -0.035em;
        }

        .page-subtitle {
            color: #607286 !important;
        }

        .finance-card {
            overflow: hidden;
            border: 1px solid #d9e2ec;
            border-radius: 1rem;
            box-shadow: 0 1rem 2.5rem rgba(23, 59, 99, 0.09) !important;
        }

        .finance-card .card-body {
            padding: clamp(1.25rem, 4vw, 2.25rem);
        }

        .form-label {
            color: #173b63;
            font-weight: 600;
        }

        .form-control {
            border-color: #cbd7e3;
            border-radius: 0.55rem;
        }

        .form-control:focus {
            border-color: #3e7898;
            box-shadow: 0 0 0 0.2rem rgba(62, 120, 152, 0.18);
        }

        .form-check-input:checked {
            background-color: #11766f;
            border-color: #11766f;
        }

        .btn-primary {
            --bs-btn-bg: #173b63;
            --bs-btn-border-color: #173b63;
            --bs-btn-hover-bg: #11766f;
            --bs-btn-hover-border-color: #11766f;
            --bs-btn-active-bg: #0d625c;
            --bs-btn-active-border-color: #0d625c;
            border-radius: 0.6rem;
            font-weight: 600;
        }

        .results-card .card-header {
            border-bottom: 0;
        }

        .results-card .card-body p:last-child {
            margin-bottom: 0;
        }

        .navbar-cinema {
            background-color: #173b63;
        }
    </style>
    @yield('css')
</head>
<body>
    <nav class="navbar navbar-expand navbar-dark navbar-cinema">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">Cinema3D</a>
            <div class="navbar-nav">
                <a class="nav-link" href="{{ url('registros/create') }}">Nuevo registro</a>
                <a class="nav-link" href="{{ url('registros') }}">Registros</a>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Bundle JavaScript de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    @yield('js')
</body>
</html>

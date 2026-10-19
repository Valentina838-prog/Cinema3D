@extends('layout')
@section('title', 'Registros')
@section('content')
    <div class="container py-5">
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
            <h1 class="page-title h3 mb-0">Listado de registros</h1>
            <a href="{{ url('registros/create') }}" class="btn btn-primary">Nuevo</a>
        </div>

        @if(session('type'))
            <div class="alert alert-{{ session('type') }} alert-dismissible fade show" role="alert">
                <strong>Noticia:</strong> {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card finance-card">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Fecha de nacimiento</th>
                            <th>Niños a cargo</th>
                            <th>Madre cabeza de familia</th>
                            <th>Técnico/Tecnólogo</th>
                            <th>Géneros de cine</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($datos as $registro)
                            <tr>
                                <td>{{ $registro->id }}</td>
                                <td>{{ $registro->nombres }}</td>
                                <td>{{ $registro->apellidos }}</td>
                                <td>{{ $registro->fecha_nacimiento }}</td>
                                <td>{{ $registro->ninos }}</td>
                                <td>{{ $registro->madre_cabeza }}</td>
                                <td>{{ $registro->estudio }}</td>
                                <td>{{ $registro->generos ?: 'Ninguno seleccionado' }}</td>
                                <td class="text-end text-nowrap">
                                    <a href="{{ route('registros.edit', $registro->id) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                                    <form action="{{ route('registros.destroy', $registro->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Quiere eliminar el registro?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted py-4">No hay registros todavía.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop()

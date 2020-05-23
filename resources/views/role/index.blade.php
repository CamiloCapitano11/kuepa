@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Listado de Roles</div>

                <div class="card-body">
                    <a href="{{ route('role.create') }}" class = "btn btn-primary float-right btn_create">Crear Nuevo </a>
                    <br></br>
                    @include('custom.message')

                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Clave</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Accesos</th>
                            <th colspan = 4>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <th scope="row">{{ $role['id'] }}</th>
                                    <td>{{ $role['nombre'] }}</td>
                                    <td>{{ $role['slug'] }}</td>
                                    <td>{{ $role['descripcion'] }}</td>
                                    <td>{{ $role['full-acceso'] }}</td>
                                    <td><a class="btn btn-info" href="{{ route('role.show', $role->id) }}">Ver</a></td>
                                    <td><a class="btn btn-success" href="{{ route('role.edit', $role->id) }}">Editar</a></td>
                                    <td>
                                        <form action = "{{ route('role.destroy', $role->id) }}" method = "POST">
                                            @csrf
                                            <button class="btn btn-danger"> Borrar </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $roles->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

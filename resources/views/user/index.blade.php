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
                            <th scope="col">Nombres</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Email</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Programa de Interés</th>
                            <th colspan = 4>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $user['id'] }}</th>
                                    <td>{{ $user['name'] }}</td>
                                    <td>{{ $user['lastname'] }}</td>
                                    <td>{{ $user['email'] }}</td>
                                    <td>{{ $user['telephone'] }}</td>
                                    <td>{{ $user['program_interest'] }}</td>
                                    <td><a class="btn btn-info" href="{{ route('role.show', $role->id) }}">Ver</a></td>
                                    <td>
                                        <form action = "{{ route('role.destroy', $user->id) }}" method = "POST">
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

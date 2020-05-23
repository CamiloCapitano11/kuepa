@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Información de rol registrado</div>

                <div class="card-body">
                    @include('custom.message')

                    <form action = "{{ route('role.update', $role->id) }}" method = "POST">
                        @csrf
                        @method('PUT')
                        <div class = "container">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nombre del Rol</label>
                                <input type="text" class="form-control" id="nombre" placeholder="Ingrese nombre" name = "nombre"
                                value = "{{ old('nombre', $role->nombre) }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Identificador clave del Rol</label>
                                <input type="text" class="form-control" id="slug" placeholder="Ingrese clave" name = "slug"
                                value = "{{ old('slug', $role->slug) }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Descripción del Rol</label>
                                <textarea class = "form-control" placeholder = "Descripción" name = "descripcion"
                                id = "descripcion" rows = "3" readonly> {{ old('descripcion', $role->descripcion) }} </textarea>
                            </div>
                            
                            <h3>Acceso total</h3>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio"  disabled id="full_acceso" name="full-acceso" class="custom-control-input"
                                value = "si"
                                @if ( $role['full-acceso'] == "si" )
                                    checked
                                @elseif (old('full-acceso') == "si")
                                    checked
                                @endif>
                                <label class="custom-control-label" for="full_acceso">Si</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" disabled id="full_acceso_no" name="full-acceso" class="custom-control-input"
                                value = "no"
                                @if ( $role['full-acceso'] == "no" )
                                    checked
                                @endif
                                @if (old('full-acceso') == "no")
                                    checked
                                @endif>
                                <label class="custom-control-label" for="full_acceso_no">No</label>
                            </div>
                            <hr>
                            <h3>Listado de permisos</h3>
                            @foreach ($permisos as $permiso)
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" disabled class="custom-control-input" id="permiso_{{ $permiso->id }}"
                                        value = "{{ $permiso->id }}" name = "permiso[]"
                                        
                                        @if( is_array(old('permiso')) && in_array("$permiso->id", old('permiso')))
                                            checked
                                        @elseif( is_array($permiso_rol) && in_array("$permiso->id", $permiso_rol))
                                            checked
                                        @endif>
                                    <label class="custom-control-label" for="permiso_{{ $permiso->id }}">
                                    {{ $permiso->id }} - {{ $permiso->nombre }}
                                    <em>({{ $permiso->descripcion }})</em>
                                    </label>
                                </div>
                            @endforeach
                            <hr>
                            <a class = "btn btn-success" href = "{{ route('role.edit', $role->id) }}"> Editar </a>
                            <a class = "btn btn-danger" href = "{{ route('role.index') }}"> Volver </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

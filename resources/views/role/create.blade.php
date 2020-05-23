@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Creación de un nuevo rol</div>

                <div class="card-body">
                    @include('custom.message')

                    <form action = "{{ route('role.store') }}" method = "POST">
                        @csrf
                        <div class = "container">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nombre del Rol</label>
                                <input type="text" class="form-control" id="nombre" placeholder="Ingrese nombre" name = "nombre"
                                value = "{{ old('nombre') }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Identificador clave del Rol</label>
                                <input type="text" class="form-control" id="slug" placeholder="Ingrese clave" name = "slug"
                                value = "{{ old('slug') }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Descripción del Rol</label>
                                <textarea class = "form-control" placeholder = "Descripción" name = "descripcion"
                                id = "descripcion" rows = "3"> {{ old('descripcion') }} </textarea>
                            </div>
                            
                            <h3>Acceso total</h3>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="full_acceso" name="full-acceso" class="custom-control-input"
                                value = "si"
                                @if (old('full-acceso') == "si")
                                    checked
                                @endif>
                                <label class="custom-control-label" for="full_acceso">Si</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="full_acceso_no" name="full-acceso" class="custom-control-input"
                                value = "no"
                                @if (old('full-acceso') == "no")
                                    checked
                                @endif
                                @if (old('full-acceso') == null)
                                    checked
                                @endif>
                                <label class="custom-control-label" for="full_acceso_no">No</label>
                            </div>
                            <hr>
                            <h3>Listado de permisos</h3>
                            @foreach ($permisos as $permiso)
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="permiso_{{ $permiso->id }}"
                                        value = "{{ $permiso->id }}" name = "permiso[]"
                                        
                                        @if( is_array(old('permiso')) && in_array("$permiso->id", old('permiso')))
                                            checked
                                        @endif>
                                    <label class="custom-control-label" for="permiso_{{ $permiso->id }}">
                                    {{ $permiso->id }} - {{ $permiso->nombre }}
                                    <em>({{ $permiso->descripcion }})</em>
                                    </label>
                                </div>
                            @endforeach
                            <hr>
                            <input class = "btn btn-primary" type = "submit" value = "Guardar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

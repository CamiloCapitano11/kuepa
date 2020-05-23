@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Información de estudiante registrado</div>

                <div class="card-body">
                    @include('custom.message')

                    <form action = "{{ route('user.update', $user->id) }}" method = "POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombres') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname', $user->lastname) }}" required autocomplete="lastname" autofocus>

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="program_interest" class="col-md-4 col-form-label text-md-right">{{ __('Programa al que aplica') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" id="program_interest" name = "program_interest">
                                    <option value = ""
                                    @if ( $user['program_interest'] == "" )
                                        checked
                                    @elseif (old('program_interest') == "")
                                        checked
                                    @endif>Seleccione un programa por favor</option>
                                    <option value = "NA"
                                    @if ( $user['program_interest'] == "NA" )
                                        checked
                                    @elseif (old('program_interest') == "NA")
                                        checked
                                    @endif>No Aplicar</option>
                                    <option value = "Bachillerato"
                                    @if ( $user['program_interest'] == "Bachillerato" )
                                        checked
                                    @elseif (old('program_interest') == "Bachillerato")
                                        checked
                                    @endif>Bachillerato</option>
                                    <option value = "Ingles"
                                    @if ( $user['program_interest'] == "Ingles" )
                                        checked
                                    @elseif (old('program_interest') == "Ingles")
                                        checked
                                    @endif>Inglés</option>
                                    <option value = "PreIcfes"
                                    @if ( $user['program_interest'] == "PreIcfes" )
                                        checked
                                    @elseif (old('program_interest') == "PreIcfes")
                                        checked
                                    @endif>PreIcfes</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electrónico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                            <hr>
                            <a class = "btn btn-success" href = "{{ route('user.edit', $role->id) }}"> Editar </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

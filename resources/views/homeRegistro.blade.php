@extends('layouts.est')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Bienvenido</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Muy pronto serás contactado, gracias por tu registro a la plataforma.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
